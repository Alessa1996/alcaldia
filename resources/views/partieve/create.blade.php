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

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear participantes del evento</div>
                    <div class="panel-body">
                    	{!! Form::open(['route'=>'evenpart.store','method'=>'POST','id'=>'evepartform','name'=>'evenpartform'])!!}
                    	  <div class="form-group  col-md-6 col-sm-12">
                                {!! Form::label('eventos_ideventos','Evento')!!}
                                {!!Form::Select('eventos_ideventos',$evento,null,['class'=>'form-control','placeholder'=>'selecione un opcion','required'])!!}
                            </div>
                             <div class="form-group  col-md-6 col-sm-12">
                                {!! Form::label('participantes_idparticipantes','Participantes')!!}
                                {!!Form::Select('participantes_idparticipantes',$parti,null,['class'=>'form-control','placeholder'=>'selecione un opcion','multiple','required'])!!}
                            </div>
                       
                    	<div class="form-group">
                    	{!! Form::submit('Registrar',['class'=>'boton eveparb btn btn-control'])!!}
           	         	
                    	{!! Form::close() !!}
                        </div>
                 </div>
            </div>
            </div>
</div>
</div>
@endsection
