<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

// Rotas de autenticação 
Route::middleware('guest')->group(function () {

    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::post('/login', [LoginController::class, 'authenticate']);

    Route::get('/register', function () {
        return view('register');
    })->name('register');

    Route::post('/register', [RegisterController::class, 'store']);
});


// Logout disponível apenas para usuários logados
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


