<?php

use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Post\FeedPostController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('init');
});

// Rutas de autenticación
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
;

// Rutas protegidas 
Route::middleware('auth')->group(function () {
    // Feed principal
    Route::get('/feed', [FeedPostController::class, 'index'])->name('feed');
    // Publicaciones
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    // Interacciones con posts
    Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
    Route::post('/posts/{post}/comment', [PostController::class, 'comment'])->name('posts.comment');
    Route::post('/posts/{post}/share', [PostController::class, 'share'])->name('posts.share');
});