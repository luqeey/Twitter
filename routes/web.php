<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');


Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::post('/', [PostController::class, 'store'])->name('post.store');
Route::delete('/{postId}', [PostController::class, 'destroy'])->name('post.destroy');
Route::put('/{postId}', [PostController::class, 'update'])->name('post.update');
Route::get('/{postId}', [PostController::class, 'show'])->name('post.show');

Route::post('/{postId}/comment', [CommentController::class, 'store'])->name('comment.store');
