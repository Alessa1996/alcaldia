@extends('layouts.app')
@if (Auth::User()->tipo_idtipo =="1")

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
                            <th>Evento</th>
                            <th>Participante</th>
                            <th>Estado</th>
                        </thead>
                        <tbody>
                            @foreach ($evens as $even)                
                                    <tr>
                                    <td>{{ $even->idevenpa}}</td>
                                    <td>{{ $even->evento->nombre_eve}}</td>
                                    <td>{{ $even->participante->nombrepa }}</td>
                                    <td>{{ $even->estado->estado}}</td>
                                    <td>
                        <a href="{{ route('evenpart.edit',$even->idevenpa) }}" class="btn btn-info">editar</a></td>
                                </tr>
                         @endforeach
                        </tbody>
                    </table>
                    {!!$evens->render()!!}

 @endsection
 @endif
@if (Auth::User()->tipo_idtipo ="2")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mostrar participantes</div>
                <div class="panel-body">
                     <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#evento">Nuevo evento </button>
                 	<table class="table table-striped">
                		<thead>
                			<th>Id</th>
                			<th>Participante</th>
                			<th>Estado</th>
                   		</thead>
                		<tbody>
                			@foreach ($evens as $even)
                			   @if ($usuarios==$even->participante->nombrepa)
                                   <tr>
                                    <td>{{ $even->evento->nombre_eve}}</td>
                                    <td>{{ $even->participante->nombrepa }}</td>
                                    <td>{{ $even->estado->estado}}</td>
                                    <td>
                               
                						
                					<a href="{{ route('evenpart.edit',$even->eventos_ideventos) }}" class="btn btn-info">editar</a>
                                       
                                    </td>
                				</tr>
                                 @endif
                  			@endforeach
                		</tbody>
                	</table>
                	{!!$evens->render()!!}

<div id="evento" class="modal fade" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Eventos</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Eventos a asistir</div>
                                        <div class="panel-body">
                                            {!! Form::open(['route'=>'evenpart.store','method'=>'POST','id'=>'evepartform','name'=>'evenpartform'])!!}
                                              <div class="form-group  col-md-12 ">
                                                    {!! Form::label('eventos_ideventos','Evento')!!}
                                                     {!!Form::Select('eventos_ideventos',$evento,null,['class'=>'form-control','placeholder'=>'selecione un opcion','required'])!!}
                                                </div>
                                                 <div class="form-group  col-md-12">
                                                   {!!Form::Select('participantes_idparticipantes',$participantes,null,[ 'class'=>'form-control','placeholder'=>'selecione un opcion','required'])!!}
                                                   
                                                </div>
                                                <div class="form-group  col-md-12 ">
                                                    {!! Form::label('estado','Estado')!!}
                                                    {!!Form::Select('estado_idestado',$estado,null,[ 'class'=>'form-control','placeholder'=>'selecione un opcion','required'])!!}
                                            </div>

                                           
                                            <div class="form-group">
                                            {!! Form::submit('Registrar',['class'=>'boton eveparb btn btn-control'])!!}
                                            
                                            {!! Form::close() !!}
                                            </div>
                                     </div>
                                </div>
                                </div>
                    </div>
                     <script type="text/javascript">
                              $("#evepartform").on("submit",function(){
                                    form = $("#evepartform").serialize();

                                    $.ajax({
                                        url: "{!! route('evenpart.store');!!}",
                                        method: "post",
                                        data: form,
                                        success: function(data){

                                            console.log(data);
                                            if (data["mensaje"] == "Success") {
                                              
                                               $("#evento").modal("hide");
                                            }

                                           
                                            

                                        },
                                        error:function(data,responseText,jqXHRs){
                                            console.log(data["responseText"])

                                        }
                                    })

                                   return false; 
                                });
                             </script>

                </div>
                </div>
                
              
            <div class="modal-footer">
                <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
            </div>
        </div>

    </div>
    </div>
 @endsection
 @endif