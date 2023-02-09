<?php

use App\Http\Controllers\CobaController;
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

Route::get('/coba', function () {
    return view('dashboard');
});
    // Route::get('/table', function () {
    //     return view('tables');
    // });

Route::get('/', [CobaController::class, 'awal'])->name('awal');

Route::get('/tampil', [CobaController::class, 'index'])->name('index');

// Route::get('/tampil', [CobaController::class, 'email'])->name('email');
Route::post('/tambah', [CobaController::class, 'create'])->name('create');

// Route::post('/edit', [CobaController::class, 'show']);
Route::post('/edit/{id}', [CobaController::class, 'store'])->name('store');
Route::get('/delete/{id}', [CobaController::class, 'show']);

Route::get('/', [LoginController::class, 'login']);

Route::post('/login', [LoginController::class, 'loginStore']);

Route::get('/register', [LoginController::class, 'register'])->name('register');

Route::post('/registerStore', [LoginController::class, 'registerStore'])->name('registerStore');

route::get('/logout', [LoginController::class, 'logout'])->name('logout');