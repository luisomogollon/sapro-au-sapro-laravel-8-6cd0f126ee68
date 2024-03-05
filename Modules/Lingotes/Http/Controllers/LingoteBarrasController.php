<?php

namespace Modules\Lingotes\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Lingotes\Entities\Lingote;
use Orion\Http\Controllers\RelationController;
use Orion\Concerns\DisableAuthorization;

class LingoteBarrasController extends RelationController
{
   use DisableAuthorization;
   
   protected $model = Lingote::class;
   
   protected $pivotFillable = [
    'barra_lingote_cantidad'
    , 'user_id'
   ];
   protected $relation = "barraLingote";
}
