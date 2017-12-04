@extends('layouts.app')

@section('content')
<div class="container tabla">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar tematica </div>
                <div class="panel-body">
                	{!! Form::open(['route'=>['tematica.update',$tematica] ,'method'=>'PUT'])!!}
                	<div class="form-group">
                		{!! Form::label('tematica','Tematica')!!}
                		{!! Form::text('tematica', $tematica->tematica ,['class'=>'form-control','placeholder'=>'Tematica del evento','required'])!!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('descripcion','Descripcion')!!}
                		{!! Form::text('descripcion',$tematica->descripcion,['class'=>'form-control','placeholder'=>'descripcion del evento','required'])!!}
                	</div class="form-group">
                	{!! Form::submit('Editar',['class'=>'btn btn-control'])!!}
       	         	<div> 

                	</div>
                	{!! Form::close() !!}

@endsection