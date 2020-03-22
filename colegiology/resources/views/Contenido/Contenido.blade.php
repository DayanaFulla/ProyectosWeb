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
                <div class="contenidounico">
                    <a href="#">{{$objMateria["nombre"]}}</a><br>
                    <label>{{$objContenido["titulo"]}}</label>
                </div>
                <div>
                    <p>{{$objContenido["contenidotextual"]}}</p>
                </div>

            </div>
        </div>
    </div>
    @extends('Materia.ModalMateriaInsertar')
    @extends('Contenido.ModalContenidoInsertar')
    @extends('Tarea.ModalTareaInsertar')

@endsection

