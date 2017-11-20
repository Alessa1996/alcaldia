<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListaDeChequeo;
use Laracasts\Flash\Flash;
use validator;

class ListadechequeoController extends Controller
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
        $lista=ListaDeChequeo::orderBy('idlista',"ASC")->paginate(5);
        return view('listach.index')->with('listas',$lista);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listach.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
            'nombre'=>'required|min:4|max:40'
                      
            ]); 

        $lista=new ListaDeChequeo( $request->all());
        if ($lista->save()) {
            $mensaje = "Success";
            $lista = ListaDeChequeo::all()->last();
        }else{
            $mensaje = "falied";
            $lista = "";
        }
      //return Redirect::route('evento.create');
      //return redirect('evento/create');
      return response()->json(["mensaje" => $mensaje,"lista"=>$lista]);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $lista=ListaDeChequeo::find($id);
        return view('listach.edit')->with('listas',$lista);
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
       $lista=ListaDeChequeo::find($id);
       $lista->nombre= $request->nombre;
       $lista->save();
       Flash:: warning('La lista '.$lista->nombre.' ha sido editado satisfactoriamente ');
       return redirect()->route('lista.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lista=ListaDeChequeo::find($id);
        $lista::destroy($id);
        Flash::error('El lista '.$lista->nombre." ha sido eliminado de forma exitosa" );
       return redirect()->route('lista.index');
    }
}
