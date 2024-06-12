<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolusiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;


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

Route::get('/', function () {
    return view('pages.home');
});

Route::prefix('/admin/')->group(function(){
    Route::get('/', function(){return view('pages.admin.dashboard');})->name('dashboard');

    Route::resource('solusi', SolusiController::class);
    Route::get('solusi/{solusi}/delete', [SolusiController::class, 'destroy'])->name('solusi.delete');

    Route::resource('user', UserController::class);
    Route::get('user/{user}/delete', [UserController::class, 'destroy'])->name('user.delete');


});



