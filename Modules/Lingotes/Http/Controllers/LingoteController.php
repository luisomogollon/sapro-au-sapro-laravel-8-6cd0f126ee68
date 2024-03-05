<?php

namespace Modules\Lingotes\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Lingotes\Entities\Lingote;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;

class LingoteController extends Controller
{
    use DisableAuthorization;
    
    protected $model = Lingote::class;

    protected function includes() : array
    {
        return ['barraEstado', 'orden', 'metales.barras','metales'];
    }

    protected function filterableBy() : array
    {
        return ['id'
        , 'lingote_estado_id'
        , 'presentacion_id'
        , 'lingote_peso'
        ,'lingote_peso_real'
        , 'user_id'
        , 'lingote_ley'
        , 'created_at'];
    }

}
