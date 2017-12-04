@extends('layouts.app')

@section('content')
<div class="container tabla">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar participantes </div>
                <div class="panel-body">
                	{!! Form::open(['route'=>['evenpart.update',$evento] ,'method'=>'PUT'])!!}
                       <div class="form-group  col-md-6 col-sm-12">
                                {!! Form::label('eventos_ideventos','Evento')!!}
                                {!!Form::Select('eventos_ideventos',$event,$evento->eventos_ideventos,['class'=>'form-control','placeholder'=>'selecione un opcion','required'])!!}
                            </div>
                             <div class="form-group  col-md-6 col-sm-12">
                                {!! Form::label('participantes_idparticipantes','Participantes')!!}
                                {!!Form::Select('participantes_idparticipantes',$parti,$evento->participantes_idparticipantes,[ 'class'=>'form-control','placeholder'=>'selecione un opcion','required'])!!}
                            </div>
                             <div class="form-group  col-md-6 col-sm-12">
                                {!! Form::label('estado_idestado','Estado')!!}
                                {!!Form::Select('estado_idestado',$estado,$evento->estado_idestado,[ 'class'=>'form-control','placeholder'=>'selecione un opcion','required'])!!}
                            </div>
                       
                        <div class="form-group">
                        {!! Form::submit('Registrar',['class'=>'boton eveparb btn btn-control'])!!}
                        
                        {!! Form::close() !!}

@endsection