<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/proveedor', [ProveedorController::class, 'index'])->name('proveedor');
Route::post('/proveedores', [ProveedorController::class, 'guardar'])->name('proveedores.guardar');
Route::delete('/proveedores/{id}', [ProveedorController::class, 'eliminar'])->name('proveedores.eliminar');
Route::put('/proveedores/{id}', [ProveedorController::class, 'actualizar'])->name('proveedores.actualizar');
Route::get('/marca', [MarcaController::class, 'index'])->name('marca');
Route::post('/marca', [MarcaController::class, 'guardar'])->name('marca.guardar');
Route::put('/marca/{id}', [MarcaController::class, 'actualizar'])->name('marca.actualizar');
Route::delete('/marca/{id}', [MarcaController::class, 'eliminar'])->name('marca.eliminar');
Route::get('/producto', [ProductoController::class, 'index'])->name('productos');
