<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\BotigaController;
use App\Http\Controllers\ProducteController;
use App\Http\Controllers\UserController;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/botiga/{nomBotiga}', [BotigaController::class, 'show'])->name('botiga.show');
Route::get('/producte/{id}', [ProducteController::class, 'show'])->name('botiga.show');
Route::get('/llistat', [BotigaController::class, 'list'])->name('botiga.list');
Route::view('/badalona', 'badalona');
Route::view('/faq', 'faq');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/gestio', [UserController::class, 'mevesBotigues'])->name('gestio.mevesBotigues');
    Route::get('/productes/crear/{botiga}', [ProducteController::class, 'create'])->name('productes.create');
    Route::post('/productes/store', [ProducteController::class, 'store'])->name('productes.store');
    Route::get('/productes/edit/{producte}', [ProducteController::class, 'edit'])->name('productes.edit');
    Route::put('/productes/update/{producte}', [ProducteController::class, 'update'])->name('productes.update');
    Route::delete('/productes/destroy/{producte}', [ProducteController::class, 'destroy'])->name('productes.destroy');

});
