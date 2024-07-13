<?php

use App\Http\Controllers\IdentifikasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\RelIndikatorController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RelKriteriaController;
use App\Http\Controllers\SolusiController;
use App\Http\Controllers\TesController;
use App\Http\Controllers\UserController;




Auth::routes(['verify' => true]);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', function () {
        return view('pages.admin.dashboard');
    })->name('dashboard');

    Route::resource('solusi', SolusiController::class);
    Route::get('solusi/{solusi}/delete', [SolusiController::class, 'destroy'])->name('solusi.delete');

    Route::resource('user', UserController::class);
    Route::get('user/{user}/delete', [UserController::class, 'destroy'])->name('user.delete');

    Route::resource('kriteria', KriteriaController::class);
    Route::get('kriteria/{kriteria}/delete', [KriteriaController::class, 'destroy'])->name('kriteria.delete');

    Route::resource('indikator', IndikatorController::class);
    Route::get('indikator/{indikator}/delete', [IndikatorController::class, 'destroy'])->name('indikator.delete');

    Route::resource('pertanyaan', PertanyaanController::class);
    Route::get('pertanyaan/{pertanyaan}/delete', [PertanyaanController::class, 'destroy'])->name('pertanyaan.delete');

    Route::resource('relkriteria', RelKriteriaController::class);

    Route::get('/relindikator', [RelIndikatorController::class, 'index'])->name('relindikator.index');
    Route::post('/relindikator/store', [RelIndikatorController::class, 'store'])->name('relindikator.store');
    Route::get('/pilih-kriteria', [RelIndikatorController::class, 'tampilkriteria'])->name('pilih-kriteria');
});


// Route::get('login', [AuthController::class, 'login'])->name('login');
// Route::post("login", [AuthController::class, 'loginStore'])->name('loginStore');
// Route::get("logout", [AuthController::class, 'logout'])->name('logout');
// Route::get("register", [AuthController::class, 'register'])->name('register');
// Route::post("register", [AuthController::class, 'registerStore'])->name('registerStore');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('profil', [ProfilController::class, 'index'])->name('profil');
Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::put('profil', [ProfilController::class, 'store'])->name('profilStore');

    // Route::get('/pilih-gejala', [TesController::class, 'showForm'])->name('pilih-gejala.form');
    // Route::post('/pilih-gejala', [TesController::class, 'submitForm'])->name('pilih-gejala.submit');

    Route::get('/identifikasi', [IdentifikasiController::class, 'index'])->name('form-identitas');
    Route::post('/identifikasi/create-pasien', [IdentifikasiController::class, 'createPasien'])->name('isi-identitas');
    Route::get('/identifikasi/pilih-gejala', [IdentifikasiController::class, 'pilihGejala'])->name('pilih-gejala');
});
