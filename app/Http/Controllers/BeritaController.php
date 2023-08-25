<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\Kategoriberita;
use App\Kegiatan;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::all();
        return view('pages.berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategoriberita::all();
        return view('pages.berita.create', compact('kategori'));
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
            'konten' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        $berita = new Berita();
        $berita->judul = $request->input('judul');
        $berita->konten = $request->input('konten');
        $berita->kategori = $request->input('kategori');
        $berita->penulis = $request->input('penulis');
        $berita->excerpt = $request->input('excerpt');
        
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $filename);
            $berita->gambar = $filename;
        }
        $berita->save();
        return redirect()->route('berita.index')->with('success','Berita berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($judul)
    {
        $kegiatan = Kegiatan::orderBy('tanggal_kegiatan', 'asc')->paginate(3);
        $beritaterbaru = Berita::orderBy('created_at', 'asc')->paginate(3);
        $berita = Berita::where('judul', $judul)->firstOrFail();
        return view('pages.berita.single', compact('berita','kegiatan','beritaterbaru'));
    }

    public function single($judul)
    {
        $kegiatan = Kegiatan::orderBy('tanggal_kegiatan', 'asc')->paginate(3);
        $beritaterbaru = Berita::orderBy('created_at', 'asc')->paginate(3);
        $berita = Berita::where('judul', $judul)->firstOrFail();
        return view('pages.berita.single', compact('berita','kegiatan','beritaterbaru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::find($id);
        $kategori = Kategoriberita::all();
        return view('pages.berita.edit', compact('berita','kategori'));
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
            $berita = Berita::find($id);
            $berita->judul = $request->judul;
            $berita->konten = $request->konten;
            $berita->kategori = $request->kategori;
            $berita->penulis = $request->penulis;
            $berita->excerpt = $request->excerpt;
            if ($request->hasFile('gambar')) {
                $image = $request->file('gambar');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $filename);
                $berita->gambar = $filename;
            }
            $berita->save();
            return redirect()->route('berita.index')->with('success', 'Data Berita Berhasil Diupdate.');
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
        $berita = Berita::find($id);
        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
