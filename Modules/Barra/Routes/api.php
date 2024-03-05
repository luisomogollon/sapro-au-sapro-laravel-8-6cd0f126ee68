<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;
Route::group(['as' => 'api.','middleware'=>'auth:sanctum'], function() {
    Orion::resource('barras', BarraController::class);
    Orion::belongsToManyResource('barras', 'metales', BarraMetalesController::class);
    Orion::resource('metales', MetalController::class);
    Orion::hasManyResource('barras', 'movimientos', BarraMovimientoController::class);
    Orion::morphManyResource('barras', 'inconformidades', BarraIncomformidadController::class);
    //Orion::hasManyResource('clientes', 'ordenes', ClienteOrdenesController::class);
});
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
//,'middleware'=>'auth:sanctum'