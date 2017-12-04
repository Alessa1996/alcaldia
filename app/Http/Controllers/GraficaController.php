<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventosHasParticipantes;


class GraficaController extends Controller
{
     public function asistentes(){
        $tipo[]=['atendido','en proceso','no pertinente'];
        $ctp=count($tipo);
        $participantes=EventosHasParticipantes::all();
        $ct =count($participantes);
        
         for($i=0;$i<=$ct-1;$i++){
         $idTP=$participantes[$i]->estado;
         $numerodepubli[$idTP]++;
           
        }

        $data=array("totaltipos"=>$ctp,"tipos"=>$tipospublicacion, "numerodepubli"=>$numerodepubli);
        return json_encode($data);
    }
    //
}
