<?php

namespace Modules\Ordenes\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController as Controller;
use Orion\Concerns\DisableAuthorization;
use App\Models\Ordene;

class OrdenInconformidadController extends Controller
{
   use DisableAuthorization;

   protected $model = Ordene::class;

   protected $relation = 'inconformidad';
}
