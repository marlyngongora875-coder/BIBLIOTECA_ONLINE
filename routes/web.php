<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/libros', [LibroController::class, 'index']);
Route::get('/libros/crear', [LibroController::class, 'create']);
Route::post('/libros', [LibroController::class, 'store']);
Route::get('/', [InicioController::class, 'index'])->name('inicio');
Route::resource('libros', LibroController::class);
Route::resource('inventario', InventarioController::class);
Route::resource('prestamos', PrestamoController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('roles', RolController::class);
Route::resource('permisos', PermisoController::class);
Route::resource('donaciones', DonacionController::class);
Route::resource('adquisiciones', AdquisicionController::class);
Route::resource('generos', GeneroController::class);


