<?php

namespace Modules\Ordenes\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Ordenes\Entities\Orden;
use Orion\Http\Controllers\RelationController;
use Orion\Concerns\DisableAuthorization;
use Modules\Ordenes\Http\Requests\OrdenBarrasRequest;

class OrdenBarrasController extends RelationController
{
    use DisableAuthorization;
    protected $model = Orden::class;
    protected $relation = "barras";
    protected $request = OrdenBarrasRequest::class;
}
