<?php
function obtenerFecha(){
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
    $fecha = $hoy['year']."-".$mes."-".$dia;
    
    return $fecha;
    }
?>
@extends('layouts.app')

@section('content')

<form action="">
    <label for="">Usuario</label>
    <input type="text" name="" id="">
    <label for="">Email</label>
    <input type="email" name="" id="">
    <label for="">Descripcion</label>
    <input type="text" name="" id="">
</form>

@endsection