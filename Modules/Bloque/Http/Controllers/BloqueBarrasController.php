<?php

namespace Modules\Bloque\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController;
use Modules\Bloque\Entities\Bloque;
use Orion\Concerns\DisableAuthorization;
class BloqueBarrasController extends RelationController
{
    use DisableAuthorization;

    protected $model = Bloque::class;
    protected $relation = 'barras';

}