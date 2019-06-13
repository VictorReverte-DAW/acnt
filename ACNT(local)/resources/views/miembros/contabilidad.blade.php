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
                <td class="fecha oculto">{{$cuotas[0]->fecha_pago}}</td>
                <td class="fechaPago">{{date("d-m-Y", strtotime($cuotas[0]->fecha_pago))}}</td>
                <td class="fechaSiguientePago"></td>
            @else
            <td class="fechaPago" >No se ha realizado ningun pago</td>
            <td class="fechaSiguientePago">{{$fecha}}</td>
           
            @endif
            <td><button class="pagar" onclick="pago({{$user->id}});actualizarFechaCuota()" >Pago</button></td>
         </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection