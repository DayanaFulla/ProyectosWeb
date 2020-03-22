@extends('welcome')
@section('content')
    <!-- Navbar -->
    <div class="materiasseccion">
        <div class="cursosecc1">
            <img id="iconocurso" src="{{asset('Imagenes/desktop.jpg')}}"><br>
            <div>
                <a href="#">Materiales</a><br>
                <a href="#">Calificaciones</a><br>
                <a href="/Classmates/<?php echo $objMateria->id;?>" id="amiembros">Miembros</a><br>
            </div>

        </div>
        <div class="cursosecc2">
            <div>
                <h5><?php echo $objMateria->nombre;  ?></h5><br>
            </div>
            <div class="lstflcontenidos">
                @foreach($listaContenido as $objContenido)
                    <div class="seccontent">
                        <a class="flcontenidos" href="/Contenido/<?php echo $objContenido->id; ?>"><i class="fa fa-file"></i><?php echo $objContenido->titulo; ?></a>
                    </div>
                @endforeach
            </div>
            <div class="lstfltareas">
                @foreach($listaTareas as $objTarea)
                    <div class="sectarea" >
                        <a class="fltareas" href="/Homework/<?php echo $objTarea->id; ?>"><i class="fa fa-edit"></i><?php echo $objTarea->titulo; ?></a><br>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
