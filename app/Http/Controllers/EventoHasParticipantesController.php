<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participantes;
use Auth;
use App\Eventos;
use App\Estado;
use App\EventosHasParticipantes;


class EventoHasParticipantesController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
     $usuario=Auth::User()->name;
     $participantes=Participantes::pluck('nombrepa','idparticipantes');
     $evento=Eventos::pluck('nombre_eve','ideventos');
     $estado=Estado::pluck('estado','idestado');
     $even=EventosHasParticipantes::orderBy('eventos_ideventos','ASC')->paginate(5);
     return view('partieve.index')->with('evens',$even)->with('usuarios',$usuario)->with('evento',$evento)->with('participantes',$participantes)->with('estado',$estado);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()  {
    $evento=Eventos::pluck('nombre_eve','ideventos');
    $parti=Participantes::pluck('nombrepa','idparticipantes');
    $estado=Estado::pluck('estado','idestado');
    $us=Auth::User()->name;
    $participante=Participantes::orderBy('idparticipantes','ASC')->paginate(4);
        return view('partieve.create')
        ->with('evento',$evento)
        ->with('estado',$estado)
        ->with('participantes',$participante)
        ->with('parti',$parti);
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
            'eventos_ideventos'=>'required',
            'participantes_idparticipantes'=>'required', 
                                  
            ]); 

         $evepart =new EventosHasParticipantes( $request->all()); 
         if ($evepart->save()) {
            $mensaje = "Success";
            $evepart = EventosHasParticipantes::all()->last();
        }else{
            $mensaje = "falied";
            $evepart = "";
        }
         
        
          return response()->json(["mensaje" => $mensaje,"$evepart"=>$evepart]);
       
    }
     public function edit($id)
    {
        $evento=EventosHasParticipantes::find($id);
        $event=Eventos::pluck('nombre_eve','ideventos');
        $parti=Participantes::pluck('nombrepa','idparticipantes');
        $estado=Estado::pluck('estado','idestado');
        return view('partieve.edit')->with('event',$event)->with('parti',$parti)->with('evento',$evento)  ->with('estado',$estado);
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
       $eventos=EventosHasParticipantes::find($id);
       $eventos->eventos_ideventos= $request->eventos_ideventos;
       $eventos->participantes_idparticipantes= $request->participantes_idparticipantes;
       $eventos->estado_idestado= $request->estado_idestado;
       $eventos->save();
       return redirect()->route('evenpart.index');
    }

   
}

