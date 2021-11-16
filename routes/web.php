<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\PerizinanController;
use App\Http\Controllers\PersyaratanController;
use App\Http\Controllers\Sendemail;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\KodeposController;

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

Route::get('/home', function () {
    return view('homepage/home');
});

Route::get('/', function () {
    return view('homepage/home');
});

// Route::post('/registrasi-jarjastel-submit', 'Sendemail@send');
Route::post('/registrasi-jarjastel-submit',[Sendemail::class, 'send'])->name('registrasi-jarjastel-submit');
Route::post('/registrasi-telsusbh-submit',[Sendemail::class, 'send_telsusbh'])->name('registrasi-telsusbh-submit');
Route::post('/registrasi-telsusnbh-submit',[Sendemail::class, 'send_telsusnbh'])->name('registrasi-telsusnbh-submit');

// Route::post('/registrasi-jarjastel-submit', 'Sendemail@send');
Route::post('/konfirmasi-jarjastel-submit',[Sendemail::class, 'konfirmasi_jarjastel'])->name('konfirmasi-jarjastel-submit');
Route::post('/konfirmasi-telsusbh-submit',[Sendemail::class, 'konfirmasi_telsusbh'])->name('konfirmasi-telsusbh-submit');
Route::post('/konfirmasi-telsusnbh-submit',[Sendemail::class, 'konfirmasi_telsusnbh'])->name('konfirmasi-telsusnbh-submit');

Route::post('/penomoran-submit',[Sendemail::class, 'penomoran_submit'])->name('penomoran-submit');

Route::post('/forget-password-submit',[Sendemail::class, 'forget_password'])->name('forget-password-submit');
Route::get('/getKota/{id}', [KotaController::class, 'getKota']);
Route::get('/getKecamatan/{id}', [KecamatanController::class, 'getKecamatan']);
Route::get('/getDesa/{id}', [DesaController::class, 'getDesa']);
Route::get('/getKodepos/{id}', [KodeposController::class, 'getKodepos']);


Route::get('/konfirmasi-msg', function () {
    return view('emails/konfirmasi-msg');
});
Route::get('/konfirmasi-registrasi', function () {
    return view('emails/konfirmasi-registrasi');
});

Route::match(array('GET', 'POST'), '/penomoran-msg', function(){
    $provinsi = DB::table('provinsi')->get();
    return view('penomoran/penomoran-msg');
});

Route::get('/forget-password', function () {
    return view('login/forget-password');
});

Route::get('/registrasi-jarjastel', function () {
    return view('registrasi/registrasi-jarjastel');
});

Route::get('/login-jarjastel', function () {
    return view('login/login-jarjastel');
});

Route::match(array('GET', 'POST'), '/registrasi-jarjastel-person', function(){
    $provinsi = DB::table('provinsi')->get();
    return view('registrasi/registrasi-jarjastel-person',['provinsi' => $provinsi]);
});

Route::match(array('GET', 'POST'), '/registrasi-jarjastel-perusahaan', function(){
    $provinsi = DB::table('provinsi')->get();
    return view('registrasi/registrasi-jarjastel-perusahaan',['provinsi' => $provinsi]);
});

Route::match(array('GET', 'POST'), '/registrasi-jarjastel-pemohon', function(){
    // $provinsi = DB::table('provinsi')->get();
    return view('registrasi/registrasi-jarjastel-pemohon');
});

Route::get('/registrasi-telsusbh', function () {
    return view('registrasi/registrasi-telsusbh');
});

Route::get('/login-telsusbh', function () {
    return view('login/login-telsusbh');
});

Route::get('/registrasi-telsusbh-person', function () {
    $provinsi = DB::table('provinsi')->get();
    return view('registrasi/registrasi-telsusbh-person',['provinsi' => $provinsi]);
});

Route::match(array('GET', 'POST'), '/registrasi-telsusbh-perusahaan', function(){
    $provinsi = DB::table('provinsi')->get();
    return view('registrasi/registrasi-telsusbh-perusahaan',['provinsi' => $provinsi]);
});

Route::match(array('GET', 'POST'), '/registrasi-telsusbh-pemohon', function(){
    return view('registrasi/registrasi-telsusbh-pemohon');
});

Route::get('/registrasi-telsusnbh', function () {
    return view('registrasi/registrasi-telsusnbh');
});

Route::get('/login-telsusnbh', function () {
    return view('login/login-telsusnbh');
});

Route::match(array('GET', 'POST'), '/registrasi-telsusnbh-person', function(){
    $provinsi = DB::table('provinsi')->get();
    return view('registrasi/registrasi-telsusnbh-person',['provinsi' => $provinsi]);
});

Route::get('/form-penomoran', function () {
    return view('penomoran/form-penomoran');
});

Route::get('/form-pengembalian-izin', function () {
    return view('penomoran/form-pengembalian-izin');
});

Route::get('/riwayat-perizinan', function () {
    return view('riwayat-perizinan');
});


Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/perizinan/email-perizinan', function () {
    return view('perizinan/email-perizinan');
});
Route::get('/master/kode-izin/{jenisIzin}', [MasterController::class, 'getKodeIzin']);
Route::get('/master/nama-izin/jaringan/{kbli}', [MasterController::class, 'getNamaIzinJaringanByKbli']);
Route::get('/master/nama-izin/jaringan-tertutup', [MasterController::class, 'getNamaIzinJaringanTertutup']);
Route::get('/master/kota-provinsi', [MasterController::class, 'getKotaProvinsi']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/perizinan/dalam-proses', [PerizinanController::class, 'dalamProses']);
Route::get('/perizinan/aktif/{kib_id}', [PerizinanController::class, 'getPerizinanAktifByKibId']);
Route::post('/perizinan/daftar', [PerizinanController::class, 'daftar']);
Route::get('/persyaratan/{perizinanId}', [PersyaratanController::class, 'persyaratan']);
Route::get('/persyaratan/kplt-jartup-terestrial/{perizinan_id}', [PersyaratanController::class, 'getPersyaratanKpltJartupTerestrial']);
Route::post('/email-daftar-perizinan', [Sendemail::class, 'email_daftar_perizinan']);