@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mostrar items</div>
                <div class="panel-body">
                	<a href="{{route('item.create')}}" class="btn btn-success btn-sm">Registrar un nuevo item</a><hr>
                	<table class="table table-striped">
                		<thead>
                			<th>Id</th>
                			<th>Item</th>
                 		</thead>
                		<tbody>
                			@foreach ($items as $item)
                				<tr>
                					<td>{{ $item->iditem}}</td>
                					<td>{{ $item->item}}</td>
                					
                					<td>
                						<a href="{{ route('item.destroy',$item->iditem) }}" onclick=" return confirm ('¿estas seguro que quieres eliminar este dato?')" class="btn btn-danger">eliminar</a>
                						<a href="{{ route('item.edit',$item->iditem) }}" class="btn btn-info">editar</a></td>
                				</tr>
                			@endforeach
                		</tbody>
                	</table>
                	{!!$items->render()!!}

 @endsection