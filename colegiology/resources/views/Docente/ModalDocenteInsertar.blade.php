<div class="modal fade" id="ModalInsertarDocente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sign up for Colegiology</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="txt_nombre_docente" class="col-form-label">Nombre Completo:</label>
                        <input type="text" class="form-control" id="txt_nombre_docente" required>
                    </div>
                    <div class="form-group">
                        <label for="txt_correo_docente" class="col-form-label">Correo:</label>
                        <input type="email" class="form-control" id="txt_correo_docente" required>
                    </div>
                    <div class="form-group">
                        <label for="txt_contrasena_docente" class="col-form-label">Contraseña:</label>
                        <input type="password" class="form-control" id="txt_contrasena_docente" required>
                    </div>
                    <div class="form-group">
                        <label for="txt_con_contrasena_docente" class="col-form-label">Confirmar Contraseña:</label>
                        <input type="password" class="form-control" id="txt_con_contrasena_docente" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="registrardocente">Guardar</button>
            </div>
        </div>
    </div>
</div>