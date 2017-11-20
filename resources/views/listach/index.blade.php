@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mostrar listas</div>
                <div class="panel-body">
                	<a href="{{route('lista.create')}}" class="btn btn-success btn-sm">Registrar una nueva lista</a><hr>
                	<table class="table table-striped">
                		<thead>
                            <th>Id</th>
                			<th>Nombre</th>
                			
                 		</thead>
                		<tbody>
                			@foreach ($listas as $lista)
                				<tr>
                					<td>{{ $lista->idlista}}</td>
                					<td>{{ $lista->nombre}}</td>
                					
                					<td>
                						<a href="{{ route('lista.destroy',$lista->idlista) }}" onclick=" return confirm ('¿estas seguro que quieres eliminar este dato?')" class="btn btn-danger">eliminar</a>
                						<a href="{{ route('lista.edit',$lista->idlista) }}" class="btn btn-info">editar</a></td>
                				</tr>
                			@endforeach
                		</tbody>
                	</table>
                	{!!$listas->render()!!}

 @endsection