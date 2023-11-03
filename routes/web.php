<?php

use App\Http\Controllers\AturanController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard'); 
Route::get('/', [CustomAuthController::class, 'index'])->name('login.form');
Route::post('/login', [CustomAuthController::class, 'login'])->name('login'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');



Route::resource('penyakit', PenyakitController::class);
Route::resource('user', UserController::class);

Route::resource('gejala', GejalaController::class);

Route::resource('aturan', AturanController::class);
Route::resource('pertanyaan', PertanyaanController::class);

Route::get('/diagnosa', [DiagnosaController::class,'index'])->name('diagnosa.index');
Route::post('/diagnosa/reset', [DiagnosaController::class,'resetDiagnosa'] )->name('diagnosa.reset');
Route::get('/diagnosa/proses', [DiagnosaController::class,'proses'])->name('diagnosa.proses');
Route::get('/diagnosa/pertanyaan/{urutan}', [DiagnosaController::class,'diagnosa'])->name('diagnosa.pertanyaan');
Route::post('/diagnosa/pertanyaan/{urutan}', [DiagnosaController::class,'diagnosa'])->name('diagnosa.pertanyaan');
Route::post('/diagnosa/response/{urutan}', [DiagnosaController::class, 'handleResponse'])->name('diagnosa.handleResponse');
Route::get('/diagnosa/hasil', [DiagnosaController::class, 'hasilDiagnosa'])->name('diagnosa.hasil');

