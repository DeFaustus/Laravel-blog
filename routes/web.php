<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);
Route::get('/semuapost/', [PostController::class, 'semuaPost']);
Route::get('/lihatpost/{post:slug}', [PostController::class, 'lihatPost']);
Route::group(['prefix' => 'auth', 'middleware' => 'guest'], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::get('/register', [LoginController::class, 'register']);
    Route::post('/store', [LoginController::class, 'store']);
    Route::post('/loginAction', [LoginController::class, 'login']);
});
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/home', [DashboardController::class, 'index']);
    Route::get('/tambahpost', [DashboardController::class, 'tambahpost']);
    Route::get('/postsaya', [DashboardController::class, 'postsaya']);
    Route::post('/store', [DashboardController::class, 'store']);
    Route::get('/edit/{post:id}', [DashboardController::class, 'edit']);
    Route::get('/logout', [DashboardController::class, 'logout']);
    Route::delete('/hapus', [DashboardController::class, 'hapus']);
});
