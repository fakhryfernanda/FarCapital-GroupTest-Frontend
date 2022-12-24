<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AspirationController;


Route::get('/index', function () {
    return view('index');
});

Route::get('/', function () {
    return view('aspirasi');
});

Route::get('/admin/dashboard', [AspirationController::class, 'dashboard'])->middleware('auth');

Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login', [AdminController::class, 'authenticate']);


// Route::get('admin/dashboard', function () {
//     return view('admin.dashboard');
// });

Route::get('admin/detail', function () {
    return view('admin.detail');
});
