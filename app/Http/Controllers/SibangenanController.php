<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sibangenan;
use App\Urusansibangenan;
use App\User;
use App\Subcategory;
use App\UserActivity;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

class SibangenanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $years = Sibangenan::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->pluck('year');

        $selectedYear = request()->query('year');
        $data2 = Sibangenan::when($selectedYear, function ($query) use ($selectedYear) {
            return $query->whereYear('created_at', $selectedYear);
        })->get();

        $urusans = Urusansibangenan::all();
        $urusan2 = $urusans->sortBy('urutan');
        $urusan = $urusan2->values();

        $suburusan = Subcategory::all();

        $query2 = DB::table('sibangenan')
            ->join('urusansibangenan', 'sibangenan.urusan', '=', 'urusansibangenan.id')
            ->select('sibangenan.*', 'urusansibangenan.nama as nama_urusan')
            ->orderBy('sibangenan.created_at', 'desc');

        $userLevel = Auth::user()->level;

        if ($userLevel == 1) {
            // Jika user level adalah 1, maka tidak perlu menambahkan filter
        } else {
            // Jika user level bukan 1, maka filter berdasarkan nama pemohon yang login
            $query2->where('sibangenan.namapemohon', Auth::user()->name);
        }

        $data = $query2->get();
        return view ('pages.sibangenan.index', compact('data','urusan','years','data2','suburusan'));
    }

    // PDF Download
    public function generatePdf(Request $request)
    {
        try {
            // Ambil data yang diperlukan untuk halaman PDF, misalnya dari database
            $sibangenan = DB::table('sibangenan')
                ->join('urusansibangenan', 'sibangenan.urusan', '=', 'urusansibangenan.id')
                ->select('sibangenan.*', 'urusansibangenan.nama as nama_urusan')
                ->get();


            // Buat objek Dompdf baru
            $pdfOptions = new Options();
            $pdfOptions->set('isRemoteEnabled', true);
            $pdfOptions->set('isHtml5ParserEnabled', true);
            $pdf = new Dompdf($pdfOptions);

            // Render view blade.php ke dalam string HTML
            $html = view('pages.sibangenan.pdf', compact('sibangenan'))->render();

            // Load HTML ke dalam objek Dompdf
            $pdf->loadHtml($html);

            // Atur opsi rendering
            $pdf->setPaper('A4', 'potrait');

            // Render PDF
            $pdf->render();

            // Simpan atau kirimkan PDF sebagai respons
            // Jika ingin menyimpan PDF, Anda bisa menggunakan file_put_contents
            // atau menyimpannya ke storage atau lokasi lainnya
            // Jika ingin langsung mengirimkan sebagai respons, gunakan response()
            // Contoh: Simpan ke storage
            $pdf->stream('Data_Semua_Usulan_sibangenan_2023.pdf');
            
            // Jika ingin mengirim sebagai respons
            // return $pdf->stream('generated_pdf.pdf');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }


    public function ditolak()
    {
        $userLevel = Auth::user()->level;

        $rejectedData = Sibangenan::where('status_pengajuan', 'Ditolak')->get();
        $urusan = Urusansibangenan::all();
        $suburusan = Subcategory::all();

        $query = DB::table('sibangenan')
            ->join('urusansibangenan', 'sibangenan.urusan', '=', 'urusansibangenan.id')
            ->select('sibangenan.*', 'urusansibangenan.nama as nama_urusan')
            ->where('sibangenan.status_pengajuan', '=', 'Ditolak');

        if ($userLevel !== 1) {
                $query->where('sibangenan.namapemohon', Auth::user()->name);
        }

        $data = $query->get();

        return view ('pages.sibangenan.ditolak', compact('rejectedData','data'));
    }

    public function direvisi()
    {
        $userLevel = Auth::user()->level;
        $revisiData = Sibangenan::where('status_pengajuan', 'Direvisi')->get();
        $urusan = Urusansibangenan::all();
        $suburusan = Subcategory::all();
        $query = DB::table('sibangenan')
            ->join('urusansibangenan', 'sibangenan.urusan', '=', 'urusansibangenan.id')
            ->select('sibangenan.*', 'urusansibangenan.nama as nama_urusan')
            ->where('sibangenan.status_pengajuan', '=', 'Direvisi');
        
        if ($userLevel !== 1) {
                $query->where('sibangenan.namapemohon', Auth::user()->name);
        }
        $data = $query->get();
        return view ('pages.sibangenan.revisi', compact('revisiData','data'));
    }

    public function monitor()
    {
        $userLevel = Auth::user()->level;
        $urusan = Urusansibangenan::all();
        $suburusan = Subcategory::all();
        $query = DB::table('sibangenan')
            ->join('urusansibangenan', 'sibangenan.urusan', '=', 'urusansibangenan.id')
            ->select('sibangenan.*', 'urusansibangenan.nama as nama_urusan')
            ->where('sibangenan.status_pengajuan', '=', 'Verifikasi');
        if ($userLevel != 1) {
                $query->where('sibangenan.namapemohon', Auth::user()->name);
        }
        $data = $query->get();
        return view ('pages.sibangenan.monitor', compact('data'));
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
            $oldvalue = $sibangenan->attributesToArray();
            $sibangenan->save();
            $namauser = Auth::user()->name;
            UserActivity::create([
                'action' => 'Update',
                'model' => 'Sibangenan',
                'user_id' => auth()->id(),
                'user_name' => $namauser,
                'old_values' => json_encode($oldvalue)
            ]);
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

        $user = auth()->user();
        $currentYear = now()->year;
        $applicationCount = Sibangenan::where('namapemohon', $user->name)
            ->whereYear('created_at', $currentYear)
            ->count();

        if ($applicationCount >= 3) {
            return redirect()->route('sibangenan.index')->with('error', 'Anda telah mencapai batas permohonan untuk tahun ini.');
        }

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
        $new_value = $sibangenan->attributesToArray(); 
        $namauser = Auth::user()->name;
        UserActivity::create([
            'action' => 'Create',
            'model' => 'Sibangenan',
            'user_id' => auth()->id(),
            'user_name' => $namauser,
            'new_values' => json_encode($new_value)
        ]);
        return redirect()->route('sibangenan.index')->with('success', 'Pengajuan Berhasil Dibuat');
    }

    public function downloadFiles($id)
{
    $sibangenan = Sibangenan::findOrFail($id);
    $filePaths = json_decode($sibangenan->dokumen_pendukung, true);
    
    if (!is_array($filePaths) || empty($filePaths)) {
        return redirect()->back()->with('error', 'Tidak ada file yang tersedia untuk diunduh.');
    }

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

    if (file_exists($zipFileName)) {
        $headers = [
            'Content-Type' => 'application/zip',
        ];

        $namaPemohon = $sibangenan->namapemohon;

        // Buat nama file ZIP sesuai dengan nama pemohon
        $zipFileNameWithExtension = $namaPemohon . '_files.zip';

        return response()->download($zipFileName, $zipFileNameWithExtension, $headers);
    } else {
        // Tampilkan alert jika tidak ada file yang ditemukan
        return redirect()->back()->with('error', 'Tidak ada file yang tersedia untuk diunduh.');
    }
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
            $old_value = $sibangenan->attributesToArray();
            $sibangenan->save();

            $namauser = Auth::user()->name;
            UserActivity::create([
                'action' => 'Update',
                'model' => 'Sibangenan',
                'user_id' => auth()->id(),
                'user_name' => $namauser,
                'old_values' => json_encode($old_value)
            ]);
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
            $old_value = $sibangenan->attributesToArray();
            $sibangenan->save();
            $new_value = $sibangenan->attributesToArray(); 

            $namauser = Auth::user()->name;
            UserActivity::create([
                'action' => 'Update',
                'model' => 'Sibangenan',
                'user_id' => auth()->id(),
                'user_name' => $namauser,
                'old_values' => json_encode($old_value),
                'new_values' => json_encode($new_value)
            ]);
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
        $old_value = $sibangenan->attributesToArray();
        $sibangenan->delete();
        $namauser = Auth::user()->name;
        UserActivity::create([
            'action' => 'Delete',
            'model' => 'Sibangenan',
            'user_id' => auth()->id(),
            'user_name' => $namauser,
            'old_values' => json_encode($old_value)
        ]);
        return redirect()->route('sibangenan.index')->with('success', 'Data Pengajuan berhasil dihapus.');
    }
}
