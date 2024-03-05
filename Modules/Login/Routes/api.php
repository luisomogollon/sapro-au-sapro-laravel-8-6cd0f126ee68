<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
Route::post('login-recepcion','LoginController@loginRecepcion')->name('login.recepcion');
Route::post('login-laboratorio','LoginController@loginLaboratorio')->name('login.laboratorio');
Route::post('login-refineria','LoginController@loginRefineria')->name('login.refineria');
Route::post('login-boveda','LoginController@loginBoveda')->name('login.boveda');
Route::post('login-despacho','LoginController@loginDespacho')->name('login.despacho');
Route::get('token',function(){
    return csrf_token();
   });
Route::middleware('auth:api')->get('/login', function (Request $request) {
    return $request->user();
});