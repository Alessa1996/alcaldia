@extends('layouts.app')

@section('content')
<div class="container tabla">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar participantes </div>
                <div class="panel-body">
                	{!! Form::open(['route'=>['participantes.update',$participantes] ,'method'=>'PUT'])!!}
                	<div class="form-group">
                		{!! Form::label('nombre','Nombre')!!}
                		{!! Form::text('nombre', $participantes->nombre ,['class'=>'form-control','placeholder'=>'Nombres completos','required'])!!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('apellido','Apellido')!!}
                		{!! Form::text('apellido',$participantes->apellido,['class'=>'form-control','placeholder'=>'Apellidos completos','required'])!!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('telefono','Telefono')!!}
                		{!! Form::text('telefono',$participantes->telefono,['class'=>'form-control','placeholder'=>'#########','required'])!!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('cedula','Cedula')!!}
                		{!! Form::text('cedula',$participantes->cedula,['class'=>'form-control','placeholder'=>'100000000','required'])!!}
                	</div class="form-group">
                	{!! Form::submit('Editar',['class'=>'btn btn-control'])!!}
       	         	<div> 

                	</div>
                	{!! Form::close() !!}

@endsection