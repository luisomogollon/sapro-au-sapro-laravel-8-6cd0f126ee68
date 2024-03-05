<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
    Orion::resource('bloques', BloqueController::class);
    Orion::belongsToManyResource('bloques','barra',BloqueBarrasController::class);
});