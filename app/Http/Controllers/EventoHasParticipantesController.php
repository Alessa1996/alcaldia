<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participantes;
use App\Eventos;
use App\EventosHasParticipantes;

class EventoHasParticipantesController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()  {
    $evento=Eventos::pluck('nombre_eve','ideventos');
    $parti=Participantes::pluck('nombrepa','idparticipantes');
    
        return view('partieve.create')
        ->with('evento',$evento)
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
      //return Redirect::route('evento.create');
      //return redirect('evento/create');
      return response()->json(["mensaje" => $mensaje,"$evepart"=>$evepart]);
       
    }
}

