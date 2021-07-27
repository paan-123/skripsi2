<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\JamaahController;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\PostDataKK;
use App\Http\Controllers\PostDataInduk;
use App\Http\Controllers\UserAuthController;
use Faker\Guesser\Name;
use Laravel\Socialite\Facades\Socialite;

/////////AUTENTIKASI///////////
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');
Route::get('/', [LoginController::class, 'login']);
Route::get('login', [LoginController::class, 'login']);

// Route::middleware(['auth'])->group(function () {
Route::middleware(['admin'])->group(function () {

    /////////HOME///////////
    Route::get('/home', 'App\Http\Controllers\PagesController@home');

    /////////DATA WARGA KK///////////
    Route::get('data_kk', 'App\Http\Controllers\PagesController@datakk');
    Route::get('data_kk', 'App\Http\Controllers\JamaahController@datakk');
    Route::get('formkk', 'App\Http\Controllers\PagesController@formdatakk');

    Route::get('edit_transaksi/{kd_induk}', 'App\Http\Controllers\JamaahController@editTransaksi')->name('edit.transaksi');
    Route::post('edit_transaksi/', 'App\Http\Controllers\JamaahController@simpanEditTransaksi')->name('simpan.transaksi');

    /////////DATA WARGA INDUK///////////
    Route::get('/data_induk', 'App\Http\Controllers\PagesController@data_induk');
    Route::get('/data_induk', 'App\Http\Controllers\JamaahController@datainduk');
    Route::get('/datainduk', 'App\Http\Controllers\JamaahController@data_induk');
    Route::get('/ibadah', 'App\Http\Controllers\JamaahController@ibadah');
    Route::get('/keahlian', 'App\Http\Controllers\JamaahController@ibadah');

    /////////TAMPIL DATA///////////
    Route::get('/md_rumah', 'App\Http\Controllers\JamaahController@mdrumah');
    Route::get('/md_rw', 'App\Http\Controllers\JamaahController@mdrw');
    Route::get('/md_rt', 'App\Http\Controllers\JamaahController@mdrt');

    Route::get('transaksi', 'App\Http\Controllers\JamaahController@transaksi_datakk');
    Route::get('transaksi', 'App\Http\Controllers\PagesController@transaksi')->name('transaksi');
    Route::get('transaksi', [JamaahController::class, 'joindkdi'])->name('JamaahController.joindkdi');
    Route::get('transaksi/{no_kk}', 'App\Http\Controllers\PostDataKK@tampilTransaksi');

    Route::get('/data_keahlian', 'App\Http\Controllers\PagesController@data_keahlian');
    Route::get('/data_keahlian', [JamaahController::class, 'joinkj'])->name('JamaahController.joinkj');

    Route::get('/golongan_darah', 'App\Http\Controllers\PagesController@golongan_darah');
    Route::get('/golongan_darah', [JamaahController::class, 'joingd'])->name('JamaahController.joingd');

    Route::get('/pekerjaan', 'App\Http\Controllers\PagesController@pekerjaan');
    Route::get('/pekerjaan', [JamaahController::class, 'joinpk'])->name('JamaahController.joinpk');

    Route::get('/pendidikan', 'App\Http\Controllers\PagesController@pendidikan');
    Route::get('/pendidikan', [JamaahController::class, 'joinpd'])->name('JamaahController.joinpd');

    Route::get('/form_datakk', 'App\Http\Controllers\PagesController@form_datakk');
    Route::get('/form_datainduk', 'App\Http\Controllers\PagesController@form_datainduk');

    ///FORMULIR///
    Route::get('/add-post-di', [PostDataInduk::class, 'addPostDI'])->name('postdi.add');
    Route::post('/add-post-di', [PostDataInduk::class, 'savePostDI'])->name('savedi.post');

    Route::get('/add-post-dkk', [PostDataKK::class, 'addPostDKK'])->name('postdkk.add');
    Route::post('/add-post-dkk', [PostDataKK::class, 'savePostDKK'])->name('savedkk.post');

    Route::get('/edit_data_induk/{kd_induk}', [PostDataInduk::class, 'editPost'])->name('postdi.edit');
    Route::post('/update-post-di', [PostDataInduk::class, 'updatePost'])->name('updatedi.post');
    Route::get('/delete_data_induk/{kd_induk}', [PostDataInduk::class, 'deletePost'])->name('post.delete');

    Route::get('/edit_dkk/{no_kk}', [PostDataKK::class, 'editPost'])->name('postdkk.edit');
    Route::post('/update-post-dkk', [PostDataKK::class, 'updatePost'])->name('updatedkk.post');
    Route::get('/delete_data_kk/{no_kk}', [PostDataKK::class, 'deletePost'])->name('post.delete');

    // Route::get('/tambah-anggota/{no_kk}', [PostDataKK::class, 'tambahAnggota'])->name('tambah.post');
    Route::get('transaksi_datainduk/{no_kk}', 'App\Http\Controllers\PostDataKK@transaksi_datainduk');
    Route::post('tambah-anggota', [PostDataKK::class, 'saveTambahAnggota'])->name('save.tambah');



    Route::get('red_rw', 'App\Http\Controllers\JamaahController@home');
    Route::get('red_rw/warga', 'App\Http\Controllers\JamaahController@warga');
    Route::get('red_rw/datakk', 'App\Http\Controllers\JamaahController@data_kk');
    Route::get('red_rw/ekonomi', 'App\Http\Controllers\JamaahController@ekonomi');
    Route::get('red_rw/pekerjaan', 'App\Http\Controllers\JamaahController@pekerjaan');
    Route::get('red_rw/pendidikan', 'App\Http\Controllers\JamaahController@pendidikan');
    Route::get('red_rw/agama', 'App\Http\Controllers\JamaahController@agama');


    Route::get('red_pkk', 'App\Http\Controllers\JamaahController@homepkk');
    Route::get('red_pkk/warga', 'App\Http\Controllers\JamaahController@wargapkk');
    Route::get('red_pkk/pekerjaan', 'App\Http\Controllers\JamaahController@pekerjaanpkk');
    Route::get('red_pkk/keahlian', 'App\Http\Controllers\JamaahController@keahlianpkk');


    Route::get('red_kt', 'App\Http\Controllers\JamaahController@homekt');
    Route::get('red_kt/warga', 'App\Http\Controllers\JamaahController@wargakt');
    Route::get('red_kt/laki', 'App\Http\Controllers\JamaahController@laki');
    Route::get('red_kt/perempuan', 'App\Http\Controllers\JamaahController@perempuan');
    Route::get('red_kt/keahlian', 'App\Http\Controllers\JamaahController@keahliankt');
});

Route::middleware(['karangtaruna'])->group(function () {
    Route::get('/kt', 'App\Http\Controllers\KTController@home');
    Route::get('/kt/warga', 'App\Http\Controllers\KTController@warga');
    Route::get('/kt/laki', 'App\Http\Controllers\KTController@laki');
    Route::get('/kt/perempuan', 'App\Http\Controllers\KTController@perempuan');
    Route::get('/kt/karangtaruna', 'App\Http\Controllers\KTController@karangtaruna');
    Route::get('/kt/keahlian', 'App\Http\Controllers\KTController@keahlian');

    //detail
    Route::get('/kt/detail', 'App\Http\Controllers\KTController@detail');
    Route::get('/kt/detail2', 'App\Http\Controllers\KTController@detail2');
    Route::get('/kt/detail13', 'App\Http\Controllers\KTController@detail13');
});

Route::middleware(['pkk'])->group(function () {
    Route::get('/pkk', 'App\Http\Controllers\PkkController@home');
    Route::get('/pkk/warga', 'App\Http\Controllers\PkkController@warga');
    Route::get('/pkk/pkk', 'App\Http\Controllers\PkkController@pkk');
    Route::get('/pkk/kwt', 'App\Http\Controllers\PkkController@kwt');
    Route::get('/pkk/pekerjaan', 'App\Http\Controllers\PkkController@pekerjaan');
    Route::get('/pkk/keahlian', 'App\Http\Controllers\PkkController@keahlian');
    Route::get('/pkk/detail', 'App\Http\Controllers\PkkController@detail');
    Route::get('/pkk/detail2', 'App\Http\Controllers\PkkController@detail2');
    Route::get('/pkk/detail13', 'App\Http\Controllers\PkkController@detail13');
});

Route::middleware(['rw'])->group(function () {
    Route::get('/rw', 'App\Http\Controllers\RwController@home');
    Route::get('/rw/warga', 'App\Http\Controllers\RwController@warga');
    Route::get('/rw/datakk', 'App\Http\Controllers\RwController@datakk');
    Route::get('/rw/usia', 'App\Http\Controllers\RwController@usia');
    Route::get('/rw/ekonomi', 'App\Http\Controllers\RwController@ekonomi');
    Route::get('/rw/pekerjaan', 'App\Http\Controllers\RwController@pekerjaan');
    Route::get('/rw/pendidikan', 'App\Http\Controllers\RwController@pendidikan');
    Route::get('/rw/agama', 'App\Http\Controllers\RwController@agama');
    Route::get('/rw/detail', 'App\Http\Controllers\RwController@detail');
    Route::get('/rw/detail2', 'App\Http\Controllers\RwController@detail2');
    Route::get('/rw/detail13', 'App\Http\Controllers\RwController@detail13');
    // Route::get('/rw/jeniskelamin', 'App\Http\Controllers\RwController@jeniskelamin');
});



Route::get('/logout', 'App\Http\Controllers\GoogleController@logout')->name('logout');



//REDIRECT KE RW//
