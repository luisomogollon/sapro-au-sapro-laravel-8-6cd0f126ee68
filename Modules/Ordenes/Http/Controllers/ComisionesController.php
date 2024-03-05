<?php

namespace Modules\Ordenes\Http\Controllers;

use Modules\Ordenes\Entities\Comision;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;

class ComisionesController extends Controller
{
    use DisableAuthorization;

    protected $model = Comision::class;

}