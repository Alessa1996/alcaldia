@if (Auth::User()->tipo_idtipo ="1")
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar items de la lista de chequeo </div>
                <div class="panel-body">
                	{!! Form::open(['route'=>['listait.update',$listait] ,'method'=>'PUT'])!!}
                	<div class="form-group">
                		<div class="form-group  col-md-6 col-sm-12">
                                {!! Form::label('listadechequeo_idlista','Lista de chequeo')!!}
                                {!!Form::Select('listadechequeo_idlista',$lista,$listait->listadechequeo_idlista,['class'=>'form-control','placeholder'=>'selecione un opcion','required'])!!}
                            </div>
                             <div class="form-group  col-md-6 col-sm-12">
                                {!! Form::label('item_iditem','Items')!!}
                                {!!Form::Select('item_iditem',$item,$listait->item_iditem,['class'=>'form-control','placeholder'=>'selecione un opcion','required'])!!}
                            </div>
                        <div class="form-group">
                            {!! Form::label('cantidad','Cantidad')!!}
                            {!! Form::text('cantidad',$listait->cantidad,['class'=>'form-control','placeholder'=>'Cantidad de items de la lista de chequeo','required','id'=>"cantidad"])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('responsable','Responsable')!!}
                            {!! Form::text('responsable',$listait->responsable,['class'=>'form-control','placeholder'=>'Responsable del item','required','id'=>"respon"])!!}
                        </div>              
                	</div class="form-group">
                	{!! Form::submit('Editar',['class'=>'btn btn-control'])!!}
                 	{!! Form::close() !!}

@endsection
@endif