<?php

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;

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

//Route::get('/', function () {
    //return view('dashboard');
//});

route::get('/', [DashboardController::class, 'index']);
route::get('/mahasiswa', [MahasiswaController::class, 'index']);
