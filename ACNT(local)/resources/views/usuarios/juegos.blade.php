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
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#juego">
Añadir juego
</button>
<div class="row">
@foreach($juegos as $juego)
    <div class="card card-juegos" style="width: 18rem;">
        <img src="img/imagenesJuegos/{{$juego->imagen}}" alt="{{$juego->nombre}}" class="juego">
    <ul id="infoJuego" class="list-group list-group-flush">
    <div class="id" style="display:none">{{$juego->id}}</div>
        <li class="card-body list-group-item">
            <h5 class="card-title">{{$juego->nombre}}</h5>
        </li>
        <li class="list-group-item">{{$juego->descripcion}}</li>
        <li class="list-group-item">{{$juego->plataforma}}</li>
        <li class="list-group-item">
            <a href="{{url('borrarJuego/')}}/{{$juego->id}}" class="btn btn-primary">Borrar</a>
            <a a href='#' data-toggle="modal" data-target="#Editjuego" class="btn btn-primary Editjuego">Editar</a>
        </li>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#torneo">Crear torneo</button>
    </ul>
    </div>
@endforeach
</div>
<div class="modal fade" id="juego" tabindex="-1" role="dialog" aria-labelledby="juego" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="juegoModal">Añadir juego</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
         
                <form class="juegoForm" action="añadirJuego/" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="form-group row">
                    <label for="Nombre"
                            class="col-md-4 col-form-label text-md-right">Nombre</label>
                        <div class="col-md-6">
                            <input type="text" name="nombre" id="nombre" required>
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="Plataforma"
                            class="col-md-4 col-form-label text-md-right">Plataforma</label>
                        <div class="col-md-6">
                            <select name="plataforma" id="plataforma">
                                <option value="PC">PC</option>
                                <option value="Switch">Switch</option>
                                <option value="PS4">PS4</option>
                                <option value="Xbox One">Xbox One</option>
                                <option value="Movil">Movil</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row imagenes">
                    <label for="Imagen"
                            class="col-md-4 col-form-label text-md-right">Imagen</label>
                        <div class="col-md-6">
                            <input type="file" name="imagen" id="imagen" accept="image/*">
                        </div>
                    </div> 
                    <div class="form-group row">
                    <label for="Descripcion"
                            class="col-md-4 col-form-label text-md-right">Descripcion</label>
                        <div class="col-md-6">
                            <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button id="añadirJuego" type="submit" class="btn btn-primary añadirJuego">
                                {{ __('Añadir') }}
                            </button>
                        </div>
                    </div>
                </form>
              
            </div>
        </div>
    </div>
</div>
</div>
@if (!$juegos->isEmpty())
<div class="modal fade" id="torneo" tabindex="-1" role="dialog" aria-labelledby="torneo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="torneoModal">Crear un torneo de {{$juego->nombre}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="torneoForm" id="torneoForm" action="crearTorneo/" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group row">
                       <input type="hidden" name="id_juego" id="id_juego" value="{{$juego->id}}">
                       <input type="hidden" name="estado" id="estado" value="activo">
                    </div>
                    <div class="form-group row">
                    <label for="Nombre"
                            class="col-md-4 col-form-label text-md-right">Nombre del torneo</label>
                        <div class="col-md-6">
                            <input type="text" name="nombre" id="nombre" required value="{{$juego->nombre}}">
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="Max_jugadores"
                            class="col-md-4 col-form-label text-md-right">Maximo de jugadores</label>
                        <div class="col-md-6">
                            <input type="number" name="max_jugadores" id="max_jugadores" min="2">
                        </div>
                    </div> 
                    <div class="form-group row">
                    <label for="imagenTorneo"
                            class="col-md-4 col-form-label text-md-right">ImagenTorneo</label>
                        <div class="col-md-6">
                            <input type="file" name="ImagenTorneo" id="ImagenTorneo" accept="image/*">
                        </div>
                    </div> 
                    <div class="form-group row">
                    <label for=""class="col-md-4 col-form-label text-md-right">Fecha del torneo</label>
                        <div class="col-md-6">
                            <input type="date" name="fecha" id="fecha" min="{{obtenerFecha()}}">
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for=""class="col-md-4 col-form-label text-md-right">Hora del torneo</label>
                        <div class="col-md-6">
                            <input type="time" name="hora" id="hora">
                        </div>
                    </div> 
                    </div>
                    <div class="form-group row">
                    <label for="Gratis"
                            class="col-md-4 col-form-label text-md-right">¿Es Gratis?</label>
                        <input type="hidden" name="gratis" id="gratis">
                        <div class="col-md-6"><input type="checkbox" name="gratis_check" id="gratis_check" value="0"></div>
                    </div>
                    <div class="form-group row precio" >
                    <label for="Precio"
                            class="col-md-4 col-form-label text-md-right">Precio de la inscripcion</label>
                        <div class="col-md-6">
                            <input type="number" name="precio" id="precio" min="1">
                        </div>
                    </div> 
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button id="crear_torneo" class="btn btn-primary crear_torneo">
                                {{ __('Crear Torneo') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
@extends('layouts.modal.modalEditarJuego')
</div>
@endsection