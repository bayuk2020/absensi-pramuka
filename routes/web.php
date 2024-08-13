<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\Siswa\SiswaDatadiriController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes(['verify' => true]);

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', "DashboardController@index");
    });


Auth::routes();

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('post-login', [LoginController::class, 'postLogin'])->name('login.post');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', "DashboarduserController@index")->name('home');
Route::get('/editprofile', "User01Controller@edit")->name('editprofile');

//User = User
Route::get('/user', "DashboarduserController@index")->middleware('user');


//Admin = Data DiriSiswa
Route::get('/siswa', "SiswaDatadiriController@index");
Route::get('/siswa/create', 'SiswaDatadiriController@create');
Route::post('/siswa/store', "SiswaDatadiriController@store");
Route::get('/siswa/{id}/show', "SiswaDatadiriController@show");
Route::get('/siswa/{id}/edit', "SiswaDatadiriController@edit");
Route::patch('/siswa/{id}/update', "SiswaDatadiriController@update");
Route::delete('/siswa/{id}', "SiswaDatadiriController@destroy");

//User = Data DiriSiswa
Route::get('/siswa', "SiswaDatadiriController@indexuser");
Route::get('/siswa', "SiswaDatadiriController@index");


//Admin = Data Pembina
Route::get('/pembina', "PembinaController@index");
Route::get('/pembina/create', "PembinaController@create");
Route::post('/pembina/store', "PembinaController@store");
Route::get('/pembina/{id}/show', "PembinaController@show");
Route::get('/pembina/{id}/edit', "PembinaController@edit");
Route::patch('/pembina/{id}/update', "PembinaController@update");
Route::delete('/pembina/{id}', "PembinaController@destroy");


// Admin = Data Golongan
Route::get('/golongan', "GolonganController@index");
Route::get('/golongan/create', "GolonganController@create");
Route::post('/golongan/store', "GolonganController@store");
Route::get('/golongan/{id}/show', "GolonganController@show");
Route::get('/golongan/{id}/edit', "GolonganController@edit");
Route::patch('/golongan/{id}/update', "GolonganController@update");
Route::delete('/golongan/{id}', "GolonganController@destroy");


//Admin = Data Tahun Ajaran
Route::get('/tahun', "TahunController@index");
Route::get('/tahun/create', "TahunController@create");
Route::post('/tahun/store', "TahunController@store");
Route::delete('/tahun/{id}', "TahunController@destroy");



//Admin = Data Admin
Route::get('/user01', "User01Controller@index");
Route::get('/user01/{id}/show', "User01Controller@show");
Route::get('/user01/create', "User01Controller@create");
Route::post('/user01/store', "User01Controller@store");
Route::get('/user01/{id}/edit', "User01Controller@edit");
Route::patch('/user01/{id}/update', "User01Controller@update");
Route::delete('/user01/{id}', "User01Controller@destroy");


//User = Data Presensi
Route::get('/presensi', "PresensiController@indexuser");
Route::post('/simpanpresensi', "PresensiController@store")->name('SPresensi');

//Admin = Data Rekap
Route::get('/rekap', "RekapController@index");
Route::get('/nilai', "RekapController@nilai")->name('nilai');
Route::get('/rekap/{id_user}/show', "RekapController@show");




//DomPDF admin
Route::get('/user01/{id}/cetak_pdf', 'User01Controller@cetak_pdf');
Route::get('/user01/cetakall_pdf', 'User01Controller@cetakall_pdf');
Route::get('/user01/{id}/print_pdf', 'User01Controller@print_pdf');
//Export-Import Admin
Route::get('/user01/export_excel', 'User01Controller@export_excel');
Route::post('/user01/import_excel', 'User01Controller@import_excel');


//DomPDF siswa
Route::get('/siswa/{id}/cetak_pdf', 'SiswaDatadiriController@cetak_pdf');
Route::get('/siswa/cetakall_pdf', 'SiswaDatadiriController@cetakall_pdf');
Route::get('/siswa/{id}/print_pdf', 'SiswaDatadiriController@print_pdf');
//Export-Import Siswa
Route::get('/siswa/export_excel', 'SiswaDatadiriController@export_excel');
Route::post('/siswa/import_excel', 'SiswaDatadiriController@import_excel');

//DomPDF pembina
Route::get('/pembina/{id}/cetak_pdf', 'PembinaController@cetak_pdf');
Route::get('/pembina/cetakall_pdf', 'PembinaController@cetakall_pdf');
Route::get('/pembina/{id}/print_pdf', 'PembinaController@print_pdf');
//Export-Import Pembina
Route::get('/pembina/export_excel', 'PembinaController@export_excel');
Route::post('/pembina/import_excel', 'pembinaController@import_excel');

//DomPDF rekap
Route::get('/rekap/cetakp_pdf', 'RekapController@cetakp_pdf');

//DomPDF rekap
Route::get('/rekap/cetakall_pdf', 'RekapController@cetakall_pdf');

//DomPDF golongan
Route::get('/golongan/cetak_pdf', 'GolonganController@cetak_pdf');

//DomPDF tahun
Route::get('/tahun/cetak_pdf', 'TahunController@cetak_pdf');



//DomPDF
// Route::get('/siswa/{id}/cetak_pdf', 'SiswaDatadiriController@cetak_pdf');


//Siswa = Data Ortu


// Route::get('/siswa/createortu', [App\Http\Controllers\Admin\SiswaController::class, 'createortu']);
// Route::get('/siswa/createjuara', [App\Http\Controllers\Admin\SiswaController::class, 'createjuara']);
// Route::get('/siswa/createsku', [App\Http\Controllers\Admin\SiswaController::class, 'createsku']);
// Route::get('/siswa/createskk', [App\Http\Controllers\Admin\SiswaController::class, 'createskk']);
// Route::get('/siswa/creategaruda', [App\Http\Controllers\Admin\SiswaController::class, 'creategaruda']);
// Route::get('/siswa/createkegiatan', [App\Http\Controllers\Admin\SiswaController::class, 'createkegiatan']);
