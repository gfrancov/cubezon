<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\BotigaController;
use App\Http\Controllers\ProducteController;
use App\Http\Controllers\UserController;

Route::get('/', [LandingController::class, 'nouIndex'])->name('landing'); // CANVIAR MANTENIMENT
Route::get('/landingback', [LandingController::class, 'nouIndex'])->name('landing'); // CANVIAR MANTENIMENT
Route::get('/ofertes', [LandingController::class, 'showOfertes'])->name('landing.ofertes'); // CANVIAR MANTENIMENT
Route::get('/categoria/{id}', [LandingController::class, 'showCategoryProducts'])->name('categoria.show'); // CANVIAR MANTENIMENT
Route::get('/botiga/{nomBotiga}', [BotigaController::class, 'show'])->name('botiga.show');
Route::get('/producte/{id}', [ProducteController::class, 'show'])->name('botiga.show');
Route::get('/llistat', [BotigaController::class, 'list'])->name('botiga.list');
Route::view('/badalona', 'badalona');
Route::view('/balanç', 'informe');

//Route::view('/', 'manteniment'); // CANVIAR MANTENIMENT
Route::view('/faq', 'faq');
Route::view('/ubicacions', 'ubicacions');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/gestio', [UserController::class, 'mevesBotigues'])->name('gestio.mevesBotigues');
    Route::get('/botigues/crear', [BotigaController::class, 'create'])->name('botigues.create');
    Route::post('/botigues/store', [BotigaController::class, 'store'])->name('botigues.store');
    Route::get('/botigues/edit/{botiga}', [BotigaController::class, 'edit'])->name('botigues.edit');
    Route::put('/botigues/update/{botiga}', [BotigaController::class, 'update'])->name('botigues.update');
    Route::delete('/botigues/destroy/{botiga}', [BotigaController::class, 'destroy'])->name('botigues.destroy');
    Route::get('/productes/crear/{botiga}', [ProducteController::class, 'create'])->name('productes.create');
    Route::post('/productes/store', [ProducteController::class, 'store'])->name('productes.store');
    Route::get('/productes/edit/{producte}', [ProducteController::class, 'edit'])->name('productes.edit');
    Route::put('/productes/update/{producte}', [ProducteController::class, 'update'])->name('productes.update');
    Route::delete('/productes/destroy/{producte}', [ProducteController::class, 'destroy'])->name('productes.destroy');
});
