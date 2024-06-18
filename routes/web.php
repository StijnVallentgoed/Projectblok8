<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NieuwsberichtController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommentaarController;
use App\Http\Controllers\TagController;



Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');


Route::middleware(['auth', 'verified'])->group(function () {
    





    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Nieuwsbericht routes
    Route::prefix('nieuwsbericht')->group(function () {
        Route::get('/', [NieuwsberichtController::class, 'index'])->name('nieuws.index');
        Route::get('/create', [NieuwsberichtController::class, 'create'])->name('nieuws.create');
        Route::post('/', [NieuwsberichtController::class, 'store'])->name('nieuws.store');
        Route::get('/{nieuwsbericht}', [NieuwsberichtController::class, 'show'])->name('nieuws.show');
        Route::get('/{nieuwsbericht}/edit', [NieuwsberichtController::class, 'edit'])->name('nieuws.edit');
        Route::put('/{nieuwsbericht}', [NieuwsberichtController::class, 'update'])->name('nieuws.update');
        Route::delete('/{nieuwsbericht}', [NieuwsberichtController::class, 'destroy'])->name('nieuws.destroy');
    });

    // Categorie resource routes
    Route::resource('categories', CategorieController::class)->except(['show']);

    // Commentaar routes
    Route::resource('commentaar', CommentaarController::class)->only(['store', 'destroy']);

    // Tag routes
    Route::resource('tags', TagController::class);
});

// Include authentication routes from auth.php
require __DIR__.'/auth.php';
