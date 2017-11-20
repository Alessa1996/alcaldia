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
                <div class="panel-heading">Crear items</div>
                <div class="panel-body">
                	{!! Form::open(['route'=>'item.store','method'=>'POST'])!!}
                	<div class="form-group">
                		{!! Form::label('item','Item')!!}
                		{!! Form::text('item',null,['class'=>'form-control','placeholder'=>'Nombres del item a utilizar','required'])!!}
                	                	
                	</div class="form-group">
                	{!! Form::submit('Registrar',['class'=>'btn btn-control'])!!}
       	         	<div> 

                	</div>
                	{!! Form::close() !!}

@endsection
