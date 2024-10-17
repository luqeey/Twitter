<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::group(['prefix' => ''], function () {
    Route::post('/', [PostController::class, 'store'])->name('post.store');
    Route::delete('/{postId}', [PostController::class, 'destroy'])->name('post.destroy');
    Route::put('/{postId}', [PostController::class, 'update'])->name('post.update');
    Route::get('/{postId}', [PostController::class, 'show'])->name('post.show');
});

Route::post('/{postId}/comment', [CommentController::class, 'store'])->name('comment.store');
