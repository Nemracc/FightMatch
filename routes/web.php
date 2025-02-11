<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmparejamientoController;
use App\Http\Controllers\PeleadorController;
use App\Http\Controllers\ModalidadController;

Route::get('/', function () {
    return redirect()->route('peleadores.index');
});

Route::resource('products', ProductController::class);
// Route::resource('emparejamientos', EmparejamientoController::class);
Route::resource('peleadores', PeleadorController::class);
Route::resource('modalidad', ModalidadController::class);

Route::get('/emparejamientos/generate', [EmparejamientoController::class, 'generate'])->name('emparejamientos.generate');
Route::get('/emparejamientos', [EmparejamientoController::class, 'index'])->name('emparejamientos.index');
Route::post('/emparejamientos/store', [EmparejamientoController::class, 'store'])->name('emparejamientos.store');
Route::delete('/emparejamientos/destroy', [EmparejamientoController::class, 'destroy'])->name('emparejamientos.destroy');

