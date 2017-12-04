<!DOCTYPE html>
<html>

<head>
	<title>Acta de eventos Alcaldia de Agua de Dios</title>
		<table align="center" width="500" border="0">
  <tbody>
    <tr>
    	<td align="CENTER"><img src="imagenes/escudo.png" width="80" ></img></td>
      <td><p align="CENTER">REPUBLICA DE COLOMBIA<BR>DEPARTAMENTO DE CUNDINAMARCA<BR>MUNICIPIO DE AGUA DE DIOS <BR>ALCALDIA MUNICIPAL <BR>NIT 890680149-4 <br> CODIGO POSTAL 252850 
      </p></td>
      <td align="center"><img src="imagenes/Colombia.png" width="90" "></img></td>
      
  </tbody>

</table>
</head>
<body  bgcolor=#F2F2F2>

<h5>Agua de Dios cundinamarca ,<?= date('F j, Y, g:i a');?></h5>
<table align="center" width="500" border="0">
  <tbody>
    <tr>
      <td>ACTA DE EVENTO N°{{$evento->ideventos}} </td>
      <td></td>
    </tr>
    <tr>
      <td>FECHA DEL EVENTO</td>
      <td>{{$evento->fecha}}</td>
    </tr>
    <tr>
      <td>LUGAR DEL EVENTO</td>
      <td>{{$evento->lugar}}</td>
    </tr>
    <tr>
      <td>ASUNTO DEL EVENTO</td>
      <td>{{$evento->nombre_eve}}</td>
    </tr>
    <tr>
      <td>DESCRIPCION DEL EVENTO</td>
      <td>{{$evento->tematica->descripcion}}</td>
    </tr>
   </tbody>
  </table>
  
  
     
    <H4>ASISTENTES AL EVENTO</H4>
    <h5>En este evento se conto con la asistencia de los siguientes participantes</h5>
      <table width="500" border="2">
       <tr>
      <td>NOMBRE DEL PARTICIPANTE</td>
      <td>ESTADO DEL PARTICIPANTE</td>
    </tr>
    <tbody>
        @foreach($evento->eventosHasParticipantes as $evepart)
            <tr>
                <td>{{$evepart->participante->nombrepa}}</td>
                <td>{{$evepart->estado->estado}}</td>
            </tr>
           @endforeach
  </tbody>
</table>


	
</body>
<footer >
  <table align="center" width="500" border="0">
  <tbody>
    <tr>
      <td><img src="imagenes/alcaldia.png" width="90" ></img></td>
      <td align="right">Calle 13 Nº 8 - 36 Palacio Municipal - Primer Piso<br>
Teléfono: 834 5110<br>E- mail: alcaldia@aguadedios-cundinamarca.gov.co
</td>
    </tr>
    </tbody>
</table>
</footer>
<style type="text/css">
	

footer {
  background-color: none;
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 150px;
  color: black;
}

body {
	background-color: #FFFFFF;
	background-image: url(public/imagenes/Colombia.png);
	background-position: left;
	background-repeat: no-repeat;
	background-attachment:fixed;}
	</style>
	</html>
