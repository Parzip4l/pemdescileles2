<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\RealisasiController;
use App\Realisasi;

// Middleware   
Route::middleware('auth.user')->group(function () {
    // Dahsboard
    Route::resource('dashboard', DashboardController::class);
    // Sijamil resource 
    Route::resource('sijamil', RemajaController::class);
    Route::resource('bumil', BumilController::class);
    Route::get('/remajadata', 'RemajaController@dataremaja')->name('remaja');
    Route::get('/bumildata', 'BumilController@databumil')->name('bumil');
    // Berita
    Route::resource('berita', BeritaController::class);
    Route::resource('kategoriberita', KategoriBeritaController::class);
    // User Settings
    Route::resource('user-settings', UserSettingsController::class);
    Route::resource('user-level', UserLevelController::class);
    // Layanan Darurat
    Route::resource('layanan-darurat', LayananDaruratController::class);
    // Setting User Pages
    Route::resource('setting-page', SettingPageUserController::class);
    // sibangenan
    Route::resource('sibangenan', SibangenanController::class);
    Route::get('/realisasi-sibangenan', 'SibangenanController@realisasi')->name('realisasi.sibangenan');

    Route::get('/pengajuan-ditolak', 'SibangenanController@ditolak')->name('ditolak');
    Route::get('/pengajuan-direvisi', 'SibangenanController@direvisi')->name('direvisi');
    Route::get('/pengajuan-perlu-divalidasi', 'SibangenanController@monitor')->name('monitor');
    Route::post('/tolak-usulan/{id}', 'SibangenanController@updateStatusTolakC')->name('penolakan.usulan');
    Route::post('/revisi-usulan/{id}', 'SibangenanController@updateStatusRevisi')->name('revisi.usulan');
    Route::post('/setujui-usulan/{id}', 'SibangenanController@updateStatusSetuju')->name('setujui.usulan');
    Route::get('/subcategories', 'SubcategoryController@getSubcategories')->name('subcategories.get');
    Route::resource('suburusan', SubcategoryController::class);

    // Download Dokumen Pendukung
    Route::get('sibangenan/{id}/download', 'SibangenanController@downloadFiles')->name('sibangenan.download');
    // Warga Data
    Route::resource('warga', WargaController::class);
    Route::get('/remaja/autocomplete', 'RemajaController@autocomplete')->name('remaja.autocomplete');
    Route::get('/bumil/create/autocomplete', 'BumilController@autocomplete2')->name('bumil.autocomplete2');

    // Setting Page
    Route::resource('setting-urusan-sibangenan', UrusansibangenanController::class);

    // Kegiatan
    Route::resource('kegiatan', KegiatanController::class);
    Route::get('kategori-kegiatan', 'KategoriBeritaController@indexkategori')->name('kategori-kegiatan');

    // Pengurus
    Route::resource('pengurus', PengurusController::class);

    // informasi publik
    Route::get('publikasi-data', 'InformasiController@viewinformasi')->name('informasi.data');

    // Download Data
    Route::get('download-pdf', 'SibangenanController@generatePdf')->name('generate-pdf');

    // User Activity Data
    Route::resource('user-log', UseractivityController::class);

    // ProgramUnggulan Data
    Route::resource('program-unggulan', ProgramUnggulanController::class);

    // Kepala Desa
    Route::resource('kepala-desa', KadesController::class);

    // Realisasi
    Route::post('/realisasi/store', [RealisasiController::class, 'store'])->name('realisasi.store');

    // Ganti Pass
    Route::put('/user-settings/{id}/update-password', 'UserSettingsController@changePassword')->name('pass.update');

    // Stream Realisasi

    Route::get('/realisasi/pdf/{id}', function ($id) {
        $realisasi = Realisasi::findOrFail($id);

        $filePath = $realisasi->file_path;

        if (!$filePath || !Storage::disk('public')->exists($filePath)) {
            abort(404, 'File tidak ditemukan.');
        }
        $fullPath = storage_path('app/public/' . $filePath);

        return response()->file($fullPath);
    })->name('realisasi.pdf');
});
Route::get('/filterData', [RemajaController::class, 'filterData'])->name('filterData');
// Auth
Route::controller(LoginController::class)->group(function(){
    Route::get('login','index')->name('login');
    Route::post('login/proses','proses');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Index User
Route::resource('/', HomeController::class);
// Profile Desa User Pages
Route::resource('profile-desa-cileles', ProfileDesaController::class);

// Berita Page
Route::get('berita-desa', 'HomeController@beritapage')->name('berita-desa');
Route::get('berita-desa/search', 'HomeController@beritasearch')->name('berita.search');
Route::get('berita-desa/{judul}', 'BeritaController@single')->name('berita.single');

// Kritik Dan Saran
Route::post('kritik-saran', 'HomeController@store')->name('kritik.store');
Route::get('kritik-saran-page', 'HomeController@kritiksaran')->name('kritik.index');

// Demografi
Route::get('demografi-desa', 'ProfileDesaController@demografi')->name('demografi.desa');

// Informasi Page
Route::resource('informasi-publik', InformasiController::class);
Route::get('informasi-publik/{id}/download', 'InformasiController@download')->name('informasi.download');

// Sibangenan Publik
Route::get('/dashboard-publik', 'HomeController@publicsibangenan')->name('publiksibangenan');
Route::get('/dashboard-sijamil', 'HomeController@publicsijamil')->name('publiksijamil');

Route::get('/datawarga', function () {
    return view('pages/warga-data/index');
});

Route::get('/esip', function () {
    return view('pages/esip/index');
});

Route::group(['prefix' => 'esip'], function(){
    Route::get('/catatan-kelahiran', function () {
        return view('pages/esip/form1/index');
    });
    Route::get('/register-bayi', function () {
        return view('pages/esip/form2/index');
    });
    Route::get('/register-balita', function () {
        return view('pages/esip/form3/index');
    });
    Route::get('/bgm', function () {
        return view('pages/esip/bgm/index');
    });
    Route::get('/databumil', function () {
        return view('pages/esip/databumil/index');
    });
    Route::get('/skdn', function () {
        return view('pages/esip/skdn/index');
    });
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// 404 for undefined routes
Route::any('/{page?}',function(){
    return View::make('pages.error.404');
})->where('page','.*');

