<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use Laracasts\Flash\Flash;
use validator;

class ItemController extends Controller
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
          $item=Items::orderBy('iditem',"ASC")->paginate(5);
        return view('item.index')->with('items',$item);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item.create');
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
            'item'=>'required|min:4|max:40'
                      
            ]); 

        $item=new Items( $request->all());
        $item->save();
       Flash::success("se ha registrado al item ".$item->item." de forma exitosa");
       return redirect()->route('item.index');
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
         $item=items::find($id);
        return view('item.edit')->with('item',$item);
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
       $items=Items::find($id);
       $items->item= $request->item;
       $items->save();
       Flash:: warning('El item '.$items->item.' ha sido editado satisfactoriamente ');
       return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $item=Items::find($id);
        $item::destroy($id);
        Flash::error('El item '.$item->item." ha sido eliminado de forma exitosa" );
       return redirect()->route('item.index');
    }
}
