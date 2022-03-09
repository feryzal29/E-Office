<?php

use Illuminate\Support\Facades\Route;
use lluminate\Contracts\Container\BindingResolutionException;

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

Route::group(['middleware' => ['auth']], function(){
    Route::get('/','App\Http\Controllers\Dashboard@index');

//Logout
Route::get('/logout','App\Http\Controllers\login@logout');
//User
Route::get('/list-user','App\Http\Controllers\userController@index');
Route::get('/tambah-user','App\Http\Controllers\userController@tambah_user');
Route::post('/insert-user','App\Http\Controllers\userController@insert');
Route::get('/user/hapus/{id}','App\Http\Controllers\userController@delete');
Route::get('/user/edit/{id}','App\Http\Controllers\userController@edituser');
Route::post('/user/update','App\Http\Controllers\userController@updateuser');

//Jabatan
//Route::get('/fetch','App\Http\Controllers\jabatanController@fetcjabatan');
Route::get('/list-jabatan','App\Http\Controllers\jabatanController@list');
Route::post('/insert-jabatan','App\Http\Controllers\jabatanController@insert');
Route::put('/update-jabatan/{id}','App\Http\Controllers\jabatanController@update');
Route::get('/jabatan/hapus/{id}','App\Http\Controllers\jabatanController@delete');

//Memo
Route::get('/memo-pengajuan','App\Http\Controllers\memoController@index');
Route::post('/insert-memo','App\Http\Controllers\memoController@insert');
Route::get('/memo-masuk','App\Http\Controllers\memoController@memoMasuk');
Route::get('/memo-keluar','App\Http\Controllers\memoController@memoKeluar');
Route::get('/konfir-memo','App\Http\Controllers\memoController@konfirm');
Route::get('/memo/setuju/{id}','App\Http\Controllers\memoController@accMemo');
Route::get('/memo/tolak','App\Http\Controllers\memoController@tolak');
Route::get('/memo/detail/{id}','App\Http\Controllers\memoController@detailMemo');
Route::get('/memo/view/{id}','App\Http\Controllers\memoController@viewmemo_pdf');
Route::get('/memo-keluar/view/{id}','App\Http\Controllers\memoController@cetakmemokeluar');
Route::get('/konfirmasi-memo/view/{id}','App\Http\Controllers\memoController@cetakpdfdom');
Route::get('/memo-disposisi/view/{id}','App\Http\Controllers\memoController@cetakmemokeluar');
Route::get('/memo/hapus/{id}','App\Http\Controllers\memoController@hapus');


//Disposisi
Route::get('/memo-masuk/disposisi/{id}','App\Http\Controllers\disposisiController@index');
Route::post('/insert-disposisi','App\Http\Controllers\disposisiController@insert');
Route::get('/disposisi-keluar','App\Http\Controllers\disposisiController@disposisiKeluar');
Route::get('/disposisi-masuk','App\Http\Controllers\disposisiController@disposisiMasuk');
Route::get('/disposisi/detail/{id}','App\Http\Controllers\disposisiController@detaildisposisi');
Route::get('/disposisi/view/{id}','App\Http\Controllers\disposisiController@viewdisposisi');
Route::get('/disposisi-keluar/view/{id}','App\Http\Controllers\disposisiController@viewdisposisi2');
Route::get('/disposisi/forward/{id}','App\Http\Controllers\disposisiController@forwarddisposisi');
Route::post('/insert-forward','App\Http\Controllers\disposisiController@inserforward');
Route::get('/forward/keluar','App\Http\Controllers\disposisiController@forwardkeluar');
Route::get('/forward/masuk','App\Http\Controllers\disposisiController@forwardmasuk');
Route::get('/detail/forward/{id}','App\Http\Controllers\disposisiController@detailForward');
Route::get('/forward/disposisi/view/{id}','App\Http\Controllers\disposisiController@forwarddisposisiview');
Route::get('/forward/disposisi/lihat/{id}','App\Http\Controllers\disposisiController@viewforward');
Route::get('/disposisi/hapus/{id}','App\Http\Controllers\disposisiController@hapusdisposisi');
Route::get('/forward/disposisi/hapus/{id}','App\Http\Controllers\disposisiController@hapusdisposisifrw');

//Disposisi Luar
Route::get('/surat/disposisi','App\Http\Controllers\disposisiController@disposisiluar');
Route::post('/insert/surat','App\Http\Controllers\disposisiController@insertDisposisi');
Route::get('/surat/disposisi/terkirim','App\Http\Controllers\disposisiController@disposisiterkirim');
Route::get('/surat/disposisi/masuk','App\Http\Controllers\disposisiController@disposuratmasuk');
Route::get('/lihat/surat/disposisi/{id}','App\Http\Controllers\disposisiController@viewdisposisisurat');
Route::get('/forward/surat/disposisi/{id}','App\Http\Controllers\disposisiController@Forwardsurat');
Route::post('/insert/forward','App\Http\Controllers\disposisiController@insertforward');
Route::get('/forward/disposisi/surat/keluar','App\Http\Controllers\disposisiController@forwardsuratkeluar');
Route::get('/lihat/disposisi/keluar/{id}','App\Http\Controllers\disposisiController@disforwardkeluar');
Route::get('/forward/disposisi/surat/masuk','App\Http\Controllers\disposisiController@forwardsuratmasuk');
Route::get('/lihat/disposisi/masuk/{id}','App\Http\Controllers\disposisiController@viewdissurat');
Route::get('/surat/detail/{id}','App\Http\Controllers\disposisiController@detailterkirim');
Route::get('/lihat/surat/disposisi/terkirim/{id}','App\Http\Controllers\disposisiController@lihatdisposisiterkirim');
Route::get('/hapus/surat/disposisi/terkirim/{id}','App\Http\Controllers\disposisiController@hapusdisposisiterkirim');

//Setting
Route::get('/setting','App\Http\Controllers\settingController@setting');
Route::post('/insert-setting','App\Http\Controllers\settingController@insert');
Route::get('setting/edit/{id}','App\Http\Controllers\settingController@edit');
Route::post('/update-setting','App\Http\Controllers\settingController@update');

// Route::get('/editsetting','App\Http\Controllers\settingController@edit');

//Profile
Route::get('/profile','App\Http\Controllers\userController@profile');
Route::get('/ganti/pasword','App\Http\Controllers\userController@gantipsw');
Route::post('/password/update','App\Http\Controllers\userController@updatepsw');

//log
Route::post('/insert/log','App\Http\Controllers\logController@insert');
Route::get('/lihat/log','App\Http\Controllers\logController@index');
});



Route::group(['middleware' => ['guest']], function(){
   //Login
Route::get('/login','App\Http\Controllers\login@index')->name('login');
Route::post('/authentication','App\Http\Controllers\login@authentication');

});



