<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Urusansibangenan;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UrusansibangenanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Urusansibangenan::all();
        return view('pages.setting-page.sibangenan.urusan', compact('data'));
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
        ]);
        
        $uuid = Str::uuid()->toString();

        $urusan = new Urusansibangenan();
        $urusan->id = $uuid;
        $urusan->nama = $request['nama'];
        $urusan->keterangan = $request['keterangan'];
        $urusan->save();

        return redirect()->route('setting-urusan-sibangenan.index')->with('success', 'Kategori berhasil ditambahkan.');
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
        $sibangenan = Urusansibangenan::find($id);
        $sibangenan->delete();
        return redirect()->route('setting-urusan-sibangenan.index')->with('success', 'Data Urusan berhasil dihapus.');
    }
}
