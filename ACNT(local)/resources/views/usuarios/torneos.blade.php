<?php
use Illuminate\Support\Facades\Auth;

$totalParticipantes = DB::select("SELECT t.id,count(p.Id_Torneo) as total
FROM torneos t
LEFT JOIN participantes p
            ON p.Id_Torneo = t.id  group by t.id");

$id_torneo = DB::select('Select id from torneos');

?>
@extends('layouts.app')
@section('content')
<a href="{{url('Juegos/')}}" class="btn btn-primary">
    Crear Torneo
</a>
<div class="row">
{{ csrf_field() }}
@foreach($torneos as $key=>$torneo)
<?php
    $participante = DB::table('participantes')->where('id_Usuario',"=",Auth::user()->id)->first();
    $id_participantes = DB::table('participantes')
    ->select('id_Usuario')
    ->where('id_Usuario', '=', Auth::user()->id)
    ->where("Id_Torneo","=",$id_torneo[$key]->id)
    ->get();
    $id_tabla_participantes = DB::table('participantes')
    ->select('id')
    ->where('id_Usuario', '=', Auth::user()->id)
    ->where("Id_Torneo","=",$id_torneo[$key]->id)
    ->get();
    $id_Usuario=0;
    $id=0;
    foreach ($id_participantes as $id_participante) {
        $id_Usuario= $id_participante->id_Usuario;
    } 
    foreach ($id_tabla_participantes as $id_tabla) {
        $id_Usuario= $id_participante->id_Usuario;
        $id= $id_tabla->id;
    }
    ?>
<div class="card card-juegos" style="width: 18rem;">
        <img src="img/imagenesTorneos/{{$torneo->imagen}}" alt="{{$torneo->nombre}}" class="juego">
    <ul class="list-group list-group-flush torneo{{$torneo->id}}">
    <div class="id" style="display:none">{{$torneo->id}}</div>
    <li  class="list-group-item">
        <div class="card-body">
            <h5 class="card-title">{{$torneo->nombre}}</h5>
        </div>
    </li>
    <li class="list-group-item">participantes: <label class="num_inscrito" id="{{$torneo->id}}">{{$totalParticipantes[$key]->total}}</label>/<label id="num_max{{$torneo->id}}">{{$torneo->max_jugadores}}</label></li>

    @if($torneo->gratis==1)
        <li class="list-group-item">Gratis</li>
    @else
    <li class="list-group-item">{{$torneo->precio}}€</li>
    @endif
    <li class="list-group-item">Estado: {{$torneo->estado}}</li>
    @if($torneo->estado=="finalizada" && !is_null($participante))
    <li class="list-group-item">
        <p>Comentario</p>
        <p><textarea class="comentario"></textarea></p>
        <select class="puntuacion">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
        <p><button class="btn btn-primary EnviarComentario" onclick=escribirComentario({{$torneo->id}})>Enviar</button></p>
    </li>
    @endif
    <li class="list-group-item">
        <a href="{{url('borrarTorneo/')}}/{{$torneo->id}}" class="btn btn-primary">Borrar</a>
        <a href='#' data-toggle="modal" data-target="#EditTorneo" class="btn btn-primary EditTorneo">Editar</a>
        @if($torneo->estado=="activo")
        <a href="{{url('terminarTorneo/')}}/{{$torneo->id}}" class="btn btn-primary">Terminar</a>
        @endif
    </li>
   
    @if($totalParticipantes[$key]->total>=$torneo->max_jugadores)
    <label>Numero maximo ocupado</label>
    @else
    @if($torneo->id!==$id_torneo[$key]->id || Auth::user()->id!==$id_Usuario)
    <button class="btn btn-primary inscripcion"  id="inscripcion{{$torneo->id}}" onclick="Torneo({{$torneo->id}},{{$id}})">
    Inscribirse.
    </button>
    @else
    <li class="list-group-item">
    <button class="btn btn-primary describirse"  id="describirse{{$torneo->id}}" onclick="Torneo({{$torneo->id}},{{$id}})">
    Eliminar Suscripcion
    </button>
    </li>
    @endif
    @endif

    </div>
    </ul>
@endforeach
@extends('layouts.modal.modalEditarTorneo')
</div>
@endsection