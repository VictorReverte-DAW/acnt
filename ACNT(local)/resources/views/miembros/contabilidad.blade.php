<?php
use Illuminate\Support\Facades\DB;
$users = DB::table('users')->where('esMiembro','1')->get();


    $hoy = getdate();
    $mes=$hoy['mon'];
    $dia=$hoy['mday'];
    if($mes<10){
        $mes="0".$hoy['mon'];
    }else{
        $mes=$hoy['mon'];
    }
    if($dia<10){
        $dia="0".$hoy['mday'];
    }else{
        $dia=$hoy['mday'];
    }
    $fecha=$dia."-".$mes."-".$hoy['year'];
    $fechaMesDia = $dia."-".$mes;

?>
@extends('layouts.app')

@section('content')

<table class="table table-hover">
{{csrf_field()}}
{{method_field("PUT")}}
    <thead>
        <tr>
            <th scope="col">Miembro</th>
            <th scope="col">Meses a pagar</th>
            <th scope="col">Fecha pago efectuado</th>
            <th scope="col">Ultima mes pagado</th>
            <th scope="col">Fecha proximo pago</th>
        </tr>
    </thead>
    <tbody >
        @foreach($users as $key=>$user)
        <?php 
        $cuotas = DB::table('cuotas')->where('id_Usuario',$user->id)->get();
        ?>
        <tr>
            <td class="nombre">{{$user->name}}</td>
            <td class="mes">
                <input type="number" min="1"  onclick="actualizarFechaCuota()" value=1>
            </td>
            @if(count($cuotas)>0)
                <td class="fecha oculto">{{$cuotas[0]->mes_pagados}}</td>
                <td class="efectua">{{$fecha}}</td>
                <td class="fechaPago">{{date("d-m-Y", strtotime($cuotas[0]->mes_pagados))}}</td>
                <td class="fechaSiguientePago"></td>
                @if(date("Y", strtotime($cuotas[0]->mes_pagados))>$hoy['year'])
                        <td><img src="img/icons/checked.svg" alt="checked"></td>
                @elseif(date("Y", strtotime($cuotas[0]->mes_pagados))==$hoy['year'])
                    @if(date("d-m-Y", strtotime($cuotas[0]->mes_pagados))>=$fecha)
                            <td><img src="img/icons/checked.svg" alt="checked"></td>
                        @else
                            <td><img src="img/icons/cancel.svg" alt="checked"></td>
                        @endif
                @elseif(date("Y", strtotime($cuotas[0]->mes_pagados))<$hoy['year'])
                            <td><img src="img/icons/cancel.svg" alt="checked"></td>
                @endif
            @else
            <td class="efectua oculto" ></td>
            <td class="fechaPago" >{{$fecha}}</td>
            <td>No se ha pagado ningun mes</td>
            <td class="fechaSiguientePago">{{$fecha}}</td>
            <td><img src="img/icons/cancel.svg" alt="checked"></td>
        
            @endif
            <td><button class="pagar" onclick="pago({{$user->id}});actualizarFechaCuota()" >Pago</button></td>
         </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection