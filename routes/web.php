<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\EntradasController;

Route::get('/', function () {
    return view('welcome');
});







Route::get('admin', function () {
    return view('admin.contenido');
});

Route::middleware('auth')->group(function () {
    Route::resource('categoria', CategoriaController::class);
    Route::resource('producto', ProductoController::class);
    Route::resource('usuario', UserController::class);
    Route::resource('vehiculo', VehiculoController::class);
    Route::resource('entrada', EntradasController::class);
 
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
