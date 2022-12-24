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

Route::get('/admin/dashboard', [AspirationController::class, 'dashboard']);
Route::get('/admin/detail/{id}', [AspirationController::class, 'detail'])->name('aspiration.detail');
Route::post('/aspirasi/detail/{id}', [AspirationController::class, 'update'])->name('aspiration.update');

Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login', [AdminController::class, 'authenticate'])->name('auth.login');

Route::post('/tambah', [AspirationController::class, 'store']);


// Route::get('admin/dashboard', function () {
//     return view('admin.dashboard');
// });

// Route::get('admin/detail', function () {
//     return view('admin.detail');
// });
