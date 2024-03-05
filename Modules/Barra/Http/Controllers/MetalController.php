<?php

namespace Modules\Barra\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Barra\Entities\Metales;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;

class MetalController extends Controller
{
   use DisableAuthorization;
   protected $model = Metales::class;

   protected function includes() : array
   {
       return ['barras', 'orden', 'metales'];
   }
}
