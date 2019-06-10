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

                <form class="juegoForm" action="">
                    <div class="form-group row">
                        <label for="Nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                        <div class="col-md-6">
                            <input type="text" name="nombre" id="nombre" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Plataforma" class="col-md-4 col-form-label text-md-right">Plataforma</label>
                        <div class="col-md-6">
                            <select name="plataforma" id="plataforma">
                                <option>PC</option>
                                <option>Switch</option>
                                <option>PS4</option>
                                <option>Xbox One</option>
                                <option>Movil</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Imagen" class="col-md-4 col-form-label text-md-right">Imagen</label>
                        <div class="col-md-6">
                            <input type="file" name="imagen" id="imagen">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Descripcion" class="col-md-4 col-form-label text-md-right">Descripcion</label>
                        <div class="col-md-6">
                            <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button id="fechar" type="submit" class="btn btn-primary fechar">
                                {{ __('Añadir') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>