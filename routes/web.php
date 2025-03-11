<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;

// Rotas de autenticação, somente usuarios não logados podem acessar
Route::middleware('guest')->group(function () {

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/login', [LoginController::class, 'authenticate']);

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    Route::post('/register', [RegisterController::class, 'store']);
});

// disponível apenas para usuários logados
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('articles', ArticleController::class);
    Route::resource('authors', AuthorController::class);
});
