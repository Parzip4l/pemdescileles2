<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sibangenan;
use App\Urusansibangenan;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SibangenanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Sibangenan::all();
        $urusan = urusansibangenan::all();
        return view ('pages.sibangenan.index', compact('data','urusan'));
    }

    public function ditolak()
    {
        $rejectedData = Sibangenan::where('status_pengajuan', 'Ditolak')->get();
        return view ('pages.sibangenan.ditolak', compact('rejectedData'));
    }

    public function updateStatusTolak($id)
    {
        $sibangenan = Sibangenan::findOrFail($id);
        if ($sibangenan->status_pengajuan !== 'Ditolak') {
            $sibangenan->status_pengajuan = 'Ditolak';
            $sibangenan->save();
        }

        return redirect()->back()->with('success', 'Usulan berhasil ditolak.');
    }

    public function updateStatusSetuju($id)
    {
        $sibangenan = Sibangenan::findOrFail($id);
        if ($sibangenan->status_pengajuan !== 'Disetujui') {
            $sibangenan->status_pengajuan = 'Disetujui';
            $sibangenan->save();
        }
        return redirect()->back()->with('success', 'Usulan berhasil disetujui.');
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
            'dokumen_pendukung' => 'required|mimes:jpeg,png,pdf|max:2048',
            'status_pengajuan' => 'required'
        ]);

        $uuid = Str::uuid()->toString();
        
        $sibangenan = new Sibangenan();
        $sibangenan->id = $uuid;
        $sibangenan->namapemohon = $request->input('namapemohon');
        $sibangenan->rw = $request->input('rw');
        $sibangenan->permasalahan = $request->input('permasalahan');
        $sibangenan->urusan = $request->input('urusan');
        $sibangenan->usulan = $request->input('usulan');
        $sibangenan->lokasi = $request->input('lokasi');
        $sibangenan->status_pengajuan = $request->input('status_pengajuan');

        if ($request->hasFile('dokumen_pendukung')) {
            $path = $request->file('dokumen_pendukung')->store('public/files');
    
            // Save the file name in the database
            $sibangenan->dokumen_pendukung = $path;
        }

        $sibangenan->save();
        return redirect()->route('sibangenan.index')->with('success', 'Pengajuan Berhasil Dibuat');
    }

    public function download($id)
    {
        $sibangenan = Sibangenan::findOrFail($id);

        $file_path = storage_path('app/' .$sibangenan->dokumen_pendukung);

        return response()->download($file_path);
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
