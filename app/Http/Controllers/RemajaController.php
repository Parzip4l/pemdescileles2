<?php

namespace App\Http\Controllers;

use App\Remaja;
use App\Bumil;
use App\Warga;
use Illuminate\Http\Request;

class RemajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $remaja = Remaja::all();
        $bumil = Bumil::all();
        return view('pages.sijamil.index', compact('remaja','bumil'));
    }

    public function dataremaja()
    {
        $remaja = Remaja::all();
        return view ('pages.sijamil.indexremaja', compact('remaja'));
    }

    public function autocomplete(Request $request)
    {
        $term = $request->input('term');
        $warga = Warga::select('id', 'nama', 'nik', 'nokk', 'jk', 'rt', 'rw', 'nomortelepon','nama_ayah','nama_ibu')
            ->where('nik', 'LIKE', '%' . $term . '%')
            ->get();
        
        $response = array();
        foreach($warga as $user){
            $response[] = array(
                'id' => $user->id,
                'value' => $user->nama,
                'nik' => $user->nik,
                'nokk' => $user->nokk,
                'jk' => $user->jk,
                'rt' => $user->rt,
                'rw' => $user->rw,
                'nomortelepon' => $user->nomortelepon,
                'nama_ayah' => $user->nama_ayah,
                'nama_ibu' => $user->nama_ibu
            );
        }
        
        return response()->json($response);
    }

    public function create ()
    {
        return view('pages.sijamil.tambahremaja');
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
            'nik' => 'required|unique:remaja',
            'nomorkk' => 'required',
            'nama' => 'required',
            'usia' => 'required|numeric',
            'jenis_kelamin' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'nomor_telepon' => 'required',
        ]);

        $remaja = new Remaja();
        $remaja->nik = $request['nik'];
        $remaja->nomorkk = $request['nomorkk'];
        $remaja->nama = $request['nama'];
        $remaja->usia = $request['usia'];
        $remaja->jenis_kelamin = $request['jenis_kelamin'];
        $remaja->rt = $request['rt'];
        $remaja->rw = $request['rw'];
        $remaja->nama_ayah = $request['nama_ayah'];
        $remaja->nama_ibu = $request['nama_ibu'];
        $remaja->nomor_telepon = $request['nomor_telepon'];
        $remaja->save();

        return redirect()->route('sijamil.index')->with('success', 'Data remaja berhasil ditambahkan.');
    }

    // Filter Data
    public function filterData(Request $request)
    {
        $rt = $request->input('rt');
        $rw = $request->input('rw');
        $jenisKelamin = $request->input('jenis_kelamin');

        $data = YourModel::when($rt, function ($query) use ($rt) {
                return $query->where('rt', $rt);
            })
            ->when($rw, function ($query) use ($rw) {
                return $query->where('rw', $rw);
            })
            ->when($jenisKelamin, function ($query) use ($jenisKelamin) {
                return $query->where('jenis_kelamin', $jenisKelamin);
            })
            ->get();

        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('remaja.show', compact('remaja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $remaja = Remaja::find($id);
        return view('pages.sijamil.editremaja', compact('remaja'));
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
            'jenis_kelamin' => 'required',
        ]);

        $remaja = Remaja::find($id);
        $remaja->nik = $request->nik;
        $remaja->nomorkk = $request->nomorkk;
        $remaja->nama = $request->nama;
        $remaja->usia = $request->usia;
        $remaja->jenis_kelamin = $request->jenis_kelamin;
        $remaja->rt = $request->rt;
        $remaja->rw = $request->rw;
        $remaja->nama_ayah = $request->nama_ayah;
        $remaja->nama_ibu = $request->nama_ibu;
        $remaja->nomor_telepon = $request->nomor_telepon;
        $remaja->save();

        return redirect()->route('sijamil.index')->with('success', 'Data remaja berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $remaja = Remaja::find($id);
        $remaja->delete();
        return redirect()->route('sijamil.index')->with('success', 'Data remaja berhasil dihapus.');
    }
}
