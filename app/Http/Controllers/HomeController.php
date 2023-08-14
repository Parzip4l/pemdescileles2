<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\Kegiatan;
use App\Remaja;
use App\Bumil;
use App\Warga;
use App\Sibangenan;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::orderBy('created_at', 'desc')->take(4)->get();
        $kegiatan = Kegiatan::all();
        $remaja = Remaja::all()->count();
        $bumil = Bumil::all()->count();
        $warga = Warga::all()->count();
        return view ('pages.user-pages.index', compact('berita','kegiatan','bumil','remaja','warga'));
    }

    public function beritapage()
    {
        $berita = Berita::paginate(9);
        $berita2 = Berita::orderBy('created_at', 'desc')->take(4)->get();
        return view ('pages.berita.indexuser', compact('berita','berita2'));
    }

    public function publicsibangenan()
    {
        $sibangenanData = Sibangenan::select('status_pengajuan', DB::raw('count(*) as total'))
            ->groupBy('status_pengajuan')
            ->pluck('total', 'status_pengajuan');
        
        $yearlyData = Sibangenan::selectRaw('YEAR(created_at) as year, COUNT(*) as total')
            ->groupBy('year')
            ->orderBy('year')
            ->get();

        $statuses = $sibangenanData->keys()->toArray();
        $totals = $sibangenanData->values()->toArray();

        $years = $yearlyData->pluck('year')->toArray();
        $totalss = $yearlyData->pluck('total')->toArray();
        return view('pages.user-pages.publik-sibangenan', compact('statuses','totals','years','totalss'));
    }

    public function publicsijamil()
    {
        return view('pages.user-pages.publik-sijamil');
    }

    public function beritasearch(Request $request)
    {
        $searchTerm = $request->input('search');

        $berita = Berita::where('judul', 'LIKE', "%$searchTerm%")
            ->orWhere('kategori', 'LIKE', "%$searchTerm%")
            ->latest()
            ->paginate(10);

        return view('pages.berita.indexwarga', compact('berita', 'searchTerm'));
    }

    public function single($judul)
    {
        $berita = Berita::where('judul', $judul)->firstOrFail();
        $tes = Berita::orderBy('created_at', 'desc')->take(4)->get();
        return view('pages.berita.single', compact('berita','tes'));
    }
}
