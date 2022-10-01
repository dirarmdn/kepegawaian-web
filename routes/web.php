<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GolonganController;

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

// data pegawai
Route::get('/data-pegawai', [EmployeeController::class, 'index'])->name('pegawai') ->middleware('auth');;
Route::get('/tambah-pegawai', [EmployeeController::class, 'create'])->name('addpage');
Route::post('/add-pegawai', [EmployeeController::class, 'store'])->name('insert');
Route::get('/delete-pegawai/{id}', [EmployeeController::class, 'destroy'])->name('delete');
Route::get('/edit-pegawai/{id}', [EmployeeController::class, 'edit'])->name('edit');
Route::post('/update-pegawai/{id}', [EmployeeController::class, 'update'])->name('update');
Route::get('/show-pegawai/{id}', [EmployeeController::class, 'showdetail'])->name('show');


// data golongan
Route::get('/data-golongan', [GolonganController::class, 'index'])->name('golongan')->middleware('auth');;
Route::get('/tambah-golongan', [GolonganController::class, 'create'])->name('addgl');
Route::post('/add-golongan', [GolonganController::class, 'store'])->name('insertgl');
Route::get('/delete-golongan/{id}', [GolonganController::class, 'destroy'])->name('deletegl');
Route::get('/edit-golongan/{id}', [GolonganController::class, 'edit'])->name('editgl');
Route::post('/update-golongan/{id}', [GolonganController::class, 'update'])->name('updategl');
Route::get('/show-golongan/{id}', [GolonganController::class, 'showdetail'])->name('showgol');

Route::get('/detail-kepegawaian', [EmployeeController::class, 'indexkp'])->name('kepegawaian')->middleware('auth');;
Route::get('/tambah-kepegawaian', [EmployeeController::class, 'createkp'])->name('addkp');
Route::get('/add-kepegawaian', [EmployeeController::class, 'storekp'])->name('insertkp');
Route::get('/delete-kepegawaian/{id}', [EmployeeController::class, 'destroykp'])->name('deletekp');
Route::get('/show-kepegawaian/{id}', [EmployeeController::class, 'showdetailkp'])->name('showkp');
