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
    <h2 style="text-align: center;margin-top: 7%;color:white" contenteditable="true" >Acta de la reunión {{obtenerFecha()}} </h2>
    <h2 class="text-white">Asistentes a la reunion</h2>
    <ul class="asistentes">
    @foreach($asistentes as $asistente)
        <li contenteditable="true" class="text-white">{{$asistente->name}}</li> 
    @endforeach
    </ul>
    <br>
    <br>
    <div class="puntos">
        <div class="punto">
            <div contenteditable="true" style="width: 50%;">
            </div>
        </div>
    </div>
    <button class="Añadir">+</button>
</div>
<button name="guardar" class="guardar" onclick="generarPDF()">Guardar</button>
        <!--Plantilla-->
        <script src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
    <script src="{{ asset('js/plantilla/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('js/plantilla/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/plantilla/jquery.sticky-sidebar.min.js') }}"></script>
    <script src="{{ asset('js/plantilla/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/plantilla/main.js') }}"></script>
@endsection