@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar lista de chequeo </div>
                <div class="panel-body">
                	{!! Form::open(['route'=>['lista.update',$listas] ,'method'=>'PUT'])!!}
                	<div class="form-group">
                		{!! Form::label('nombre','Nombre')!!}
                		{!! Form::text('nombre', $listas->nombre ,['class'=>'form-control','placeholder'=>'Nombre de la lista','required'])!!}
                	
                   	</div class="form-group">
                	{!! Form::submit('Editar',['class'=>'btn btn-control'])!!}
       	         	<div> 

                	</div>
                	{!! Form::close() !!}

@endsection