<?php
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
?>
@extends('layouts.app')
@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CrearReunion">
  Crear Reunion
</button>

<!-- Modal -->
<div class="modal fade" id="CrearReunion" tabindex="-1" role="dialog" aria-labelledby="CrearReunionLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="CrearReunionLabel">Organizar reunion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="reunionForm" action="{{url('CrearReuniones/')}}">
                    <div class="form-group row">
                    <label for="Fecha"
                            class="col-md-4 col-form-label text-md-right">Fecha</label>
                        <div class="col-md-6">
                            <input type="date" name="fecha" id="fecha" min={{obtenerFecha()}} required>
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="Hora"
                            class="col-md-4 col-form-label text-md-right">Hora</label>
                        <div class="col-md-6">
                            <input type="time" name="hora" id="hora" required>
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="Asunto"
                            class="col-md-4 col-form-label text-md-right">Asunto de la reunion</label>
                        <div class="col-md-6">
                            <textarea name="asunto" id="asunto" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input type="hidden" name="estado" id="estado" value="activa">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button id="fechar" type="submit" class="btn btn-primary fechar">
                                {{ __('Fechar') }}
                            </button>
                        </div>
                    </div>
                </form>
      </div>
    </div>
  </div>
</div>
@if(!$reuniones->isEmpty())
<table class="table table-hover">
    {{csrf_field()}}
    {{method_field("PUT")}}
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">Estado</th>
            <th scope="col">fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">Detalles</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reuniones as $key=>$reunion)
            <tr>
            @if($reunion->estado==="activa")
                <td><a href='#' data-toggle="modal" data-target="#EditarReunionModal" class="EditarReunionModal"><i class="far fa-edit"></i></a></td>
               @else
               <td></td>
               @endif
                <td><a href="BorrarReuniones/{{$reunion->id}}"><i class="fas fa-trash-alt"></i></a></td>
                <td>{{$reunion->estado}}</td>
                <td><?php echo date("d-m-Y",strtotime($reunion->fecha))?></td>
                <td>{{$reunion->hora}}</td>
                <td>{{$reunion->asunto}}</td>
                <td id="id" style="display:none">{{$reunion->id}}</td>
                <td><input id="id_reunion" type="hidden" value="{{$reunion->id}}"/></td>
                <?php
                    $id_asistentes = DB::table('asistentes')
                    ->select('Id_Usuario')
                    ->where('Id_Usuario', '=', Auth::user()->id)
                    ->where('id_Reunion','=',$id_reunion[$key]->id)
                    ->get();
                    $id=0;
                    foreach ($id_asistentes as $id_asistente) {
                        $id= $id_asistente->Id_Usuario;
                    }
                ?>
                @if($reunion->estado==="activa")
                @if($reunion->id!==$id_reunion[$key]->id || Auth::user()->id!==$id)
               <td class="confirmacion"><button class="btn btn-primary asistir" id="asistir{{$reunion->id}}" onclick="AsistirReunion({{$reunion->id}})">
                                {{ __('Asistir') }}
                            </button></td>
                @else
                <td class="confirmacion"><img src="img/icons/checked.svg" alt="checked"></td>
                @endif
               <td><a href="{{url('acta')}}" class="btn btn-primary reunion">Empezar Reunion</a></td>
               <td><a href="terminarReunion/{{$reunion->id}}" class="btn btn-primary reunion">Terminar reunion</a></td>
               @endif
            </tr>
        @endforeach
    </tbody>
</table>
@else
<h4>No hay Reuniones Don´t Worry Be Happy.</h4>
@endif


@extends('layouts.modal.modalEditarReunion')
@endsection