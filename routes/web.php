<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\KepegawaianController;

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

Route::get('/', function () {
    return view('welcome');
});

// login
Route::get('/login', [LoginController::class, 'login']);
Route::get('/register', [LoginController::class, 'register']);
Route::post('/registeruser', [LoginController::class, 'registeruser']);
Route::post('/loginuser', [LoginController::class, 'loginuser']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::resources([
    'pegawai' => PegawaiController::class,
    'kepegawaian' => KepegawaianController::class,
    'golongan' => GolonganController::class,
]);

Route::get('/generatepdf', [EmployeeController::class, 'generatepdf'])->name('pegawai.pdf');
Route::post('/import', [EmployeeController::class, 'import'])->name('pegawai.import');
Route::get('/export', [EmployeeController::class, 'export'])->name('pegawai.export');
