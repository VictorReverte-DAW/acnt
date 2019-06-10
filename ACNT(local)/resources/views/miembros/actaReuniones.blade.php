@extends('layouts.app')
@section('content')
<?php
$users = DB::table('users')->get();
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
$fecha =$dia ."-".$mes."-".$hoy['year'];

return $fecha;
}
$asistentes = DB::select('select name from users,asistentes where users.id=id_Usuario');
?>
<div id="acta">
    <h1 style="text-align: center;" contenteditable="true">Acta de la reunión {{obtenerFecha()}} </h1>
    <h2>Asistentes a la reunion</h2>
    <ul class="asistentes">
    @foreach($asistentes as $asistente)
        <li contenteditable="true">{{$asistente->name}}</li> 
    @endforeach
    </ul>
    <br>
    <br>
    <div class="puntos">
        <div class="punto">
            <h3 class="titulo">Punto 1<button class="Eliminar">-</button></h3>
            <div contenteditable="true" style="width: 50%;">
                <p>Escribir punto de la reunión<p>
            </div>
        </div>
    </div>
    <button class="Añadir">+</button>
</div>
<button name="guardar" class="guardar" onclick="generarPDF()">Guardar</button>
@endsection