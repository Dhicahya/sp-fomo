<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolusiController;


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

Route::get('admin', function () {
    return view('pages.admin.dashboard');
});

Route::get('admin/solusi', [SolusiController::class, 'index']);

