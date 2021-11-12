<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\PerizinanController;
use App\Http\Controllers\PersyaratanController;

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
Route::post('/registrasi-jarjastel-submit','Sendemail@send')->name('registrasi-jarjastel-submit');
Route::post('/registrasi-telsusbh-submit','Sendemail@send_telsusbh')->name('registrasi-telsusbh-submit');
Route::post('/registrasi-telsusnbh-submit','Sendemail@send_telsusnbh')->name('registrasi-telsusnbh-submit');

// Route::post('/registrasi-jarjastel-submit', 'Sendemail@send');
Route::post('/konfirmasi-jarjastel-submit','Sendemail@konfirmasi_jarjastel')->name('konfirmasi-jarjastel-submit');
Route::post('/konfirmasi-telsusbh-submit','Sendemail@konfirmasi_telsusbh')->name('konfirmasi-telsusbh-submit');
Route::post('/konfirmasi-telsusnbh-submit','Sendemail@konfirmasi_telsusnbh')->name('konfirmasi-telsusnbh-submit');

Route::post('/penomoran-submit','Sendemail@penomoran_submit')->name('penomoran-submit');

Route::post('/forget-password-submit','Sendemail@forget_password')->name('forget-password-submit');

Route::get('/konfirmasi-msg', function () {
    return view('emails/konfirmasi-msg');
});
Route::get('/konfirmasi-registrasi', function () {
    return view('emails/konfirmasi-registrasi');
});
Route::get('/penomoran-msg', function () {
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

Route::get('/registrasi-jarjastel-person', function () {
    return view('registrasi/registrasi-jarjastel-person');
});

Route::get('/registrasi-jarjastel-perusahaan', function () {
    return view('registrasi/registrasi-jarjastel-perusahaan');
});

Route::get('/registrasi-jarjastel-pemohon', function () {
    return view('registrasi/registrasi-jarjastel-pemohon');
});

Route::get('/registrasi-telsusbh', function () {
    return view('registrasi/registrasi-telsusbh');
});

Route::get('/login-telsusbh', function () {
    return view('login/login-telsusbh');
});

Route::get('/registrasi-telsusbh-person', function () {
    return view('registrasi/registrasi-telsusbh-person');
});

Route::get('/registrasi-telsusbh-perusahaan', function () {
    return view('registrasi/registrasi-telsusbh-perusahaan');
});

Route::get('/registrasi-telsusbh-pemohon', function () {
    return view('registrasi/registrasi-telsusbh-pemohon');
});


Route::get('/registrasi-telsusnbh', function () {
    return view('registrasi/registrasi-telsusnbh');
});

Route::get('/login-telsusnbh', function () {
    return view('login/login-telsusnbh');
});

Route::get('/registrasi-telsusnbh-person', function () {
    return view('registrasi/registrasi-telsusnbh-person');
});

Route::get('/form-penomoran', function () {
    return view('penomoran/form-penomoran');
});


Route::get('/master/kode-izin/{jenisIzin}', [MasterController::class, 'getKodeIzin']);
Route::get('/master/nama-izin/jaringan/{kbli}', [MasterController::class, 'getNamaIzinJaringanByKbli']);
Route::get('/master/nama-izin/jaringan-tertutup', [MasterController::class, 'getNamaIzinJaringanTertutup']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/perizinan/dalam-proses', [PerizinanController::class, 'dalamProses']);
Route::get('/perizinan/aktif/{kib_id}', [PerizinanController::class, 'getPerizinanAktifByKibId']);
Route::post('/perizinan/daftar', [PerizinanController::class, 'daftar']);
Route::get('/persyaratan/{perizinanId}', [PersyaratanController::class, 'persyaratan']);
Route::get('/perizinan/email-perizinan', function () {
    return view('perizinan/email-perizinan');
});