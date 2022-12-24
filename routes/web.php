<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AspirationController;


Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/tambah', function () {
    return view('aspirasi');
})->name('add.aspiration');


Route::get('/admin/detail/{id}', [AspirationController::class, 'detail'])->name('aspiration.detail');
Route::post('/aspirasi/detail/{id}', [AspirationController::class, 'update'])->name('aspiration.update');
Route::get('/admin/dashboard', [AspirationController::class, 'dashboard'])->middleware('auth');

Route::get('/sapirasi/detail/{id}', [AspirationController::class, 'detail'])->name('aspiration.detail');
Route::post('/aspirasi/update/{id}', [AspirationController::class, 'update'])->name('aspiration.update');

Route::get('/login', [AdminController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AdminController::class, 'authenticate'])->name('auth.login');
Route::get('/admin/detail/{id}', [AspirationController::class, 'detail'])->middleware('auth');


Route::post('/tambah', [AspirationController::class, 'store']);


// Route::get('admin/dashboard', function () {
//     return view('admin.dashboard');
// });

// Route::get('admin/detail', function () {
//     return view('admin.detail');
// });
