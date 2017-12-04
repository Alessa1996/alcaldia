@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mostrar listas de chequeo</div>
                <div class="panel-body">
                	<table class="table table-striped">
                		<thead>
                			<th>Lista de chequeo</th>
                			<th>Item</th>
                            <th>Cantidad</th>
                            <th>Responsable</th>

                 		</thead>
                		<tbody>
                			@foreach ($listas as $lista)
                				<tr>
                					<td>{{ $lista->listadechequeo->nombre}}</td>
                					<td>{{ $lista->items->item}}</td>
                                    <td>{{ $lista->cantidad}}</td>
                                    <td>{{ $lista->responsable}}</td>
         					
                					<td>
                						
                						<a href="{{ route('listait.edit',$lista->idlistait) }}" class="btn btn-info">editar</a></td>
                				</tr>
                			@endforeach
                		</tbody>
                	</table>
                	{!!$listas->render()!!}

 @endsection