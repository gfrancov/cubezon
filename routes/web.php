<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\BotigaController;
use App\Http\Controllers\ProducteController;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/botiga/{nomBotiga}', [BotigaController::class, 'show'])->name('botiga.show');
Route::get('/producte/{id}', [ProducteController::class, 'show'])->name('botiga.show');
Route::get('/llistat', [BotigaController::class, 'list'])->name('botiga.list');
Route::view('/badalona', 'badalona');
Route::view('/faq', 'faq');
