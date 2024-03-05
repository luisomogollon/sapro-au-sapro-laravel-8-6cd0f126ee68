<?php

namespace Modules\Ordenes\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Ordenes\Entities\Orden;
use Modules\Ordenes\Http\Requests\OrdenOrionRequest;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;

class OrdenesController extends Controller
{
    use DisableAuthorization;

    protected $model = Orden::class;
    protected $request = OrdenOrionRequest::class;

    protected function alwaysIncludes() : array
    {
        return [
        'usuario'
        ,'barrasFiltroCeros'
        ,'lingotes'
        ,'cliente'
        ,'barras'
        ,'barras.metales'
        ,'receptor'
    ];
    }

    protected function exposedScopes() : array
    {
        return [
            'setBarrasComisionReal'
            ];
    }

    protected function includes() : array
    {
        return [
            'barras'
            , 'factura'
            ,'cliente'
            ,'ordenEstado'
            ,'barras.metales'
            ,'barrasFiltroCeros'
            ,'inconformidad'
            ,'barrasFiltroBanco'
            ,'presentacion'];
    }

    protected function filterableBy() : array
    {
        return ['id'
                ,'orden_codigo'
                ,'user.id'
                ,"cliente_id"
                ,"orden_estado_id"
                ,"orden_tipo"
                ,"barras.id"
                ,"barras.barra_oro_comision_real"
                ,"barras.barra_estado_id"
                ,"barrasFiltroCeros.barra_peso_banco"
                ,"created_at"
                ,"inconformidad.activated"
                ,"inconformidad.id"
                ,"receptor_id"
                ,"orden_impresa"
            ];
    }

}
