<?php

namespace Modules\Salidas\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Salidas\Entities\Salida;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;

class SalidasController extends Controller
{
   use DisableAuthorization;
   protected $model = Salida::class;

   protected function alwaysIncludes() : array
   {
       return [
         'lingotes'
       , 'colector'
       , 'colector.receptor'
       , 'colector.cliente'
       , 'colector_media'
       , 'colector_media.media']
       ;
   }

   protected function includes() : array
   {
       return [
           'lingotes'
           , 'colector'
           , 'colector.receptor'
           , 'colector.cliente'
           , 'salidaEstado'
           ,'salidaRegistros'
           , 'colector_media'
           , 'colector_media.media'
            ];
   }

   protected function filterableBy() : array
   {
       return [
           'id'
       , 'activated'
       , 'colector_id'
       , 'salida_estado_id'
       , 'user_id'
       , 'created_at'
       , 'lingotes.id'
       , 'lingotes.presentacion_id'
       , 'lingotes.lingote_peso'
    ];
   }
}
