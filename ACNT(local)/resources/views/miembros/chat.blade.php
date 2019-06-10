<?php
session_start();
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Asistente;
$id_reunion= DB::select('Select id from reunions');
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
if(!isset($_SESSION['usuarios'])){
	    $_SESSION['usuarios']=array();
}else{

    $_SESSION['usuarios'].push(Auth::user()->name);
}
?>
@extends('layouts.app')
@section('content')
<?php foreach ($_SESSION['usuarios'] as $key => $value): ?>
	<p><?php $value ?></p>;
<?php endforeach ?>
@endsection