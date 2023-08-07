<?php

namespace App\Http\Controllers;

use App\Bumil;
use App\Warga;
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

    public function databumil()
    {
        $bumil = Bumil::all();
        return view('pages.sijamil.indexbumil', compact('bumil'));
    }

    public function autocomplete2(Request $request)
    {
        $term = $request->input('term');
        $warga = Warga::select('id', 'nama', 'nik', 'nokk', 'jk', 'rt', 'rw','tanggal_lahir','golongan_darah')
            ->where('jk', '2')
            ->where('nik', 'LIKE', '%' . $term . '%')
            ->get();
        
        $response = array();
        foreach($warga as $data){
            $response[] = array(
                'id' => $data->id,
                'value' => $data->nama,
                'nik' => $data->nik,
                'nokk' => $data->nokk,
                'rt' => $data->rt,
                'rw' => $data->rw,
                'tanggal_lahir' => $data->tanggal_lahir,
                'golongan_darah' => $data->golongan_darah
            );
        }
        
        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.sijamil.tambahbumil');
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
            'nik' => 'required|unique:bumil',
            'nomorkk' => 'required',
            'nama' => 'required',
            'usia' => 'required|numeric',
            'rt' => 'required',
            'rw' => 'required',
            'nama_suami' => 'required',
            'haid_terakhir' => 'required',
            'umur_kehamilan' => 'required',
            'kb_pasca_bersalin' => 'required',
            'tambahan_darah' => 'required'
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
        $bumil->haid_terakhir = $request->haid_terakhir;
        $bumil->umur_kehamilan = $request->umur_kehamilan;
        $bumil->kb_pasca_bersalin = $request->kb_pasca_bersalin;
        $bumil->jenis_kb = $request->jenis_kb;
        $bumil->tambahan_darah = $request->tambahan_darah;
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
