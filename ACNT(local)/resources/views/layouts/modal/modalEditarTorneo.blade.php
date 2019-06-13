<div class="modal fade" id="EditTorneo" tabindex="-1" role="dialog" aria-labelledby="EditTorneo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="torneoModal">Crear un torneo de </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="EditarTorneoForm" id="EditarTorneoForm" enctype="multipart/form-data">
                @csrf
                    <div class="form-group row">
                    <label for="Nombre"
                            class="col-md-4 col-form-label text-md-right">Nombre del torneo</label>
                        <div class="col-md-6">
                            <input type="text" name="nombre" id="nombre" required>
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for=""
                            class="col-md-4 col-form-label text-md-right">Imagen de Torneo</label>
                        <div class="col-md-6">
                            <input type="file" name="imagen" id="imagen" accept="image/*">
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for=""class="col-md-4 col-form-label text-md-right">Fecha del torneo</label>
                        <div class="col-md-6">
                            <input type="date" name="" id="" min="obtenerFecha()">
                        </div>
                    </div>
                    <label for=""class="col-md-4 col-form-label text-md-right">Hora del torneo</label>
                        <div class="col-md-6">
                            <input type="date" name="" id="">
                        </div>
                    </div> 
                    
                    <div class="form-group row">
                    <label for="Gratis"
                            class="col-md-4 col-form-label text-md-right">¿Es Gratis?</label>
                        <input type="hidden" name="gratis" id="gratis">
                        <div class="col-md-6"><input type="checkbox" name="gratis_check" id="gratis_check"></div>
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
                            <button type="submit" class="btn btn-primary EditarTorneo">
                                Actualizar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>