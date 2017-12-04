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
            <div class="panel-heading">Crear estado del evento</div>
            <div class="panel-body">
                {!! Form::open(['route'=>'estado.store','method'=>'POST','id'=>'estadoform','name'=>'estadoform'])!!}
                <div class="form-group">
                    {!! Form::label('estado','Estado')!!}
                    {!! Form::text('estado',null,['class'=>'form-control','placeholder'=>'Estado del evento','required','id'=>"estado"])!!}
                </div>
                
                </div class="form-group">
                {!! Form::submit('Registrar',['class'=>'boton lista btn btn-control'])!!}
                
                {!! Form::close() !!}

            </div>
        </div>
    </div>
 @endsection
