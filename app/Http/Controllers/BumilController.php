<?php

namespace App\Http\Controllers;

use App\Bumil;
use Illuminate\Http\Request;

class BumilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bumil = Bumil::all();
        return view('pages.sijamil.index', compact('bumil'));
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
            'nik' => 'required',
            'nomorkk' => 'required',
            'nama' => 'required',
            'usia' => 'required|numeric',
            'rt' => 'required',
            'rw' => 'required',
            'nama_suami' => 'required',
        ]);

        $bumil = new Bumil();
        $bumil->nik = $request['nik'];
        $bumil->nomorkk = $request['nomorkk'];
        $bumil->nama = $request['nama'];
        $bumil->usia = $request['usia'];
        $bumil->rt = $request['rt'];
        $bumil->rw = $request['rw'];
        $bumil->tanggal_lahir = $request->tanggal_lahir;
        $bumil->tanggal_perkiraan_lahir = $request->tanggal_perkiraan_lahir;
        $bumil->golongan_darah = $request->golongan_darah;
        $bumil->riwayat_kesehatan = $request->riwayat_kesehatan;
        $bumil->nama_suami = $request['nama_suami'];
        $bumil->nomor_telepon_suami = $request->nomor_telepon_suami;
        $bumil->tanggal_kunjungan_terakhir = $request->tanggal_kunjungan_terakhir;
        $bumil->save();

        return redirect()->route('sijamil.index')->with('success', 'Data Ibu Hamil berhasil ditambahkan.');
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
        $bumil = Bumil::find($id);
        return view('pages.sijamil.editdatabumil', compact('bumil'));
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
        $request->validate([
            'nama' => 'required',
            'usia' => 'required|numeric',
        ]);

        $bumil = Bumil::find($id);
        $bumil->nik = $request->nik;
        $bumil->nomorkk = $request->nomorkk;
        $bumil->nama = $request->nama;
        $bumil->usia = $request->usia;
        $bumil->rt = $request->rt;
        $bumil->rw = $request->rw;
        $bumil->tanggal_lahir = $request->tanggal_lahir;
        $bumil->tanggal_perkiraan_lahir = $request->tanggal_perkiraan_lahir;
        $bumil->golongan_darah = $request->golongan_darah;
        $bumil->riwayat_kesehatan = $request->riwayat_kesehatan;
        $bumil->nama_suami = $request->nama_suami;
        $bumil->nomor_telepon_suami = $request->nomor_telepon_suami;
        $bumil->tanggal_kunjungan_terakhir = $request->tanggal_kunjungan_terakhir;
        $bumil->save();

        return redirect()->route('sijamil.index')->with('success', 'Data Ibu Hamil berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bumil = Bumil::find($id);
        $bumil->delete();
        return redirect()->route('sijamil.index')->with('success', 'Data Ibu Hamil Berhasil berhasil dihapus.');
    }
}
