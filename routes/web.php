<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminPostController;

Route::get('/', [BlogController::class, 'index']);
Route::get('/post/{post}', [BlogController::class, 'show']);


Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::resource('posts', AdminPostController::class);
        // Routes for categories and tags management...
    });
});
