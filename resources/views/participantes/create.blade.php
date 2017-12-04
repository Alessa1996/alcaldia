@extends('layouts.app')

@section('content')
@if(count($errors))
<div class="alert alert-danger">
    <ul>
       @foreach ($errors->all() as $error)
           <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear participantes</div>
                <div class="panel-body">
                	{!! Form::open(['route'=>'participantes.store','method'=>'POST','id'=>'parform','name'=>'parform'])!!}
                	<div class="form-group">
                		{!! Form::label('nombrepa','Nombre')!!}
                		{!! Form::text('nombrepa',null,['class'=>'form-control','placeholder'=>'Nombres completos','required'])!!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('telefono','Telefono')!!}
                		{!! Form::text('telefono',null,['class'=>'form-control','placeholder'=>'#########','required'])!!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('cedula','Cedula')!!}
                		{!! Form::text('cedula',null,['class'=>'form-control','placeholder'=>'100000000','required'])!!}
                	</div class="form-group">
                	{!! Form::submit('Registrar',['class'=>'boton parti btn btn-control'])!!}
       	         	<div> 

                	</div>
                	{!! Form::close() !!}
 @endsection
