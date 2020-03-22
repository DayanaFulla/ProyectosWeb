<div class="modal fade" id="ModalInsertarContenido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Contenido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="txt_titulo_contenido" class="col-form-label" >Titulo:</label>
                        <input type="text" class="form-control" id="txt_titulo_contenido" required>
                    </div>
                    <div class="form-group">
                        <label for="txt_orden_contenido" class="col-form-label" >Orden:</label>
                        <input type="number" class="form-control" id="txt_orden_contenido" required>
                    </div>
                    <div class="form-group">
                        <label for="txt_contenido_contenido" class="col-form-label">Contenido:</label>
                        <textarea class="form-control" id="txt_contenido_contenido" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" id="registrarcontenido" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>