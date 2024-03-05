<?php

namespace Modules\Inconformidad\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Inconformidad\Entities\Inconformidad;
use Orion\Http\Controllers\RelationController as Controller;
use Orion\Concerns\DisableAuthorization;

class InconformidadOrdenController extends Controller
{
 use DisableAuthorization;

 protected $model = Inconformidad::class;

 protected $relation = 'inconforme';

}
