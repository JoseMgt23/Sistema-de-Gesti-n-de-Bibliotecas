<?php

use App\Http\Controllers\LectorController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware('auth')->group(function () {
    //Lectores
    Route::get('/lectores', [LectorController::class, 'index'])->name('lectores.index');
    Route::post('/lectores', [LectorController::class, 'store'])->name('lectores.store');
    Route::get('/lectores/create', [LectorController::class, 'create'])->name('lectores.create');
    Route::delete('/lectores/{lector}', [LectorController::class, 'destroy'])->name('lectores.destroy');
    Route::put('/lectores/{lector}', [LectorController::class, 'update'])->name('lectores.update');
    Route::get('/lectores/{lector}/edit', [LectorController::class, 'edit'])->name('lectores.edit');

});

Route::middleware(['auth'])->group(function () {
    // Libros
    Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
    Route::post('/libros', [LibroController::class, 'store'])->name('libros.store');
    Route::get('/libros/create', [LibroController::class, 'create'])->name('libros.create');
    Route::delete('/libros/{libro}', [LibroController::class, 'destroy'])->name('libros.destroy');
    Route::put('/libros/{libro}', [LibroController::class, 'update'])->name('libros.update');
    Route::get('/libros/{libro}/edit', [LibroController::class, 'edit'])->name('libros.edit');
});

Route::middleware(['auth'])->group(function () {
    // Prestamos
    Route::get('/prestamos', [PrestamoController::class, 'index'])->name('prestamos.index');
    Route::post('/prestamos', [PrestamoController::class, 'store'])->name('prestamos.store');
    Route::get('/prestamos/create', [PrestamoController::class, 'create'])->name('prestamos.create');
    Route::delete('/prestamos/{prestamo}', [PrestamoController::class, 'destroy'])->name('prestamos.destroy');
    Route::put('/prestamos/{prestamo}', [PrestamoController::class, 'update'])->name('prestamos.update');
    Route::get('/prestamos/{prestamo}/edit', [PrestamoController::class, 'edit'])->name('prestamos.edit');
}); 

require __DIR__.'/auth.php';
