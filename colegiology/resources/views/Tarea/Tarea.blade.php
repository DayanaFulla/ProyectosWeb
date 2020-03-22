@extends('welcome')

@section('content')
    <!-- Navbar -->
    <div class="materiasseccion">
        <div class="cursosecc1">
            <img id="iconocurso" src="{{asset('Imagenes/desktop.jpg')}}"><br>
            <div>
                <a href="#">Materiales</a><br>
                <a href="#">Calificaciones</a><br>
                <a href="/Miembros/<?php echo $objMateria->id;  ?>" id="amiembros">Miembros</a><br>
            </div>

        </div>
        <div class="cursosecc2">

            <div>
                <div>
                    <a href="#">{{$objMateria["nombre"]}}</a><br>
                    <label>{{$objTarea["titulo"]}}</label>

                </div>
                <div>
                    <time datetime="month">Vence: {{$objTarea["fechalimite"]}}</time>
                </div>

                <div>
                    <p>Nota máxima: {{$objTarea["notamaxima"]}}</p>
                    <p>{{$objTarea["descripcion"]}}</p>
                </div>

            </div>
        </div>
        <div class="cursosecc3">
            <h5>Presentaciones</h5>
            @foreach($listaPresentaciones as $objPresentacion)
                <?php $objUsuario=\App\Usuario::find($objPresentacion->alumno_id); ?>
                <input type="hidden" class="txt_presentacion_id" value="<?php echo $objPresentacion->id; ?>">
                <a href="/Documents/<?php echo $objPresentacion->id."".$objPresentacion->direccion ?>"><?php echo $objUsuario->nombrecompleto ?></a>
                <span><?php echo $objPresentacion->nota; ?></span>
                 <button type="button" data-toggle="modal" class="btn btn-primary"
                            data-target="#ModalInsertarCalificacion" id="insertarcalificacion" data-id="<?php echo $objPresentacion->id; ?>" >
                        Calificar
                 </button>
                <br>
            @endforeach
        </div>
    </div>
    @extends('Materia.ModalMateriaInsertar')
    @extends('Contenido.ModalContenidoInsertar')
    @extends('Tarea.ModalTareaInsertar')
    @extends('Presentacion.ModalPresentacionCalificar')

@endsection

