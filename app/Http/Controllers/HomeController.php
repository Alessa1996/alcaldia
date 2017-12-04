<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eventos;
use App\ListaDeChequeo;
use App\Items;
use App\ListaDeChequeoHasItem;
use App\EventosHasParticipantes;
use App\Participantes;
use App\Tematica;
use App\Estado;
use Auth;
use  PDF;
use Laracasts\Flash\Flash;
use validator;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $usuario=Auth::User()->name;
      $evento=Eventos::orderBy('ideventos',"ASC")->paginate(45);
      $eve=EventosHasParticipantes::orderBy('eventos_ideventos','ASC')->paginate(6);
     
      return view('evento.index')->with('eventos',$evento)->with('eves',$eve)->with('usuarios',$usuario); 
       
     }
    public function create()
    {
        $lista=ListaDeChequeo::pluck('nombre','idlista');
        $item=Items::pluck('item','iditem');
        $participante=Participantes::pluck('nombrepa','idparticipantes');
        $event=Eventos::pluck('nombre_eve','ideventos');
        $tematica=Tematica::pluck('tematica','idtematica');
        $estado=Estado::pluck('estado','idestado');
        $evento=Eventos::orderBy('ideventos',"ASC")->paginate(45);
        $listait=ListaDeChequeo::pluck('nombre','idlista');
        $item=Items::pluck('item','iditem');

        $evepart=EventosHasParticipantes::pluck('participantes_idparticipantes','eventos_ideventos');
    

        return view('evento/create')
        ->with('lista',$lista)
        ->with('item',$item)
        ->with('participante',$participante)
        ->with('evento',$evento)
        ->with('event',$event)
        ->with('estado',$estado)
        ->with('tematica',$tematica)
        ->with('item',$item)
        ->with('evepart',$evepart)
        ->with('listait',$listait);

    }

    public function store (Request $request)
    {
       $request->file('programacion')->store('public');
       $file=$request->file('programacion');
       $name='progra_'.time().'.'.$file->getClientOriginalExtension();
       $evento=new Eventos($request->all());
       $evento->programacion=$name;
       $evento->save();

            
       return redirect()->route('evento.index');
      }
  
  public function show($id)
      {
           $pdf = PDF::loadView('$id');
      return $pdf->download('$id');
    }

     public function edit($id)
    {
        $lista=ListaDeChequeo::pluck('nombre','idlista');
        $tematica=Tematica::pluck('tematica','idtematica');
        $evento=Eventos::find($id);
        return view('evento.edit')->with('evento',$evento)
        ->with('lista',$lista)->with('tematica',$tematica);
    }
  public function update(Request $request, $id)
    {
       $evento=Eventos::find($id);
       $evento->fecha=$request->fecha;
       $evento->lugar=$request->lugar;
       $evento->hora=$request->hora;
       $evento->nombre_eve=$request->nombre_eve;
       $evento->tematica_idtematica=$request->tematica_idtematica;
       $evento->listadechequeo_idlista=$request->listadechequeo_idlista;
       $evento->save();
       Flash:: warning('La lista '.$evento->nombre_eve.' ha sido editado satisfactoriamente ');
       return redirect()->route('home');
    }
    
    public function delete()
    {
      
    }


}
