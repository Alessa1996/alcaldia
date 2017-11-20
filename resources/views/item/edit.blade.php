@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar items </div>
                <div class="panel-body">
                	{!! Form::open(['route'=>['item.update',$item] ,'method'=>'PUT'])!!}
                	<div class="form-group">
                		{!! Form::label('item','item')!!}
                		{!! Form::text('item', $item->item ,['class'=>'form-control','placeholder'=>'Nombre del item','required'])!!}
                	
                	</div class="form-group">
                	{!! Form::submit('Editar',['class'=>'btn btn-control'])!!}
       	         	<div> 

                	</div>
                	{!! Form::close() !!}

@endsection