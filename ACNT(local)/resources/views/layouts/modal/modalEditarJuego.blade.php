<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="modal fade" id="Editjuego" tabindex="-1" role="dialog" aria-labelledby="Editjuego" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reunionModal">Editar Juego</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="formEditjuego" enctype="multipart/form-data">
                @csrf
                    <div class="form-group row">
                    <label for="Nombre"
                            class="col-md-4 col-form-label text-md-right">Nombre</label>
                        <div class="col-md-6">
                            <input type="text" name="nombre" id="nombre" required>
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="Plataforma"
                            class="col-md-4 col-form-label text-md-right"></label>
                            plataforma
                        <div class="col-md-6">
                        <select name="plataforma" id="plataforma" >
                                <option value="PC" selected>PC</option>
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
                            <textarea name="descripcion" id="descripcion"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary botonEditarJuego">
                                Cambiar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>