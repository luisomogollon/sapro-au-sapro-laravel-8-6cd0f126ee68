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
Route::group(['as' => 'api.','middleware'=>'auth:sanctum'], function() {
    Orion::resource('salidas', SalidasController::class);
    //Orion::resource('metales', MetalController::class);
    //Orion::hasManyResource('barras', 'movimientos', BarraMovimientoController::class);
    //Orion::hasManyResource('clientes', 'ordenes', ClienteOrdenesController::class);
});