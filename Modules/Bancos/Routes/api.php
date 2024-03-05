<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;
Route::group(['as' => 'api.','middleware'=>'auth:sanctum'], function() {
    Orion::resource('barras', MovimientosController::class);
    
});
Route::middleware('auth:api')->get('/bancos', function (Request $request) {
    return $request->user();
});