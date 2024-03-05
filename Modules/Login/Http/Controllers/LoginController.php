<?php

namespace Modules\Login\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('login::index');
    }

    public function loginRecepcion(Request $request)
    {

        $this->validateLogin($request);
        return $this->loginLogic($request,1);
    }

    public function loginLaboratorio(Request $request)
    {

        $this->validateLogin($request);
        return $this->loginLogic($request,2);
    }
    
    public function loginRefineria(Request $request)
    {

        $this->validateLogin($request);
        return $this->loginLogic($request,3);
    }

    public function loginBoveda(Request $request)
    {

        $this->validateLogin($request);
        return $this->loginLogic($request,4);
    }

    public function loginDespacho(Request $request)
    {

        $this->validateLogin($request);
        return $this->loginLogic($request,5);
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('login::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('login::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('login::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function loginLogic ($request,$department=null){
        $credentials = $request->only('email', 'password');
        $credentials ['department_id'] = $department;
        $credentials ['activated'] = 1;
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Error Clave o Email'
            ], 401);
        }

        return response()->json([
            'token' => $request->user()->createToken($request->device)->plainTextToken,
            'message' => 'Success',
            'user' => $request->user()
        ],200);
    }

    public function validateLogin(Request $request)
  {
    return $request->validate([
      'email' => 'required|email',
      'password' => 'required',
      'device' => 'required',
      
    ]);
  }
}
