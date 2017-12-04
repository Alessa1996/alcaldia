<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tematica;
use Laracasts\Flash\Flash;

class TematicaController extends Controller
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
        $tematica=Tematica::orderBy('idtematica',"ASC")->paginate(5);
        return view('tematica.index')->with('tematicas',$tematica); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tematica.create');
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
            'tematica'=>'required|min:6|max:40', 
            'descripcion'=>'required',
           
            ]); 

        $tematica=new Tematica( $request->all());
        if ($tematica->save()) {
            $mensaje = "Success";
            $tematica= Tematica::all()->last();
        }else{
            $mensaje = "falied";
            $tematica = "";
        }
      
       return response()->json(["mensaje" => $mensaje,"tematica"=>$tematica]);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tematica=Tematica::find($id);
        return view('tematica.edit')->with('tematica',$tematica);
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
       $tematica=Tematica::find($id);
       $tematica->tematica= $request->tematica;
       $tematica->descripcion= $request->descripcion;
       $tematica->save();
       Flash:: warning('La tematica '.$tematica->tematica.' ha sido editada satisfactoriamente ');
       return redirect()->route('tematica.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
