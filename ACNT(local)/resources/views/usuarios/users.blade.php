<?php
use Illuminate\Support\Facades\DB;
$users = DB::table('users')->get();
?>
@extends('layouts.app')

@section('content')
<div style="overflow-x:auto;">
<table class="table table-dark table-hover table-sm" style="overflow-x:auto;">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col" class="oculto"></th>
            <th scope="col" class="oculto">dni</th>
            <th scope="col">nick</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Email</th>
            <th scope="col" class="oculto">Contraseña</th>
            <th scope="col">Provincia</th>
            <th scope="col">localidad</th>
            <th scope="col">Codigo postal</th>
            <th scope="col">telefono</th>
            <th scope="col">fnac</th>
            <th scope="col">Miembro</th>
            <th scope="col" class="checkRoles">Rol</th>
        </tr>
    </thead>
    <tbody>
        @forelse($users as $user)
        <tr>
            <td><a href='#' data-toggle="modal" data-target="#edit" class="editarUsu"><i class="far fa-edit"></i></a></td>
            <td><a href='/borrarUsuario/{{$user->id}}'><i class="fas fa-trash-alt"></i></a></td>
            <td class="oculto">{{$user->id}}</td>
            <td class="oculto">{{$user->dni}}</td>
            <td>{{$user->nick}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->apellido}}</td>
            <td>{{$user->email}}</td>
            <td class="oculto">{{$user->password}}</td>
            <td>{{$user->provincia}}</td>
            <td>{{$user->localidad}}</td>
            <td>{{$user->cp}}</td>
            <td>{{$user->telefono}}</td>
            <td>{{$user->fnac}}</td>
            <td class="oculto">{{$user->esMiembro}}</td>
            
            @if($user->esMiembro===0)
            <td>No es miembro</td>
            @else
            <td>Es miembro</td>
            @endif
            <td class="oculto">{{($user->id_rol)}}</td>
            @switch($user->id_rol)
                @case(1)
                    <td>Presidente</td>
                        @break
                @case(2)
                    <td>Vicepresidente</td>
                        @break   
                @case(3)
                     <td>Secretario</td>
                        @break  
                @case(4)
                    <td>Tesorero</td>
                        @break   
                @case(5)
                    <td>Portavoz</td>
                        @break
                @default
                    <td>Jugador</td>
            @endswitch
        </tr>
        
        @empty
        <li>No hay usuarios registrados.</li>
        @endforelse
    </tbody>
</table>
</div>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="editar">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input id="id" type="hidden"
                                name="id"
                                value="{{ $user->id }}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input id="dni" type="hidden"
                                class="form-control{{ $errors->has('dni') ? ' is-invalid' : '' }}" name="dni"
                                value="{{ $user->dni }}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Nick"
                            class="col-md-4 col-form-label text-md-right">{{ __('Nombre de usuario') }}</label>

                        <div class="col-md-6">
                            <input id="nick" type="text"
                                class="form-control{{ $errors->has('nick') ? ' is-invalid' : '' }}" name="nick"
                                value="{{ $user->nick }}" required autofocus >

                            @if ($errors->has('nick'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nick') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                value="{{ $user->name }}" required autofocus>

                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                        <div class="col-md-6">
                            <input id="apellido" type="text"
                                class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" name="apellido"
                                value="{{ $user->apellido }}" required autofocus>

                            @if ($errors->has('apellido'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('apellido') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email"
                            class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                value="{{ $user->email }}" required>

                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row oculto">
                        <label for="password"
                            class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="text"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                required value="{{ $user->password }}">

                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('Contraseña') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Provincia"
                            class="col-md-4 col-form-label text-md-right">{{ __('Provincia') }}</label>
                        <div class="col-md-6">
                            <input id="provincia" type="text" class="form-control" name="provincia" required value="{{ $user->provincia }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Localidad"
                            class="col-md-4 col-form-label text-md-right">{{ __('Localidad') }}</label>
                        <div class="col-md-6">
                            <input id="localidad" type="text" class="form-control" name="localidad" value="{{ $user->localidad }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Codigo Postal"
                            class="col-md-4 col-form-label text-md-right">{{ __('Codigo Postal') }}</label>
                        <div class="col-md-6">
                            <input id="cp" type="number" class="form-control" name="cp" required value="{{ $user->cp }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Telefono" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>
                        <div class="col-md-6">
                            <input id="telefono" type="number" class="form-control" name="telefono" minlength=9
                                maxlength=9 required value="{{ $user->telefono }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Fecha Nacimiento"
                            class="col-md-4 col-form-label text-md-right">{{ __('Fecha Nacimiento') }}</label>
                        <div class="col-md-6">
                            <input id="fnac" type="date" class="form-control" name="fnac" required value="{{ $user->fnac }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="esMiembro"
                                class="col-md-4 col-form-label text-md-right">{{ __('Marcar como miembro') }}
                        </label>
                        <div class="col-md-6">
                        <input id="esMiembro" type="hidden" name="esMiembro" value="{{ $user->esMiembro }}">
                        <input id="esMiembro_check" type="checkbox" name="esMiembro_check"></div>
                    </div>
                    <div class="form-group row">
                        <label for="rol" class="col-md-4 col-form-label text-md-right checkRol">{{ __('Rol') }}</label>
                        <div class="col-md-6">
                            <select id="rol" class="checkRol" name="rol">
                            @switch(Auth::user()->id_rol)
                                @case(1)
                                    <option value="1"selected>Presidente</option>
                                    <option value="2">Vicepresidente</option>
                                    <option value="3">Secretario</option>
                                    <option value="4">Tesorero</option>
                                    <option value="5">Portavoz</option>
                                    <option value="6">Jugador</option>
                                    @break

                                @case(2)
                                    <option value="1">Presidente</option>
                                    <option value="2" selected>Vicepresidente</option>
                                    <option value="3">Secretario</option>
                                    <option value="4">Tesorero</option>
                                    <option value="5">Portavoz</option>
                                    <option value="6">Jugador</option>
                                    @break   
                                    @case(3)
                                    <option value="1">Presidente</option>
                                    <option value="2" >Vicepresidente</option>
                                    <option value="3" selected>Secretario</option>
                                    <option value="4">Tesorero</option>
                                    <option value="5">Portavoz</option>
                                    <option value="6">Jugador</option>
                                    @break  
                                    @case(4)
                                    <option value="1">Presidente</option>
                                    <option value="2" >Vicepresidente</option>
                                    <option value="3">Secretario</option>
                                    <option value="4" selected>Tesorero</option>
                                    <option value="5">Portavoz</option>
                                    <option value="6">Jugador</option>
                                    @break   
                                    @case(5)
                                    <option value="1">Presidente</option>
                                    <option value="2" >Vicepresidente</option>
                                    <option value="3">Secretario</option>
                                    <option value="4">Tesorero</option>
                                    <option value="5" selected>Portavoz</option>
                                    <option value="6">Jugador</option>
                                    @break

                                @default
                                <option value="1">Presidente</option>
                                    <option value="2" >Vicepresidente</option>
                                    <option value="3">Secretario</option>
                                    <option value="4">Tesorero</option>
                                    <option value="5">Portavoz</option>
                                    <option value="6" selected>Jugador</option>
                    @endswitch
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button id="actualizar" type="submit" class="btn btn-primary actualizar">
                                {{ __('Actualizar') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
        <!--Plantilla-->
        <script src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
    <script src="{{ asset('js/plantilla/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('js/plantilla/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/plantilla/jquery.sticky-sidebar.min.js') }}"></script>
    <script src="{{ asset('js/plantilla/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/plantilla/main.js') }}"></script>
      <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}"></script>

@endsection