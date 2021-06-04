<?php

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

// Route::get('/auth/redirect', function () {
//     return Socialite::driver('google')->redirect();
// });

// Route::get('/auth/google/callback', function () {
//     $user = Socialite::driver('google')->user();
//     dd($user);
//     // $user->token
// });

Route::get('login', [UserAuthController::class, 'login']);
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
// Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

// Route::get('auth/google/callback', 'GoogleController@redirectToGoogle');
// Route::get('check', [UserAuthController::class, 'check'])->name('auth.check');
// Route::get('register', [UserAuthController::class, 'register']);


/////////HOME///////////
Route::get('/', 'App\Http\Controllers\PagesController@home');
Route::get('/home', 'App\Http\Controllers\PagesController@home');

/////////DATA WARGA KK///////////
Route::get('data_kk', 'App\Http\Controllers\PagesController@datakk');
Route::get('data_kk', 'App\Http\Controllers\JamaahController@datakk');
Route::get('formkk', 'App\Http\Controllers\PagesController@formdatakk');


// Route::post('transaksi', 'App\Http\Controllers\JamaahController@cariTransaksi')->name('cari.transaksi');
// Route::get('transaksi_datainduk', 'App\Http\Controllers\JamaahController@transaksi_datakk');



Route::get('edit_transaksi/{kd_induk}', 'App\Http\Controllers\JamaahController@editTransaksi')->name('edit.transaksi');
Route::post('edit_transaksi/', 'App\Http\Controllers\JamaahController@simpanEditTransaksi')->name('simpan.transaksi');


/////////DATA WARGA INDUK///////////
Route::get('/data_induk', 'App\Http\Controllers\PagesController@data_induk');
Route::get('/data_induk', 'App\Http\Controllers\JamaahController@datainduk');

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


//====================================================RW==========================================================================//
Route::get('/rw', 'App\Http\Controllers\RwController@home');
Route::get('/rw/warga', 'App\Http\Controllers\RwController@warga');
Route::get('/rw/datakk', 'App\Http\Controllers\RwController@datakk');
Route::get('/rw/detail', 'App\Http\Controllers\RwController@detail');
Route::get('/rw/detail2', 'App\Http\Controllers\RwController@detail2');
Route::get('/rw/detail13', 'App\Http\Controllers\RwController@detail13');


Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/google/callback', function () {
    $user = Socialite::driver('google')->user();
    dd($user);
});
