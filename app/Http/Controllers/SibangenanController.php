<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sibangenan;
use App\Urusansibangenan;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SibangenanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userLevel = Auth::user()->level; 
        // Filter Tahun
        $years = Sibangenan::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->pluck('year');

        // Fetch data based on the selected year (if provided)
        $selectedYear = request()->query('year');
        $data2 = Sibangenan::when($selectedYear, function ($query) use ($selectedYear) {
            return $query->whereYear('created_at', $selectedYear);
        })->get();
        $urusan = Urusansibangenan::all();
        $query = DB::table('sibangenan')
            ->join('urusansibangenan', 'sibangenan.urusan', '=', 'urusansibangenan.id')
            ->select('sibangenan.*', 'urusansibangenan.nama as nama_urusan');

        if ($userLevel !== 1) {
            $query->where('sibangenan.namapemohon', Auth::user()->name); // Ganti 'nama_pemohon' dengan kolom yang sesuai
        }

        $data = $query->get();
        return view ('pages.sibangenan.index', compact('data','urusan','years','data2'));
    }

    public function ditolak()
    {
        $rejectedData = Sibangenan::where('status_pengajuan', 'Ditolak')->get();
        return view ('pages.sibangenan.ditolak', compact('rejectedData'));
    }

    public function getKategoriBySubKategoriId($id)
    {
        $subKategori = Urusansibangenan::findOrFail($id);
        $kategori = $subKategori->kategori;

        return view('kategori', compact('kategori'));
    }

    public function updateStatusSetuju($id)
    {
        $sibangenan = Sibangenan::findOrFail($id);
        if ($sibangenan->status_pengajuan !== 'Disetujui') {
            $sibangenan->status_pengajuan = 'Disetujui';
            $sibangenan->save();
        }
        return redirect()->route('sibangenan.index')->with('success', 'Data Pengajuan Berhasil Diupdate.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namapemohon' => 'required',
            'rw' => 'required',
            'permasalahan' => 'required',
            'urusan' => 'required',
            'usulan' => 'required',
            'lokasi' => 'required',
            'dokumen_pendukung' => 'required|max:5048',
            'status_pengajuan' => 'required'
        ]);

        $uuid = Str::uuid()->toString();
        
        $sibangenan = new Sibangenan();
        $sibangenan->id = $uuid;
        $sibangenan->namapemohon = $request->input('namapemohon');
        $sibangenan->rw = $request->input('rw');
        $sibangenan->permasalahan = $request->input('permasalahan');
        $sibangenan->urusan = $request->input('urusan');
        $sibangenan->suburusan = $request->input('suburusan');
        $sibangenan->usulan = $request->input('usulan');
        $sibangenan->lokasi = $request->input('lokasi');
        $sibangenan->status_pengajuan = $request->input('status_pengajuan');

        if ($request->hasFile('dokumen_pendukung')) {
            $filePaths = [];
        
            foreach ($request->file('dokumen_pendukung') as $file) {
                $path = $file->store('public/files');
                $filePaths[] = $path;
            }
        
            // Save the file names in the database as a JSON-encoded array
            $sibangenan->dokumen_pendukung = json_encode($filePaths);
        }
        
        $sibangenan->save();
        return redirect()->route('sibangenan.index')->with('success', 'Pengajuan Berhasil Dibuat');
    }

    public function downloadFiles($id)
    {
        $sibangenan = Sibangenan::findOrFail($id);
        $filePaths = json_decode($sibangenan->dokumen_pendukung, true);

        // Zip the files before download
        $zip = new \ZipArchive();
        $zipFileName = 'download_files_' . time() . '.zip';
        $zip->open($zipFileName, \ZipArchive::CREATE);

        foreach ($filePaths as $path) {
            $file = storage_path('app/' . $path);
            if (file_exists($file)) {
                $zip->addFile($file, basename($path));
            }
        }

        $zip->close();

        // Set proper headers for the download
        $headers = [
            'Content-Type' => 'application/zip',
        ];

        // Download the zip file
        return response()->download($zipFileName, 'download_files.zip', $headers)->deleteFileAfterSend();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $sibangenan = Sibangenan::findOrFail($id);
            $sibangenan->namapemohon = $request->namapemohon;
            $sibangenan->rw = $request->rw;
            $sibangenan->permasalahan = $request->permasalahan;
            $sibangenan->urusan = $request->urusan;
            $sibangenan->suburusan = $request->suburusan;
            $sibangenan->lokasi = $request->lokasi;
            if ($request->hasFile('dokumen_pendukung')) {
                $image = $request->file('dokumen_pendukung');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/files');
                $image->move($destinationPath, $filename);
                $sibangenan->dokumen_pendukung = $filename;
            }
            $sibangenan->save();
            return redirect()->route('sibangenan.index')->with('success', 'Data Pengajuan Berhasil Diupdate.');
        } catch (ModelNotFoundException $e) {
            // Handle the case where the record with the specified $id is not found
            return redirect()->back()->withErrors('Data not found.');
        } catch (ValidationException $e) {
            // Handle the case where validation fails
            return redirect()->back()->withErrors($e->errors());
        } catch (\Exception $e) {
            // Handle other unexpected errors
            return redirect()->back()->withErrors('An error occurred while updating the data.');
        }
    }

    public function updateStatusTolakC(Request $request, $id)
    {
        try {
            $sibangenan = Sibangenan::findOrFail($id);
            $sibangenan->keterangan_penolakan = $request->keterangan_penolakan;
            $sibangenan->status_pengajuan = $request->status_pengajuan;
            $sibangenan->save();
            return redirect()->route('sibangenan.index')->with('success', 'Data Pengajuan Berhasil Diupdate.');
        }catch (\Exception $e) {
            // Handle other unexpected errors
            return redirect()->back()->withErrors('An error occurred while updating the data.');
        }
        
    }

    public function updateStatusRevisi(Request $request, $id)
    {
        try {
            $sibangenan = Sibangenan::findOrFail($id);
            $sibangenan->keterangan_penolakan = $request->keterangan_penolakan;
            $sibangenan->status_pengajuan = $request->status_pengajuan;
            $sibangenan->save();
            return redirect()->route('sibangenan.index')->with('success', 'Data Pengajuan Berhasil Diupdate.');
        }catch (\Exception $e) {
            // Handle other unexpected errors
            return redirect()->back()->withErrors('An error occurred while updating the data.');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sibangenan = Sibangenan::find($id);
        $sibangenan->delete();
        return redirect()->route('sibangenan.index')->with('success', 'Data Pengajuan berhasil dihapus.');
    }
}
