<?php

namespace Modules\Clientes\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Clientes\Entities\Cliente;
use Orion\Http\Controllers\RelationController;
use Orion\Concerns\DisableAuthorization;

class ClientesDireccionesController extends RelationController
{
    use DisableAuthorization;

    protected $model = Cliente::class;

    protected $relation = 'direcciones';
}
