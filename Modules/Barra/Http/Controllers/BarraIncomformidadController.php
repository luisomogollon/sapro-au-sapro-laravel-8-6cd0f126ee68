<?php

namespace Modules\Barra\Http\Controllers;

use App\Models\Barra;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Inconformidad\Entities\Inconformidad;
use Orion\Http\Controllers\RelationController as Controller;
use Orion\Concerns\DisableAuthorization;

class BarraIncomformidadController extends Controller
{
    use DisableAuthorization;

    protected $model = Barra::class;

    protected $relation = 'inconformidad';

}
