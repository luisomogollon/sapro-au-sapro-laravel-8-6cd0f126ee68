<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;
Route::group(['as' => 'api.','middleware'=>'auth:sanctum'], function() {
    Orion::resource('clientes', ClientesController::class);
    Orion::hasManyResource('clientes', 'direcciones', ClientesDireccionesController::class);
    Orion::hasManyResource('clientes', 'ordenes', ClienteOrdenesController::class);
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

/*Route::get('/clientes', function (Request $request) {
    return 'clientes';
});*/
