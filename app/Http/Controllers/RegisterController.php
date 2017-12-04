<?php

namespace App\Http\Controllers;

use App\User;
use App\tipo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
      
    public function __construct()
    {
        $this->middleware('auth');
    }
     public function index()
    {
      $usuario=User::orderBy('id',"ASC")->paginate(15);
      return view('usuario.index')->with('usuarios',$usuario); 
       
     }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'dependencia' => 'required|max:255',
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create()
    {
        $tipo=Tipo::pluck('nombreti','idtipo');
        return view('usuario/create')
        ->with('tipo',$tipo);
    }
     public function store (Request $request)
    {
       $usuario=new User($request->all());
       $usuario->$request->all();
       $usuario->password=bcrypt($request->password);
       $usuario->save();

            
       return redirect()->route('usuario.index');
      }  
       public function show($id)
    {
        //
    }
      public function edit($id)
    {
        $usuario=User::find($id);
        return view('usuario.edit')->with('usuario',$usuario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $usuario=User::find($id);
       $usuario->name= $request->name;
       $usuario->email= $request->email;
       $usuario->dependencia= $request->dependencia;
       $usuario->save();
       return redirect()->route('usuario.index');
    }  
        
    
}
