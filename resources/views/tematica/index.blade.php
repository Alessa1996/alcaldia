@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mostrar tematica</div>
                <div class="panel-body">
                   	<table class="table table-striped">
                		<thead>
                			<th>Id</th>
                			<th>Tematica</th>
                			<th>Descripcion</th>
                  		</thead>
                		<tbody>
                			@foreach ($tematicas as $tematica)
                				<tr>
                					<td>{{ $tematica->idtematica}}</td>
                					<td>{{ $tematica->tematica}}</td>
                					<td>{{ $tematica->descripcion}}</td>
                					<td>
        						<a href="{{ route('tematica.edit',$tematica->idtematica) }}" class="btn btn-info">editar</a></td>
                				</tr>
                			@endforeach
                		</tbody>
                	</table>
                	{!!$tematicas->render()!!}

 @endsection