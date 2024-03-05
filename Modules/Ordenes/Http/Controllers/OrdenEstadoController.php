<?php

namespace Modules\Ordenes\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Modules\Ordenes\Entities\ordenEstado;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;

class OrdenEstadoController extends Controller
{
    use DisableAuthorization;
    protected $model = ordenEstado::class;
}
