@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mostrar participantes</div>
                <div class="panel-body">
                  	<table class="table table-striped">
                		<thead>
                			<th>Id</th>
                			<th>Nombre completo</th>
                			<th>Telefono </th>
                			<th>Cedula</th>
                			<th>Accion</th>
                		</thead>
                		<tbody>
                			@foreach ($participantes as $participante)
                				<tr>
                					<td>{{ $participante->idparticipantes}}</td>
                					<td>{{ $participante->nombrepa}}</td>
                					<td>{{ $participante->telefono}}</td>
                					<td>{{ $participante->cedula}}</td>
                					<td>
                						<a href="{{ route('participantes.edit',$participante->idparticipantes) }}" class="btn btn-info">editar</a></td>
                				</tr>
                			@endforeach
                		</tbody>
                	</table>
                	{!!$participantes->render()!!}

 @endsection