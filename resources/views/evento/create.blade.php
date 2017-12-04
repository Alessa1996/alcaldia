@extends('layouts.app')
@section('content')
@if(count($errors))
<div class="alert alert-danger">
    <ul>
       @foreach ($errors->all() as $error)
           <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<input type="hidden" name="_token" value="{{ csrf_token() }}">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
 <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Eventos Alcaldia de Agua de Dios </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                                                              
                       {!! Form::open(['route'=>'evento.store','files'=>true,'method'=>'POST'])!!}
                        <div class="form-group  col-md-6 col-sm-12">
                              <label for="fecha">Fecha </label>
                              <input type="date" name="fecha" id="fecha" value="" class="form-control">
                            </div>
                        <div class="form-group  col-md-6 col-sm-12">
                            {!! Form::label('lugar','Lugar')!!}
                            {!! Form::text('lugar',null,['class'=>'form-control','placeholder'=>'Lugar del evento','required'])!!}
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                              <label for="hora">Hora </label>
                              <input type="time" name="hora" id="hora" value="" class="form-control">
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                             {!! Form::label('nombre_eve','Nombre')!!}
                             {!! Form::text('nombre_eve',null,['class'=>'form-control','placeholder'=>'Nombres del evento','required'])!!}
                        </div>
                        <div class="form-group  col-md-6 col-sm-12">
                            {!! Form::label('responsable','Reponsable')!!}
                            {!! Form::text('responsable',null,['class'=>'form-control','placeholder'=>'Responsable del evento','required'])!!}
                        </div>
                        <div class="form-group  col-md-6 col-sm-12">
                            {!! Form::label('tematica_idtematica','Tematica')!!}
                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#tema">tematica</button>
                            {!! Form::Select('tematica_idtematica',$tematica,null,['class'=>'form-control','placeholder'=>'selecione un opcion','required'])!!}
                        </div>
                        <div class="form-group  col-md-6 col-sm-12">
                            {!! Form::label('programacion','Programacion')!!}
                            {!! Form::file('programacion')!!}
                        </div>
                        <div class="form-group  col-md-6 col-sm-12">
                            {!! Form::label('listadechequeo_idlista','Lista de chequeo')!!}
                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#chequeoModal">lista</button>
                            {!!Form::Select('listadechequeo_idlista',$lista,null,['class'=>'form-control','placeholder'=>'selecione un opcion','required'])!!}
                        </div>
                              <div class="form-group">
                                {!! Form::label('','agregar un nuevo elemento')!!}
                                <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#par">participantes</button>                   
                                <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#item">items</button>
                                 <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#listaitem">items lista</button>
                                 <button id="partici" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#evepart">participantes evento</button>
                            </div> 
                            
                              
                        <div class="form-group col-md-6 col-sm-12 text-center">
                             <center> {!! Form::submit('Registrar',['class'=>'boton regist btn btn-control'])!!}</center>
                             {!! Form::close() !!}
                    
          </div>
        </div>
    </div>
</div>



     <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Mostrar participantes</div>
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
                            <th>participantes</th>
                            <th>reporte</th>
                        </thead>
                        <tbody>
                            @foreach ($evento as $key=> $eventos)
                                    <tr>
                                    <td>{{ $eventos->ideventos}}</td>
                                    <td>{{ $eventos->fecha}}</td>
                                    <td>{{ $eventos->lugar}}</td>
                                    <td>{{ $eventos->hora}}</td>
                                    <td>{{ $eventos->nombre_eve}}</td>
                                    <td>{{ $eventos->responsable}}</td>
                                    <td>{{ $eventos->tematica->tematica}}</td>
                                    <td>{{ $eventos->tematica->descripcion}}</td>
                                    <td><a href="public/{{$eventos->programacion}}"" target="_blank"><i class="fa fa-file-archive-o" ></i></a></td>
                                    <td>{{ $eventos->listadechequeo_idlista}}</td>
                                    <td> <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="{{'#participantes'.$key}}">participantes</button></td>
                                    <td><a href="{{ route('pdf.show',$eventos->ideventos) }} " target="_blank" class="btn btn-info btn-xs">ver </a></td></td>
                                </tr>
   
                            @endforeach
                        </tbody>
                        </table>
                    
                         

</div>
</div>



<!-- Modal -->

</div> 
@foreach ($evento->all() as $key=> $evento)

 <div id="{{'participantes'.$key}}" class="modal fade" role="dialog">
            <div class="modal-dialog" >
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">participantes del evento</h4>
                    </div>
                    <div class="modal-body">
                         <table class="table table-striped">
                        <thead>
                            <th>evento</th>
                            <th>participantes</th>
                            <th>estado</th>
                        </thead>
                        <tbody>
                            @foreach($evento->eventosHasParticipantes as $evepart)

                            <tr>
                                <td>{{$evepart->eventos_ideventos}}</td>
                                <td>{{$evepart->participante->nombrepa}} </td>
                                <td>{{$evepart->estado->estado}}</td>
                            </tr>
                           @endforeach
                        </tbody>
                        </table>
                        
                    </div>
                    <div class="modal-footer">
                        <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                    </div>
                </div>

            </div>
        </div>

@endforeach
<div id="evepart" class="modal fade" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Asistentes al evento</h4>
                    </div>
                    <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Crear participantes del evento</div>
                                                <div class="panel-body">
                                                    {!! Form::open(['route'=>'evenpart.store','method'=>'POST','id'=>'evepartform','name'=>'evenpartform'])!!}
                                                      <div class="form-group  col-md-12 ">
                                                            {!! Form::label('eventos_ideventos','Evento')!!}
                                                            {!!Form::Select('eventos_ideventos',$event,null,['class'=>'form-control','placeholder'=>'selecione un opcion','required'])!!}
                                                        </div>
                                                         <div class="form-group  col-md-12">
                                                            {!! Form::label('participantes_idparticipantes','Participantes')!!}
                                                            {!!Form::Select('participantes_idparticipantes',$participante,null,['class'=>'form-control','placeholder'=>'selecione un opcion','required'])!!}
                                                        </div>
                                                        <div class="form-group  col-md-12 ">
                                                            {!! Form::label('estado','Estado')!!}
                                                             {!!Form::Select('estado_idestado',$estado,null,['class'=>'form-control','placeholder'=>'selecione un opcion','required'])!!}
                                                    </div>

                                                   
                                                    <div class="form-group">
                                                    {!! Form::submit('Registrar',['class'=>'boton eveparb btn btn-control'])!!}
                                                    
                                                    {!! Form::close() !!}
                                                    </div>
                                             </div>
                                        </div>
                                        </div>
                            </div>
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
                                              
                                               $("#evepart").modal("hide");
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
                    <div class="modal-footer">
                        <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                    </div>
                </div>

            </div>
        </div>

<div id="chequeoModal" class="modal fade" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Listas de chequeo</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Crear Lista de chequeo</div>
                                    <div class="panel-body">
                                        {!! Form::open(['route'=>'lista.store','method'=>'POST','id'=>'listaform','name'=>'listaform'])!!}
                                        <div class="form-group">
                                            {!! Form::label('nombre','Nombre')!!}
                                            {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombres de la lista de chequeo','required','id'=>"nombre"])!!}
                                                            
                                        </div class="form-group">
                                        {!! Form::submit('Registrar',['class'=>'boton lista btn btn-control'])!!}
                                        
                                        {!! Form::close() !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                              $("#listaform").on("submit",function(){
                                    form = $("#listaform").serialize();

                                    $.ajax({
                                        url: "{!! route('lista.store');!!}",
                                        method: "post",
                                        data: form,
                                        success: function(data){

                                            console.log(data);
                                            if (data["mensaje"] == "Success") {
                                               $("#listadechequeo_idlista").prepend("<option value='"+data['lista']['idlista']+"'>"+data['lista']['nombre']+"</option>")
                                               $("#nombre").val("");
                                               $("#chequeoModal").modal("hide");
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
                    <div class="modal-footer">
                        <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                    </div>
                </div>

            </div>
        </div>
<div id="tema" class="modal fade" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tematicas de los eventos</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Crear tematica del evento</div>
                                    <div class="panel-body">
                                        {!! Form::open(['route'=>'tematica.store','method'=>'POST','id'=>'temaform','name'=>'temaform'])!!}
                                        <div class="form-group">
                                            {!! Form::label('tematica','Tematica')!!}
                                            {!! Form::text('tematica',null,['class'=>'form-control','placeholder'=>'Nombres de la tematica del evento','required','id'=>"tema"])!!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('descripcion','Descripcion')!!}
                                            {!! Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Descripcion  del evento','required','id'=>"descri"])!!}
                                                            
                                        </div class="form-group">
                                        {!! Form::submit('Registrar',['class'=>'boton lista btn btn-control'])!!}
                                        
                                        {!! Form::close() !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                              $("#temaform").on("submit",function(){
                                    form = $("#temaform").serialize();

                                    $.ajax({
                                        url: "{!! route('tematica.store');!!}",
                                        method: "post",
                                        data: form,
                                        success: function(data){

                                            console.log(data);
                                            if (data["mensaje"] == "Success") {
                                               $("#tematica_idtematica").prepend("<option value='"+data['tematica']['idtematica']+"'>"+data['tematica']['tematica']+"</option>")
                                               $("#tematica").val("");
                                               $("#tema").modal("hide");
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
                    <div class="modal-footer">
                        <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                    </div>
                </div>

            </div>
        </div>
<div id="item" class="modal fade" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Items de los eventos</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Crear items</div>
                                        <div class="panel-body">
                                            {!! Form::open(['route'=>'item.store','method'=>'POST','id'=>'itemform','name'=>'itemform'])!!}
                                            <div class="form-group">
                                                {!! Form::label('item','Item')!!}
                                                {!! Form::text('item',null,['class'=>'form-control','placeholder'=>'Nombres del item a utilizar','required'])!!}
                                                                
                                            </div class="form-group">
                                            {!! Form::submit('Registrar',['class'=>'btn btn-control'])!!}
                                            {!! Form::close() !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                              $("#itemform").on("submit",function(){
                                    form = $("#itemform").serialize();

                                    $.ajax({
                                        url: "{!! route('item.store');!!}",
                                        method: "post",
                                        data: form,
                                        success: function(data){

                                            console.log(data);
                                            if (data["mensaje"] == "Success") {
                                                $("#item").val("");
                                               $("#item").modal("hide");
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
                    <div class="modal-footer">
                        <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                    </div>
                </div>

            </div>
        </div>

<div id="listaitem" class="modal fade" role="dialog">
            <div class="modal-dialog" >
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Items de la lista de chequeo</h4>
                    </div>
                    <div class="modal-body">
                          <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Crear Lista de chequeo con items</div>
                                            <div class="panel-body">
                                                {!! Form::open(['route'=>'listait.store','method'=>'POST','id'=>'lisitform','name'=>'lisitform'])!!}
                                                  <div class="form-group  col-md-6 col-sm-12">
                                                        {!! Form::label('listadechequeo_idlista','Lista de chequeo')!!}
                                                        {!!Form::Select('listadechequeo_idlista',$listait,null,['class'=>'form-control','placeholder'=>'selecione un opcion','required'])!!}
                                                    </div>
                                                     <div class="form-group  col-md-6 col-sm-12">
                                                        {!! Form::label('item_iditem','Items')!!}
                                                        {!!Form::Select('item_iditem',$item,null,['class'=>'form-control','placeholder'=>'selecione un opcion','required'])!!}
                                                    </div>
                                                <div class="form-group">
                                                    {!! Form::label('cantidad','Cantidad')!!}
                                                    {!! Form::text('cantidad',null,['class'=>'form-control','placeholder'=>'Cantidad de items de la lista de chequeo','required','id'=>"cantidad"])!!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('responsable','Responsable')!!}
                                                    {!! Form::text('responsable',null,['class'=>'form-control','placeholder'=>'Responsable del item','required','id'=>"respon"])!!}
                                                </div>              
                                                <div class="form-group">
                                                {!! Form::submit('Registrar',['class'=>'boton itemli btn btn-control'])!!}
                                                
                                                {!! Form::close() !!}
                                                </div>
                                         </div>
                                    </div>
                                    </div>
                        </div>
                       <script type="text/javascript">
                              $("#lisitform").on("submit",function(){
                                    form = $("#lisitform").serialize();

                                    $.ajax({
                                        url: "{!! route('listait.store');!!}",
                                        method: "post",
                                        data: form,
                                        success: function(data){

                                            console.log(data);
                                            if (data["mensaje"] == "Success") {
                                               $("#listaitem").modal("hide");
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
                    <div class="modal-footer">
                        <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                    </div>
                </div>

            </div>
        </div>
        
<div id="par" class="modal fade" role="dialog">
            <div class="modal-dialog" style="width: 1500px" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">crear participante</h4>
                    </div>
                    <div class="modal-body">
                       
                       <div class="row">
                           <div class="col-md-6 col-xs-6">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">Crear participantes</div>
                                                <div class="panel-body">
                                                    {!! Form::open(['route'=>'participantes.store','method'=>'POST','id'=>'parform','name'=>'parform'])!!}
                                                    <div class="form-group">
                                                        {!! Form::label('nombrepa','Nombre')!!}
                                                        {!! Form::text('nombrepa',null,['class'=>'form-control','placeholder'=>'Nombres completos','required'])!!}
                                                    </div>
                                                   
                                                    <div class="form-group">
                                                        {!! Form::label('telefono','Telefono')!!}
                                                        {!! Form::text('telefono',null,['class'=>'form-control','placeholder'=>'#########','required'])!!}
                                                    </div>
                                                    <div class="form-group">
                                                        {!! Form::label('cedula','Cedula')!!}
                                                        {!! Form::text('cedula',null,['class'=>'form-control','placeholder'=>'100000000','required'])!!}
                                                    </div class="form-group">
                                                    {!! Form::submit('Registrar',['class'=>'boton parti btn btn-control'])!!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                              <script type="text/javascript">
                              $("#parform").on("submit",function(){
                                    form = $("#parform").serialize();

                                    $.ajax({
                                        url: "{!! route('participantes.store');!!}",
                                        method: "post",
                                        data: form,
                                        success: function(data){

                                            console.log(data);
                                            if (data["mensaje"] == "Success") {
                                               $("#participantes_idparticipantes").prepend("<option value='"+data['participante']['idparticipantes']+"'>"+data['participante']['nombre']+"</option>")
                                               $("#nombrepa").val("");
                                               $("#par").modal("hide");
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
                    <div class="modal-footer">
                        <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                    </div>
                </div>

            </div>
        </div>

@endsection

           