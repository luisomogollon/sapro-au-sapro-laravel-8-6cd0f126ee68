<?php

namespace Modules\Barra\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Barra\Entities\Barra;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Modules\Barra\Http\Requests\BarraOrionRequest;

class BarraController extends Controller
{
    use DisableAuthorization;
    protected $model = Barra::class;
    protected $request = BarraOrionRequest::class;
    protected function alwaysIncludes() : array
    {
        return ['ley', 'viruta','barraEstado'];
    }

    protected function includes() : array
    {
        return ['barraEstado', 'orden', 'metales.barras','metales'];
    }

    public function login (Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
    

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
     }
}
