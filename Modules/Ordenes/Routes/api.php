<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['as' => 'api.'], function() {
    
    Orion::resource('ordenes', OrdenesController::class);
    Orion::belongsToResource('ordenes', 'cliente', OrdenClienteController::class);
    Orion::hasManyResource('ordenes', 'barras',OrdenBarrasController::class);
    Orion::hasOneResource('ordenes','factura', OrdenFacturaController::class);
    Orion::morphManyResource('ordenes', 'inconformidades', OrdenInconformidadController::class);
    Orion::resource('comisiones', ComisionesController::class);
    Orion::hasManyResource('ordenes', 'lingotes',OrdenLingotesController::class);
    //Orion::resource('orden-estado', OrdenEstadoController::class);
    
});