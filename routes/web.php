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
    Route::get('/pengajuan-ditolak', 'SibangenanController@ditolak')->name('ditolak');
    Route::post('/tolak-usulan/{id}', 'SibangenanController@updateStatusTolak')->name('tolak.usulan');
    Route::post('/setujui-usulan/{id}', 'SibangenanController@updateStatusSetuju')->name('setujui.usulan');
    // Download Dokumen Pendukung
    Route::get('sibangenan/{id}/download', 'SibangenanController@download')->name('sibangenan.download');
    // Warga Data
    Route::resource('warga', WargaController::class);
    Route::get('/remaja/autocomplete', 'RemajaController@autocomplete')->name('remaja.autocomplete');
    Route::get('/bumil/create/autocomplete', 'BumilController@autocomplete2')->name('bumil.autocomplete2');

    // Setting Page
    Route::resource('setting-urusan-sibangenan', UrusansibangenanController::class);

    // Kegiatan
    Route::resource('kegiatan', KegiatanController::class);
    Route::get('kategori-kegiatan', 'KategoriBeritaController@indexkategori')->name('kategori-kegiatan');
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
Route::get('berita-desa/{judul}', 'HomeController@single')->name('berita.single');

Route::get('/datawarga', function () {
    return view('pages/warga-data/index');
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// 404 for undefined routes
Route::any('/{page?}',function(){
    return View::make('pages.error.404');
})->where('page','.*');

