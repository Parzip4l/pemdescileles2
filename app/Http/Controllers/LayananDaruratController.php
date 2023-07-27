<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Layanandarurat;

class LayananDaruratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $layanan = Layanandarurat::all();
        return view('pages.layanan-darurat.index', compact('layanan'));
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
            'namalayanan' => 'required',
        ]);

        $layanan = new Layanandarurat();
        $layanan->namalayanan = $request->namalayanan;
        $layanan->nomorlayanan = $request->nomorlayanan;
        $layanan->save();

        return redirect()->route('layanan-darurat.index')->with('success', 'Data Layanan Darurat berhasil ditambahkan.');
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
        $request->validate([
            'namalayanan' => 'required',
        ]);

        $layanan = Layanandarurat::find($id);
        $layanan->namalayanan = $request->namalayanan;
        $layanan->nomorlayanan = $request->nomorlayanan;
        $layanan->save();

        return redirect()->route('layanan-darurat.index')->with('success', 'Data Layanan Darurat berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $layanan = Layanandarurat::find($id);
        $layanan->delete();
        return redirect()->route('layanan-darurat.index')->with('success', 'Layanan Darurat berhasil dihapus.');
    }
}
