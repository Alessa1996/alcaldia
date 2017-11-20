<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eventos;
use App\ListaDeChequeo;
use App\Items;
use App\ListaDeChequeoHasItem;
use App\EventosHasParticipantes;
use App\Participantes;
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
    public function index()
    {
      return view('/home');
       
     }
    public function create()
    {
        $lista=ListaDeChequeo::pluck('nombre','idlista');
        $item=Items::pluck('item','iditem');
        $participante=Participantes::pluck('nombrepa','idparticipantes');
        $evento=Eventos::orderBy('ideventos',"ASC")->paginate(5);
        $listait=ListaDeChequeo::pluck('nombre','idlista');
        $item=Items::pluck('item','iditem');
        $evepart=EventosHasParticipantes::pluck('participantes_idparticipantes','eventos_ideventos');
    

        return view('evento/create')
        ->with('lista',$lista)
        ->with('item',$item)
        ->with('participante',$participante)
        ->with('evento',$evento)
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
       $show='';

      
       return redirect()->route('evento.create')->with('eventos',$evento);
      }
        


     public function edit($id)
    {
          $evento=Eventos::find($id);
        return view('evento.edit')->with('evento',$evento);
    }
  public function update(Request $request, $id)
    {
       $evento=Eventos::find($id);
       $lista->$request->all();
       $lista->save();
       Flash:: warning('La lista '.$lista->nombre.' ha sido editado satisfactoriamente ');
       return redirect()->route('home');
    }
    
    public function delete()
    {
      
    }


}
