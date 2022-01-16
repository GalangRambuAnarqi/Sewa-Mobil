<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
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
