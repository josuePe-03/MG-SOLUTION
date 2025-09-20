<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MarcaProductoController;
use App\Http\Controllers\CategoriaProductoController;
use App\Http\Controllers\ProductoController;

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('permisos', PermisoController::class);
    Route::resource('perfiles', PerfilController::class)->parameters([
        'perfiles' => 'perfil'
    ]);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('marcas-productos', MarcaProductoController::class)->parameters([
        'marcas-productos' => 'marcaProducto'
    ]);
    Route::resource('categorias-productos', CategoriaProductoController::class)->parameters([
        'categorias-productos' => 'categoriaProducto'
    ]);
    Route::resource('productos', ProductoController::class)->parameters([
        'productos' => 'producto'
    ]);
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
