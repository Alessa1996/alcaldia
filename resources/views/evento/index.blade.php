@if (Auth::User()->tipo_idtipo =="1")
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Mostrar Eventos</div>
                <div class="panel-body">
                    <a href="{{ route('evento.create') }}" class="btn btn-info">crear nuevo evento</a></td>
                	<table class="table table-striped">
                		<thead>
                			<th>Id</th>
                            <th>Fecha</th>
                            <th>Lugar</th>
                            <th>Hora</th>
                            <th>Nombre evento</th>
                            <th>Responsable</th>
                            <th>Tematica</th>
                            <th>Descripcion </th>
                            <th>Programacion</th>
                            <th>Lista de chequeo</th>
                       		</thead>
                		<tbody>
                			@foreach ($eventos as $evento)
                				<tr>
                					<td>{{ $evento->ideventos}}</td>
                					<td>{{ $evento->fecha}}</td>
                					<td>{{ $evento->lugar}}</td>
                                    <td>{{ $evento->hora}}</td>
                                    <td>{{ $evento->nombre_eve}}</td>
                                    <td>{{ $evento->responsable}}</td>
                                    <td>{{ $evento->tematica->tematica}}</td>
                                    <td>{{ $evento->tematica->descripcion}}</td>
                                    <td>{{ $evento->programacion}}</td>
                                    <td>{{ $evento->listadechequeo->nombre}}</td>
                                	<td>
                						<a href="{{ route('evento.destroy',$evento->ideventos) }}" onclick=" return confirm ('¿estas seguro que quieres eliminar este dato?')" class="btn btn-danger">eliminar</a>
                						<a href="{{ route('evento.edit',$evento->ideventos) }}" class="btn btn-info">editar</a></td>
                				</tr>
                			@endforeach
                		</tbody>
                	</table>
                	{!!$eventos->render()!!}

 @endsection
 @endif

@if (Auth::User()->tipo_idtipo =="2")
    
        @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Mostrar Eventos</div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <th>Evento</th>
                                    <th>Estado</th>
                                    </thead>
                                <tbody>
                                    @foreach ($eves as $eve)
                                        <tr>
                                            @if ($usuarios==$eve->participante->nombrepa)
                                            <td>{{ $eve->evento->nombre_eve}}</td>
                                            <td>{{ $eve->estado->estado}}</td>
                                            
                                            <td>
                                            <a href="{{ route('evento.edit',$eve->eventos_ideventos) }}" class="btn btn-info">editar</a></td>
                                        </tr>
                                         @endif
                                    @endforeach
                                </tbody>
                            </table>
                            {!!$eves->render()!!}

         @endsection
@endif