@extends('layouts.app')

@section('content')
<div class="container tabla">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar estado </div>
                <div class="panel-body">
                	{!! Form::open(['route'=>['estado.update',$estado] ,'method'=>'PUT'])!!}
                	<div class="form-group">
                		{!! Form::label('estado','Estado')!!}
                		{!! Form::text('estado', $estado->estado ,['class'=>'form-control','placeholder'=>'estado del evento','required'])!!}
                	   
                	</div class="form-group">
                	{!! Form::submit('Editar',['class'=>'btn btn-control'])!!}
       	         	<div> 

                	</div>
                	{!! Form::close() !!}

@endsection