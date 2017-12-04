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
            <div class="panel-heading">Crear tematica del evento</div>
            <div class="panel-body">
                {!! Form::open(['route'=>'tematica.store','method'=>'POST','id'=>'temaform','name'=>'temaform'])!!}
                <div class="form-group">
                    {!! Form::label('tematica','Tematica')!!}
                    {!! Form::text('tematica',null,['class'=>'form-control','placeholder'=>'Nombres de la tematica del evento','required','id'=>"tema"])!!}
                </div>
                <div class="form-group">
                    {!! Form::label('descripcion','Descripcion')!!}
                    {!! Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Descripcion  del evento','required','id'=>"descri"])!!}
                                    
                </div class="form-group">
                {!! Form::submit('Registrar',['class'=>'boton lista btn btn-control'])!!}
                
                {!! Form::close() !!}

            </div>
        </div>
    </div>
 @endsection
