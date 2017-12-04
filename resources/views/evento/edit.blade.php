@extends('layouts.app')

@section('content')
<div class="container tabla">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar tematica </div>
                <div class="panel-body">
                	{!! Form::open(['route'=>['evento.update',$evento] ,'method'=>'PUT'])!!}
                	<div class="form-group">
                		{!! Form::label('fecha','Fecha')!!}
                		<input type="date" name="fecha" id="fecha" value="{{$evento->fecha}}" class="form-control">
                	</div>
                	<div class="form-group">
                		{!! Form::label('lugar','Lugar')!!}
                		{!! Form::text('lugar',$evento->lugar,['class'=>'form-control','placeholder'=>'Lugar  del evento','required'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('hora','Hora')!!}
                        <input type="time" name="hora" id="hora" value="{{$evento->hora}}" class="form-control">
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                             {!! Form::label('nombre_eve','Nombre')!!}
                             {!! Form::text('nombre_eve',$evento->nombre_eve,['class'=>'form-control','placeholder'=>'Nombres del evento','required'])!!}
                        </div>
                        <div class="form-group  col-md-6 col-sm-12">
                            {!! Form::label('responsable','Reponsable')!!}
                            {!! Form::text('responsable',$evento->responsable,['class'=>'form-control','placeholder'=>'Responsable del evento','required'])!!}
                        </div>
                        <div class="form-group  col-md-6 col-sm-12">
                            {!! Form::label('tematica','Tematica')!!}
                            {!! Form::Select('tematica_idtematica',$tematica,$evento->tematica_idtematica,['class'=>'form-control','placeholder'=>'selecione un opcion','required'])!!}
                        </div>
                        <div class="form-group  col-md-6 col-sm-12">
                            {!! Form::label('listadechequeo_idlista','Lista de chequeo')!!}
                            {!!Form::Select('listadechequeo_idlista',$lista,$evento->listadechequeo_idlista,['class'=>'form-control','placeholder'=>'selecione un opcion','required'])!!}
                        </div>
                	</div class="form-group">
                	{!! Form::submit('Editar',['class'=>'btn btn-control'])!!}
       	         	<div> 

                	</div>
                	{!! Form::close() !!}

@endsection