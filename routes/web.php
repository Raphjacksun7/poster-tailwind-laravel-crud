<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


// Geust routes

Route::get('/', function () {
    return view('pages.home');
})->name('home');


Route::get('/about', function () {
    return view('pages.about');
});

// Registration, Login and Logout routes

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::post('/register', [RegisterController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// Protected routes 

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.likes');
