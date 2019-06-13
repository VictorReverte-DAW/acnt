<?php
use Illuminate\Support\Facades\Auth;
use App\User;
$users = DB::table('users')->get();
?>
@extends('layouts.app')
@section('content')
<div>Total de tareas<input type="number" min="1" name="numTareas" id="numTareas" value="1" onclick=añadirTareas()></div>
<ul class="tareas">
    <li contenteditable="true">Añadir tarea al torneo</li> 
</ul>
<table class="tareasTable">
<tbody>


@foreach($users as $key=> $user)
<?php
$usuario = DB::table('supervisores')->where('id_usuario','=',$user->id)->get();
$mensajes= DB::table('supervisores')->select('tarea')->where('id_usuario','=',$user->id)->get();
//$mensajes = json_decode($mensaje, JSON_PRETTY_PRINT);
?>
    <tr>
        @if(empty($usuario[$key]))
            <td class="oculto id_torneo">{{$id_torneo}}</td>
            <td class="oculto id">{{$user->id}}</td>
            <td class="nombre">{{$user->name}}</td>
            <td>
                <select class="asignada asignada{{$user->name}}" onclick=asignarTarea()></select>
            </td>
            <td><textarea class="texto"></textarea></td>
        @else
            <td>{{$user->name}}</td>
            <td><div>
                <?php foreach ($mensajes as $mensaje) {
                  $mensaje=json_decode(json_encode($mensaje),true);
                  echo $mensaje['tarea'];
                }?>
            </div></td>
        @endif
    </tr>
@endforeach
</tbody>
</table>

<button onclick="guardarTarea()">Terminar reparto</button>
@endsection