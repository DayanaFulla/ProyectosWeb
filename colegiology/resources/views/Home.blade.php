@extends('welcome')
@section('content')
    <div class="listacursos">
        <div class="lstcursos">
            <ul class="ulcursos">
                <li><h5>Cursos</h5></li>
                @foreach($listaMaterias as $objMateria)
                    <?php  $docente=DB::table('usuarios')->where('id', $objMateria->docente_id)->get();  ?>

                    <li id="licurso<?php  echo $objMateria->id; ?>">
                        <div class="subscripcion">
                            <a href="/Course/{{$objMateria["id"]}}">{{$objMateria["nombre"]}}</a><br>
                            <button type="button"  class="btneliminarmimateriaregistrada" data-id="{{$objMateria["id"]}}" >
                                <i class="fa fa-trash"></i></button><br>
                        </div>
                        <label><span><i class="fa fa-user"></i></span><?php echo $docente[0]->nombrecompleto;?></label>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
