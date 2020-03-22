@extends('welcome')

@section('content')
    <!-- Navbar -->
    <div class="materiasseccion">
        <div class="cursosecc1">
            <img id="iconocurso" src="{{asset('Imagenes/desktop.jpg')}}"><br>
            <div>
                <a href="#" id="amateriales">Materiales</a><br>
                <a href="#" id="acalificaciones">Calificaciones</a><br>
                <a href="/Miembros/<?php echo $objMateria->id;  ?>" id="amiembros">Miembros</a><br>
            </div>

        </div>
        <div class="cursosecc2">
            <div class="materiahead">
                <label><?php echo $objMateria->nombre;  ?></label><br>
                <button type="button" data-toggle="modal" class="btn btn-primary"
                        data-target="#ModalInsertarContenido" id="insertarcontenidopop" data-id="<?php echo $objMateria->id;  ?>">
                    Agregar Contenido
                </button>
                <button type="button" data-toggle="modal" data-id="<?php echo $objMateria->id;  ?>"
                        data-target="#ModalInsertarTarea" id="insertartareapop" class="btn btn-primary">
                    Agregar Tarea
                </button>

            </div>
            <div class="lstflcontenidos">
                @foreach($listaContenido as $objContenido)
                    <div class="seccontent" id="divcontenido<?php echo $objContenido->id; ?>">
                        <a class="flcontenidos" href="/Contenido/<?php echo $objContenido->id; ?>"><i class="fa fa-file"></i><?php echo $objContenido->titulo; ?></a>
                        <button type="button" class="btnUpdatecontenido"  data-id="<?php echo $objContenido->id; ?>">
                            <i class="fa fa-pencil"></i>
                        </button>
                        <button type="button" class="btneliminarcontenido"  data-id="<?php echo $objContenido->id; ?>" >
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>

                @endforeach
            </div>
            <div class="lstfltareas">
                @foreach($listaTareas as $objTarea)
                    <div class="sectarea" id="divtarea<?php echo $objTarea->id; ?>">
                        <a class="fltareas" href="/Tarea/<?php echo $objTarea->id; ?>"><i class="fa fa-edit"></i><?php echo $objTarea->titulo; ?></a><br>
                        <button type="button" class="btnUpdatetarea" data-id="<?php echo $objTarea->id; ?>">
                            <i class="fa fa-pencil"></i>
                        </button>
                        <button type="button" class="btneliminartarea" data-id="<?php echo $objTarea->id; ?>">
                            <i class="fa fa-trash"></i>
                        </button>
                        <br>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
    @extends('Materia.ModalMateriaInsertar')
    @extends('Contenido.ModalContenidoInsertar')
    @extends('Tarea.ModalTareaInsertar')

@endsection

