<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\Kategoriberita;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kegiatan::all();
        return view ('pages.kegiatan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategoriberita::where('parent_kategori', 'Kegiatan')->get();
        return view('pages.kegiatan.create', compact('kategori'));
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
            'judul' => 'required',
            'tanggal_kegiatan' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $uuid = Str::uuid()->toString();
        
        $kegiatan = new Kegiatan();
        $kegiatan->id = $uuid;
        $kegiatan->judul = $request->input('judul');
        $kegiatan->kategori = $request->input('kategori');
        $kegiatan->tanggal_kegiatan = $request->input('tanggal_kegiatan');
        $kegiatan->keterangan_singkat = $request->input('keterangan_singkat');
        $kegiatan->keterangan = $request->input('keterangan');
        $kegiatan->lokasi = $request->input('lokasi');
        
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $filename);
            $kegiatan->gambar = $filename;
        }
        $kegiatan->save();
        return redirect()->route('kegiatan.index')->with('success','Kegiatan berhasil dibuat.');
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
        $kegiatan = Kegiatan::find($id);
        $kegiatan->delete();
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
