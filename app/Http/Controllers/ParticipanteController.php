<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participantes;
use Laracasts\Flash\Flash;
use validator;


class ParticipanteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participantes=Participantes::orderBy('idparticipantes',"ASC")->paginate(5);
        return view('participantes.index')->with('participantes',$participantes);

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}
    public function create()
    {
        //
       return view('participantes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $this->validate($request,[
            'nombrepa'=>'required|min:6|max:40', 
            'telefono'=>'required|min:6|max:13',
            'cedula'=>'required|unique:participantes|max:11'
            ]); 

        $participante=new Participantes( $request->all());
        if ($participante->save()) {
            $mensaje = "Success";
            $participante= Participantes::all()->last();
        }else{
            $mensaje = "falied";
            $participante = "";
        }
      
       return response()->json(["mensaje" => $mensaje,"participante"=>$participante]);
       
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $participante=participantes::find($id);
        return view('participantes.edit')->with('participantes',$participante);
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
       $participante=participantes::find($id);
       $participante->nombrepa= $request->nombrepa;
       $participante->telefono= $request->telefono;
       $participante->cedula= $request->cedula;
       $participante->save();
       Flash:: warning('El participante '.$participante->nombrepa.'  ha sido editado satisfactoriamente ');
       return redirect()->route('participantes.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $participante=participantes::find($id);
        $participante::destroy($id);
        Flash::error('El participante '.$participante->nombre." ha sido eliminado de forma exitosa" );
       return redirect()->route('participantes.index');
}
}
