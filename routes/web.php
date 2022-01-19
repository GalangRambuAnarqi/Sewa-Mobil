<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::get('/register', [LoginController::class, 'register'])->name('register')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth');
Route::post('/register', [LoginController::class, 'register_tambah'])->name('register.tambah');

Route::get('/home', [LoginController::class, 'home'])->name('home')->middleware('auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/admin/mobil', [AdminController::class, 'mobil'])->name('mobil')->middleware('CekRole:admin');
Route::get('/admin/mobil/tambah', [AdminController::class, 'mobil_tambah'])->name('mobil.tambah')->middleware('CekRole:admin');
Route::get('/admin/mobil/edit/{id}', [AdminController::class, 'mobil_edit'])->name('mobil.edit')->middleware('CekRole:admin');
Route::post('/admin/mobil', [AdminController::class, 'mobil_store'])->name('mobil.store')->middleware('CekRole:admin');
Route::put('/admin/mobil', [AdminController::class, 'mobil_update'])->name('mobil.update')->middleware('CekRole:admin');
Route::delete('/admin/mobil', [AdminController::class, 'mobil_delete'])->name('mobil.delete')->middleware('CekRole:admin');

Route::get('/admin/user', [AdminController::class, 'user'])->name('user')->middleware('CekRole:admin');

Route::get('/mobil', [UserController::class, 'mobil'])->name('user.mobil')->middleware('CekRole:user');
