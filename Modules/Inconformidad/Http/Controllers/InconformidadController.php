<?php

namespace Modules\Inconformidad\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Inconformidad\Entities\Inconformidad;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;
class InconformidadController extends Controller
{
    use DisableAuthorization;
    protected $model = Inconformidad::class;

}
