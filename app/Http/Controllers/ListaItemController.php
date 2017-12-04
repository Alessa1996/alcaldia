<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListaDeChequeo;
use Laracasts\Flash\Flash;
use App\Items;
use App\ListaDeChequeoHasItem;


class ListaItemController extends Controller
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
      $lista=ListaDeChequeoHasItem::orderBy('listadechequeo_idlista',"ASC")->paginate(5);
        return view('itemli.index')->with('listas',$lista); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()  {
    $listait=ListaDeChequeo::pluck('nombre','idlista');
    $item=Items::pluck('item','iditem');
    
        return view('itemli.create')
        ->with('item',$item)
        ->with('listait',$listait);
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
            'listadechequeo_idlista'=>'required',
            'item_iditem'=>'required', 
            'cantidad'=>'required',
            'responsable'=>'required'
                      
            ]); 

        $listait=new ListaDeChequeoHasItem( $request->all());
        if ($listait->save()) {
            $mensaje = "Success";
            $listait = ListaDeChequeoHasItem::all()->last();
        }else{
            $mensaje = "falied";
            $listait = "";
        }
      //return Redirect::route('evento.create');
      //return redirect('evento/create');
      return response()->json(["mensaje" => $mensaje,"listait"=>$listait]);
       
    }
    public function edit($id)
    {
        $listait=ListaDeChequeoHasItem::find($id);
        $lista=ListaDeChequeo::pluck('nombre','idlista');
        $item=Items::pluck('item','iditem');
        
            return view('itemli.edit')
            ->with('item',$item)
            ->with('listait',$listait)
             ->with('lista',$lista);
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
       $listait=ListaDeChequeoHasItem::find($id);
       $listait->listadechequeo_idlista= $request->listadechequeo_idlista;
       $listait->item_iditem= $request->item_iditem;
       $listait->cantidad= $request->cantidad;
       $listait->responsable= $request->responsable;
       $listait->save();
       return redirect()->route('listait.index');
    }
}
