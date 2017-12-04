@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mostrar usuarios</div>
                <div class="panel-body">
                	<a href="{{route('usuario.create')}}" class="btn btn-success btn-sm">Registrar una nueva tematica</a><hr>
                	<table class="table table-striped">
                		<thead>
                			<th>Id</th>
                			<th>Nombre</th>
                			<th>Email</th>
                            <th>Dependencia</th>
                            <th>Tipo</th>

                  		</thead>
                		<tbody>
                			@foreach ($usuarios as $usuario)
                				<tr>
                					<td>{{ $usuario->id}}</td>
                					<td>{{ $usuario->name}}</td>
                					<td>{{ $usuario->email}}</td>
                                    <td>{{ $usuario->dependencia}}</td>
                                    <td>{{ $usuario->tipo->nombreti}}</td>

                					<td>
             						<a href="{{ route('usuario.edit',$usuario->id) }}" class="btn btn-info">editar</a></td>
                				</tr>
                			@endforeach
                		</tbody>
                	</table>
                	{!!$usuarios->render()!!}

 @endsection