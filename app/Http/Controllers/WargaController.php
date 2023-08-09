<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Warga;
use Illuminate\Support\Str;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warga = Warga::all();
        $data  = Warga::all();
        return view('pages.warga-data.index', compact('warga','data'));
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
        try{
            //validate form
            $this->validate($request, [
                'nik'     => 'required|unique:warga',
                'nokk'     => 'required|max:16'
            ]);

            $uuid = Str::uuid()->toString();
    
            //create post
            Warga::create([
                'id' => $uuid,
                'nik'     => $request->nik,
                'nokk'   => $request->nokk,
                'hubungankk'   => $request->hubungankk,
                'rt'     => $request->rt,
                'rw'   => $request->rw,
                'nama'     => $request->nama,
                'jk'   => $request->jk,
                'agama'     => $request->agama,
                'pendidikan'   => $request->pendidikan,
                'pekerjaan'     => $request->pekerjaan,
                'tanggal_lahir'   => $request->tanggal_lahir,
                'tempat_lahir'     => $request->tempat_lahir,
                'statusperkawinan'   => $request->statusperkawinan,
                'nomortelepon'   => $request->nomortelepon,
                'nama_ayah'     => $request->nama_ayah,
                'nama_ibu'     => $request->nama_ibu,
                'golongan_darah'     => $request->golongan_darah
            ]);
            
            //redirect to index
            return redirect()->route('warga.index')->with(['success' => 'Data Berhasil Disimpan!']);
            } catch (ValidationException $exception) {
                if ($request->expectsJson()) {
                    return response()->json([
                        'message' => $exception->validator->errors()->first(),
                        'status'  => 'error'
                    ], 422);
                }
        
                $errorMessage = $exception->validator->errors()->first();
                return redirect()->route('warga.index')->with('error', 'Gagal menyimpan data. ' . $errorMessage);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $warga = Warga::find($id);
            if ($warga->nik !== $request->nik) {
                $request->validate([
                    'nik' => 'required|unique:warga,nik'
                ]);
            }
            $warga->nik = $request->nik;
            $warga->nokk = $request->nokk;
            $warga->rt = $request->rt;
            $warga->rw = $request->rw;
            $warga->nama = $request->nama;
            $warga->golongan_darah = $request->golongan_darah;
            $warga->jk = $request->jk;
            $warga->hubungankk = $request->hubungankk;
            $warga->agama = $request->agama;
            $warga->pendidikan = $request->pendidikan;
            $warga->pekerjaan = $request->pekerjaan;
            $warga->tanggal_lahir = $request->tanggal_lahir;
            $warga->tempat_lahir = $request->tempat_lahir;
            $warga->statusperkawinan = $request->statusperkawinan;
            $warga->nomortelepon = $request->nomortelepon;
            $warga->nama_ayah = $request->nama_ayah;
            $warga->nama_ibu = $request->nama_ibu;
            $warga->save();
    
            return redirect()->route('warga.index')->with('success', 'Data Warga Berhasil Diupdate.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
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
        $warga = Warga::find($id);
        $warga->delete();
        return redirect()->route('warga.index')->with('success', 'Data Warga berhasil dihapus.');
    }
}
