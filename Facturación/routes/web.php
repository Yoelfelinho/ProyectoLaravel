<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\DevolucionController;
use App\Http\Controllers\ConsultaController;

// 🏠 RUTA PRINCIPAL (OPCIONAL PERO RECOMENDADA)
Route::get('/', function () {
    return view('welcome');
});

// CRUD
Route::resource('cliente', ClienteController::class);
Route::resource('articulo', ArticuloController::class);
Route::resource('proveedores', ProveedorController::class)
    ->parameters(['proveedores' => 'proveedor']);

Route::resource('factura', FacturaController::class);
Route::resource('devoluciones', DevolucionController::class);

// 🔍 CONSULTAS
Route::get('/consultas/ventas', [ConsultaController::class, 'ventasPorFecha'])
    ->name('consultas.ventas');

Route::get('/consultas/stock', [ConsultaController::class, 'stockBajo'])
    ->name('consultas.stock');
