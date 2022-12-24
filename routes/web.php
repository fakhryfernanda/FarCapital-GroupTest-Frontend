<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AspirationController;


Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/tambah', function () {
    return view('aspirasi');
})->name('add.aspiration')->middleware('guest');



Route::post('/aspirasi/detail/{id}', [AspirationController::class, 'update'])->name('aspiration.update');
Route::get('/admin/dashboard', [AspirationController::class, 'dashboard'])->middleware('auth');

Route::get('/login', [AdminController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AdminController::class, 'authenticate'])->name('auth.login');
Route::post('/logout', [AdminController::class, 'logout']);
Route::get('/admin/detail/{id}', [AspirationController::class, 'detail'])->middleware('auth')->name('aspiration.detail');



Route::post('/tambah', [AspirationController::class, 'store']);

Route::get('/admin/addadmin', function () {
    return view('admin.addadmin');
});

Route::get('/admin/kelolaadmin', function () {
    return view('admin.kelolaadmin');
});


// Route::get('admin/dashboard', function () {
//     return view('admin.dashboard');
// });

// Route::get('admin/detail', function () {
//     return view('admin.detail');
// });
