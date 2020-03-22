<div class="modal fade" id="ModalInsertarPresentacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Tarea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{url('Presentacion/create')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="txt_descripcion_insc" class="col-form-label">Titulo:</label>
                        <input type="text" class="form-control" id="txt_descripcion_insc" name="descripcion" required>
                        <input type="hidden" class="form-control" id="txt_descripcion_insc" name="tarea_id" value="{{$objTarea["id"]}}" required>
                    </div>
                    <div class="form-group">
                        <label for="txt_file_insc" class="col-form-label">Documento:</label>
                        <input type="file" class="form-control" id="direccion" name="direccion" required>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="registrarpresentacion" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>