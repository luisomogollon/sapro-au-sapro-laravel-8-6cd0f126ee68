<?php

namespace Modules\Bancos\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Bancos\Entities\Movimiento;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;

class MovimientosController extends Controller
{
   use DisableAuthorization;
   protected $model = Movimiento::class;

   protected function includes() : array
    {
        return ['banco', 'barra'];
    }
}
