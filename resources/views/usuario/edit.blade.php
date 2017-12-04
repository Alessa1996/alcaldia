@extends('layouts.app')

@section('content')
<div class="container tabla">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar usuario </div>
                <div class="panel-body">
                	{!! Form::open(['route'=>['usuario.update',$usuario] ,'method'=>'PUT'])!!}
                	<div class="form-group">
                		{!! Form::label('name','Nombre')!!}
                		{!! Form::text('name', $usuario->name ,['class'=>'form-control','placeholder'=>'usuario del evento','required'])!!}
                	</div>
                	<div class="form-group">
                		{!! Form::label('email','Email')!!}
                		{!! Form::text('email',$usuario->email,['class'=>'form-control','placeholder'=>'descripcion del evento','required'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('dependencia','Dependencia')!!}
                        {!! Form::text('dependencia',$usuario->dependencia,['class'=>'form-control','placeholder'=>'descripcion del evento','required'])!!}
                	</div class="form-group">
                	{!! Form::submit('Editar',['class'=>'btn btn-control'])!!}
       	         	<div> 

                	</div>
                	{!! Form::close() !!}

@endsection