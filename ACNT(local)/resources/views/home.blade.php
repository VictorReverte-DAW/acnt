@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#juego">
                        Añadir juego
                    </button>
                   @extends('layouts.modal.modalJuego')
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection