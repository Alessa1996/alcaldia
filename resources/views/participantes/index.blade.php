@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mostrar participantes</div>
                <div class="panel-body">
                	<a href="{{route('participantes.create')}}" class="btn btn-success btn-sm">Registrar un nuevo participante</a><hr>
                	<table class="table table-striped">
                		<thead>
                			<th>Id</th>
                			<th>Nombre</th>
                			<th>Apellidos</th>
                			<th>Telefono </th>
                			<th>Cedula</th>
                			<th>Accion</th>
                		</thead>
                		<tbody>
                			@foreach ($participantes as $participante)
                				<tr>
                					<td>{{ $participante->idparticipantes}}</td>
                					<td>{{ $participante->nombre}}</td>
                					<td>{{ $participante->apellido}}</td>
                					<td>{{ $participante->telefono}}</td>
                					<td>{{ $participante->cedula}}</td>
                					<td>
                						<a href="{{ route('participantes.destroy',$participante->idparticipantes) }}" onclick=" return confirm ('¿estas seguro que quieres eliminar este dato?')" class="btn btn-danger">eliminar</a>
                						<a href="{{ route('participantes.edit',$participante->idparticipantes) }}" class="btn btn-info">editar</a></td>
                				</tr>
                			@endforeach
                		</tbody>
                	</table>
                	{!!$participantes->render()!!}

 @endsection