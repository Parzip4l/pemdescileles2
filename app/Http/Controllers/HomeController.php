<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\Kegiatan;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::all();
        $kegiatan = Kegiatan::paginate(4);
        return view ('pages.user-pages.index', compact('berita','kegiatan'));
    }

    public function beritapage()
    {
        $berita = Berita::paginate(9);
        return view ('pages.berita.indexuser', compact('berita'));
    }

    public function beritasearch(Request $request)
    {
        $searchTerm = $request->input('search');

        $beritas = Berita::where('judul', 'LIKE', "%$searchTerm%")
            ->orWhere('kategori', 'LIKE', "%$searchTerm%")
            ->latest()
            ->paginate(10);

        return view('pages.berita.indexwarga', compact('beritas', 'searchTerm'));
    }

    public function single($judul)
    {
        $berita = Berita::where('judul', $judul)->firstOrFail();
        return view('pages.berita.single', compact('berita'));
    }
}
