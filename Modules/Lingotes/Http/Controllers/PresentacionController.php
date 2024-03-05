<?php

namespace Modules\Lingotes\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Lingotes\Entities\Presentaciones;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;


class PresentacionController extends Controller
{
    use DisableAuthorization;

    protected $model = Presentaciones::class;

    protected function includes() : array
    {
        return [];
    }

    protected function filterableBy() : array
    {
        return ['id', 'presentacion_nombre', 'presentacion_peso'];
    }

}
