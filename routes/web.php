<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('aspirasi');
});

Route::get('/login', [AdminController::class, 'login']);
Route::post('/login', [AdminController::class, 'authenticate']);


Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('admin/detail', function () {
    return view('admin.detail');
});
