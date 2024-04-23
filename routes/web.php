<?php

use App\Http\Controllers\LectorController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\LibroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Lectores  

Route::get('/lectores', [LectorController::class,'index'])->name('lectores.index');
Route::post('/lectores', [LectorController::class,'store'])->name('lectores.store');
Route::get('/lectores/create', [LectorController::class,'create'])->name('lectores.create');
Route::delete('/letores/{lectores}', [LectorController::class,'destroy'])->name('lectores.destroy');
Route::put('/lectores/{lectores}', [LectorController::class,'update'])->name('lectores.update');
Route::get('/lectores/{lectores}/edit', [LectorController::class,'edit'])->name('lectores.edit');

//Libros

Route::get('/libros', [LibroController::class,'index'])->name('libros.index');
Route::post('/libros', [LibroController::class,'store'])->name('libros.store');
Route::get('/libros/create', [LibroController::class,'create'])->name('libros.create');
Route::delete('/libros/{libros}',[LibroController::class,'destroy'])->name('libros.destroy');
Route::put('/libros/{libros}', [LibroController::class,'update'])->name('libros.update');
Route::get('/libros/{libros}/edit', [LibroController::class,'edit'])->name('libros.edit');

//Prestamos
Route::get('/prestamos', [PrestamoController::class, 'index'])->name('prestamos.index');
Route::post('/prestamos', [PrestamoController::class, 'store'])->name('prestamos.store');
Route::get('/prestamos/create', [PrestamoController::class, 'create'])->name('prestamos.create');
Route::delete('/prestamos/{prestamo}', [PrestamoController::class, 'destroy'])->name('prestamos.destroy');
Route::put('/prestamos/{prestamo}', [PrestamoController::class, 'update'])->name('prestamos.update');
Route::get('/prestamos/{prestamo}/edit', [PrestamoController::class, 'edit'])->name('prestamos.edit');