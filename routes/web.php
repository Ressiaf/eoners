<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('init');
});

Route::get('/register', [RegisterController::class, 'index']) -> name('register');
Route::post('/register', [RegisterController::class, 'store']);
