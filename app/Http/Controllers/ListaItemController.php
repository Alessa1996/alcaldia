<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListaDeChequeo;
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
            'items_iditem'=>'required', 
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
}
