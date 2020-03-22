@extends('welcome')
@section('content')
    <!-- Navbar -->
    <div class="materiasseccion">
        <div class="cursosecc1">
            <img id="iconocurso" src="{{asset('Imagenes/desktop.jpg')}}"><br>
            <div>
                <a href="#">Materiales</a><br>
                <a href="#">Calificaciones</a><br>
                <a href="#">Miembros</a><br>
            </div>

        </div>
        <div class="miembros">
            <div class="miembroshead">
                <label><?php echo $objMateria->nombre; ?></label>
                <input type="text" style="display: none;" id="txtincripcionmateria"  value="<?php echo $objMateria->id; ?>">
            </div>
            @foreach($lstUsuarios as $objUsuario)
                <div class="secmiembros" id="divmiembro<?php echo $objUsuario->id; ?>">
                    <label><i class="fa fa-user"></i>{{$objUsuario["nombrecompleto"]}}</label>
                </div>
            @endforeach
        </div>
    </div>
@endsection
