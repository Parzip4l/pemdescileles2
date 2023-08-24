<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kades;
use App\UserActivity;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class KadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kades = Kades::orderBy('created_at', 'asc')->get();
        return view('pages.setting-page.kades.index', compact('kades'));
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
            'nama' => 'required',
            'dari_tahun' => 'required',
            'sampai_tahun' => 'required',
            'pemimpin_sekarang' => 'required'
        ]);

        $uuid = Str::uuid()->toString();
        
        $kades = new Kades();
        $kades->id = $uuid;
        $kades->nama = $request->input('nama');
        $kades->dari_tahun = $request->input('dari_tahun');
        $kades->sampai_tahun = $request->input('sampai_tahun');
        $kades->pemimpin_sekarang = $request->input('pemimpin_sekarang');
        
        $kades->save();
        $new_value = $kades->attributesToArray(); 
        $namauser = Auth::user()->name;
        UserActivity::create([
            'action' => 'Create',
            'model' => 'Kepala Desa',
            'user_id' => auth()->id(),
            'user_name' => $namauser,
            'new_values' => json_encode($new_value)
        ]);
        return redirect()->route('kepala-desa.index')->with('success', 'Data Kepala Desa Berhasil Dibuat');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
