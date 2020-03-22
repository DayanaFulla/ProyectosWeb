@extends('welcome')

@section('content')
    <!-- Navbar -->
    <div class="materiasseccion">
        <div class="cursosecc1">
            <img id="iconocurso" src="{{asset('Imagenes/desktop.jpg')}}"><br>
            <div>
                <a href="#">Materiales</a><br>
                <a href="#">Calificaciones</a><br>
                <a href="/Classmates/<?php echo $objMateria->id;  ?>" id="amiembros">Miembros</a><br>
            </div>

        </div>
        <div class="cursosecc2">
            <div>
                <div>
                    <a href="#">{{$objMateria["nombre"]}}</a><br>
                    <label>{{$objTarea["titulo"]}}</label>
                </div>
                <div>
                    <time datetime="month">Vence: {{$objTarea["fechalimite"]}}</time><br>
                </div>

                <div>
                    <p>{{$objTarea["descripcion"]}}</p>
                </div>
            </div>
        </div>
        <div class="cursosecc3">
            <button type="button" data-toggle="modal" class="btn btn-primary"
                    data-target="#ModalInsertarPresentacion" id="insertarcontenidopop" data-id="<?php echo $objMateria->id;  ?>">
                Enviar Tarea
            </button>

            <div class="presentacion">
                <a href=""><?php if($objPresentacion!=null){
                    echo $objPresentacion->descripcion;
                    } ?></a>
            </div>

        </div>
    </div>
    @extends('Materia.ModalMateriaInsertar')
    @extends('Contenido.ModalContenidoInsertar')
    @extends('Tarea.ModalTareaInsertar')
    @extends('Presentacion.ModalPresentacionInsertar')

@endsection

