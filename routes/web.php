<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SolusiController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {return view('pages.home');})->name('home');

Route::prefix('/admin/')->group(function(){
    Route::get('/', function(){return view('pages.admin.dashboard');})->name('dashboard');

    Route::resource('solusi', SolusiController::class);
    Route::get('solusi/{solusi}/delete', [SolusiController::class, 'destroy'])->name('solusi.delete');

    Route::resource('user', UserController::class);
    Route::get('user/{user}/delete', [UserController::class, 'destroy'])->name('user.delete');

    Route::resource('kriteria', KriteriaController::class);
    Route::get('kriteria/{kriteria}/delete', [KriteriaController::class, 'destroy'])->name('kriteria.delete');

    Route::resource('indikator', IndikatorController::class);
    Route::get('indikator/{indikator}/delete', [IndikatorController::class, 'destroy'])->name('indikator.delete');

});


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post("login", [AuthController::class, 'loginStore'])->name('loginStore');
Route::get("logout", [AuthController::class, 'logout'])->name('logout');
Route::get("register", [AuthController::class, 'register'])->name('register');
Route::post("register", [AuthController::class, 'registerStore'])->name('registerStore');