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
                <div class="panel-heading">Crear Lista de chequeo</div>
                <div class="panel-body">
                	{!! Form::open(['route'=>'lista.store','method'=>'POST','id'=>'listaform','name'=>'listaform'])!!}
                	<div class="form-group">
                		{!! Form::label('nombre','Nombre')!!}
                		{!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombres de la lista de chequeo','required','id'=>"nombre"])!!}
                	                	
                	</div class="form-group">
                	{!! Form::submit('Registrar',['class'=>'boton lista btn btn-control'])!!}
       	         	
                	{!! Form::close() !!}

</div>
</div>
</div>
</div>
@endsection