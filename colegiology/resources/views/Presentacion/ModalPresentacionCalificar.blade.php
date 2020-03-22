<div class="modal fade" id="ModalInsertarCalificacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Tarea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="txt_calificacion_insc" class="col-form-label">Calificacion:</label>
                        <input type="number" class="form-control" id="txt_calificacion_insc" name="nota" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="registrarcalificacion" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>