<?php

namespace Modules\Barra\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Barra\Entities\Barra;
use Orion\Http\Controllers\RelationController;
use Orion\Concerns\DisableAuthorization;

class BarraMetalesController extends RelationController
{
    use DisableAuthorization;

    protected $model = Barra::class;
    protected $pivotFillable = [
        "barra_metal_contenido"
    ];
    protected $relation = "metales";
}
