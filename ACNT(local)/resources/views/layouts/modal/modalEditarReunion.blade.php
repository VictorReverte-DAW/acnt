<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="modal fade" id="EditarReunionModal" tabindex="-1" role="dialog" aria-labelledby="EditarReunionModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reunionModal">Editar reunion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="reunionForm" enctype="multipart/form-data">
                @csrf
                    <div class="form-group row">
                    <label for="Fecha"
                            class="col-md-4 col-form-label text-md-right">Fecha</label>
                        <div class="col-md-6">
                            <input type="date" name="EditarFecha" id="EditarFecha" min="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="Hora"
                            class="col-md-4 col-form-label text-md-right">Hora</label>
                        <div class="col-md-6">
                            <input type="time" name="EditarHora" id="EditarHora" required>
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="Asunto"
                            class="col-md-4 col-form-label text-md-right">Asunto de la reunion</label>
                        <div class="col-md-6">
                            <textarea name="EditarAsunto" id="EditarAsunto" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input type="hidden" name="estado" id="estado" value="activa">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button id="actualizarReunion" type="submit" class="btn btn-primary actualizarReunion">
                                Cambiar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>