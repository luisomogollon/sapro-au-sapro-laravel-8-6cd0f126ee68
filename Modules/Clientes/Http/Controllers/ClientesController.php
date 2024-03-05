<?php

namespace Modules\Clientes\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Clientes\Entities\Cliente;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;
use Modules\Clientes\Http\Requests\ClienteOrionRequest;

class ClientesController extends Controller
{
    use DisableAuthorization;
    protected $model= Cliente::class;
    protected $request = ClienteOrionRequest::class;

    protected function alwaysIncludes() : array
    {
        return ['receptor', 'ordenes'];
    }
    
    protected function includes() : array
    {
        return ['direcciones','ordenes','receptor'];
    }

    protected function filterableBy() : array
    {
        return ['cliente_rif', 'cliente_tipo'];
    }


    protected function keyName(): string
    {
        return 'cliente_rif';
    }
}
