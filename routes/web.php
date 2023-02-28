<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\BobotController;
use App\Http\Controllers\RuleController;

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

//user routes
Route::get('/', [PagesController::class, 'index'])->name('Home');

//admin routes
Route::get('/admin-login', [LoginController::class, 'index'])->name('Login')->middleware('guest');
Route::post('/action-login', [LoginController::class, 'action']);
Route::post('/admin-logout', [LoginController::class, 'logout']);
Route::get('/admin-dashboard', [AdminController::class, 'index'])->middleware('auth');
Route::resource('/admin-penyakit', PenyakitController::class)->middleware('auth');
Route::post('/admin-penyakit/update', [PenyakitController::class, 'update'])->middleware('auth');
Route::get('/admin-penyakit/hapus/{id}', [PenyakitController::class, 'destroy'])->middleware('auth');
Route::resource('/admin-gejala', GejalaController::class)->middleware('auth');
Route::post('/admin-gejala/update', [GejalaController::class, 'update'])->middleware('auth');
Route::get('/admin-gejala/hapus/{id}', [GejalaController::class, 'destroy'])->middleware('auth');
Route::resource('/admin-bobot', BobotController::class)->middleware('auth');
Route::post('/admin-bobot/update', [BobotController::class, 'update'])->middleware('auth');
Route::get('/admin-bobot/hapus/{id}', [BobotController::class, 'destroy'])->middleware('auth');
Route::resource('/admin-rules', RuleController::class)->middleware('auth');
Route::post('/admin-rules/update', [RuleController::class, 'update'])->middleware('auth');
Route::get('/admin-rules/hapus/{id}', [RuleController::class, 'destroy'])->middleware('auth');

