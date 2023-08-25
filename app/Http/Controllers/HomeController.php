<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\Kegiatan;
use App\Remaja;
use App\Bumil;
use App\Warga;
use App\Sibangenan;
use App\Urusansibangenan;
use App\Subcategory;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use App\Kritik;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

        // instagram Embed 
        $accessToken = 'IGQWROWk5NMFcxT2hkekZADSEd3NkJoejdCMDcta2c2dmhqSjR1SS03QUdKVWxIWjFFYXVvVjBIMW1BenFDVy11TUE2ZAkFja3FFZATFJSUlHU09ZAXzZARdFFyTC14X04yLXgyb3RrSDJvT2UyU2paamRpYjFlREJhZA2cZD';
        $userId = '1921920344';

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

        $sibangenandataurusan = Sibangenan::select('suburusan', DB::raw('count(*) as total'))
            ->groupBy('suburusan')
            ->pluck('total', 'suburusan');

        $urusan1 = $sibangenandataurusan->keys()->toArray();
        $urusan2 = $sibangenandataurusan->values()->toArray();

        $statuses = $sibangenanData->keys()->toArray();
        $totals = $sibangenanData->values()->toArray();

        $years = $yearlyData->pluck('year')->toArray();
        $totalss = $yearlyData->pluck('total')->toArray();

        $urusan = DB::table('subcategories')
            ->join('urusansibangenan', 'subcategories.category_id', '=', 'urusansibangenan.id')
            ->select('subcategories.*', 'urusansibangenan.nama', 'urusansibangenan.level')
            ->get();
        return view('pages.user-pages.publik-sibangenan', compact('statuses','totals','years','totalss','urusan','urusan1','urusan2'));
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

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nohp' => 'required',
            'kritik' => 'required'
        ]);

        $uuid = Str::uuid()->toString();
        
        $kritiksaran = new Kritik();
        $kritiksaran->id = $uuid;
        $kritiksaran->nama = $request->input('nama');
        $kritiksaran->nohp = $request->input('nohp');
        $kritiksaran->kritik = $request->input('kritik');
        $kritiksaran->save();
        return redirect()->back()->with('success','Terimakasih Telah Memberikan Kritik & Saran Kepada Kami.')
        ->with('show_modal', true);
    }

    public function kritiksaran()
    {
        $kritik = Kritik::all();
        return view('pages.kritik.index',compact('kritik'));
    }
}
