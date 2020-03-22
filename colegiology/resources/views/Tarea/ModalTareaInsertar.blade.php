<div class="modal fade" id="ModalInsertarTarea" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Tarea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="txt_titulo_tarea" class="col-form-label" >Titulo:</label>
                        <input type="text" class="form-control" id="txt_titulo_tarea" required>
                    </div>
                    <div class="form-group">
                        <label for="txt_descripcion_tarea" class="col-form-label">Descripcion:</label>
                        <textarea class="form-control" id="txt_descripcion_tarea" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="txt_fecha_tarea" class="col-form-label" >Fecha Límite:</label>
                        <input type="datetime-local" class="form-control" id="txt_fecha_tarea" required>
                    </div>
                    <div class="form-group">
                        <label for="txt_notamaxima_tarea" class="col-form-label" >Nota Máxima:</label>
                        <input type="number" class="form-control" id="txt_notamaxima_tarea" required>
                    </div>
                    <div class="form-group">
                        <label for="txt_orden_tarea" class="col-form-label" >Orden:</label>
                        <input type="number" class="form-control" id="txt_orden_tarea" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" id="registrartarea" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>