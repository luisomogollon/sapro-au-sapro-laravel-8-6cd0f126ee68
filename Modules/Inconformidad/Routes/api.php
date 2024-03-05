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
//    Orion::morphOneResource('posts', 'image', PostImageController::class);
//    Orion::morphManyResource('posts', 'comments', PostCommentsController::class);
//    Orion::morphToResource('images', 'post', ImagePostController::class);
    Orion::morphToManyResource('inconformidades', 'ordenes', InconformidadOrdenController::class);
//    Orion::morphedByManyResource('tags', 'posts', TagsPostsController::class);
   });
