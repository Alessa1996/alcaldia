@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mostrar tematica</div>
                <div class="panel-body">
                	<a href="{{route('estado.create')}}" class="btn btn-success btn-sm">Registrar una nuevo estado</a><hr>
                	<table class="table table-striped">
                		<thead>
                			<th>Id</th>
                			<th>estado</th>
                			
                  		</thead>
                		<tbody>
                			@foreach ($estados as $estado)
                				<tr>
                					<td>{{ $estado->idestado}}</td>
                					<td>{{ $estado->estado}}</td>
                					
                					<td>
                 						<a href="{{ route('estado.edit',$estado->idestado) }}" class="btn btn-info">editar</a></td>
                				</tr>
                			@endforeach
                		</tbody>
                	</table>
                	{!!$estados->render()!!}

 @endsection