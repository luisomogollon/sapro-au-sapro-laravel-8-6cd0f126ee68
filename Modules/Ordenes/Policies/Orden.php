<?php

namespace Modules\Ordenes\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class Orden
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function viewAny( $orden)
    {
        return true;
    }

    public function view( $orden)
    {
        return true;
    }

    public function update($orden){
        return true;
    }
    public function create($orden){
        return true;
    }

}
