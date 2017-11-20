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
                <div class="panel-heading">Crear Lista de chequeo con items</div>
                    <div class="panel-body">
                    	{!! Form::open(['route'=>'listait.store','method'=>'POST','id'=>'lisitform','name'=>'lisitform'])!!}
                    	  <div class="form-group  col-md-6 col-sm-12">
                                {!! Form::label('listadechequeo_idlista','Lista de chequeo')!!}
                                {!!Form::Select('listadechequeo_idlista',$listait,null,['class'=>'form-control','placeholder'=>'selecione un opcion','required'])!!}
                            </div>
                             <div class="form-group  col-md-6 col-sm-12">
                                {!! Form::label('items_iditem','Items')!!}
                                {!!Form::Select('items_iditem',$item,null,['class'=>'form-control','placeholder'=>'selecione un opcion','required'])!!}
                            </div>
                        <div class="form-group">
                    		{!! Form::label('cantidad','Cantidad')!!}
                    		{!! Form::text('cantidad',null,['class'=>'form-control','placeholder'=>'Cantidad de items de la lista de chequeo','required','id'=>"cantidad"])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('responsable','Responsable')!!}
                            {!! Form::text('responsable',null,['class'=>'form-control','placeholder'=>'Responsable del item','required','id'=>"respon"])!!}
                    	</div>           	
                    	<div class="form-group">
                    	{!! Form::submit('Registrar',['class'=>'boton itemli btn btn-control'])!!}
           	         	
                    	{!! Form::close() !!}
                        </div>
                 </div>
            </div>
            </div>
</div>
</div>
@endsection
