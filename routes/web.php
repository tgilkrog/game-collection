<?php

use App\Http\Controllers\GameBaseController;
use App\Http\Controllers\GameCopyController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/games/search', [GameBaseController::class, 'search'])->name('games.search');

Route::resource('platforms', PlatformController::class);
Route::resource('games', GameBaseController::class);
Route::resource('copies', GameCopyController::class);
Route::resource('genres', GenreController::class);

Route::post('/login', [UserController::class, 'login']);
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/admin', [UserController::class, 'index']);
