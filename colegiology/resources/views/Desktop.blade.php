@extends('welcome')

@section('content')
    <div class="listacursos">
        <div class="lstcursos">
            <ul class="ulcursos">
                <h5>Cursos</h5>
                @foreach($listaMaterias as $objMateria)
                    <li id="licurso<?php  echo $objMateria->id; ?>">
                        <div class="course">
                            <a href="/Materia/<?php  echo $objMateria->id; ?>"><?php  echo $objMateria->nombre; ?></a>
                            <button type="button" class="btnUpdateMateria"  data-id="<?php  echo $objMateria->id; ?>"
                                    ><i class="fa fa-pencil"></i>
                            </button>
                            <button type="button"  class="btneliminarmateria" data-id="<?php  echo $objMateria->id; ?>" ><i class="fa fa-trash"></i></button><br>
                        </div>
                        <label><span><i class="fa fa-book"></i></span><?php  echo $objMateria->codigo; ?></label>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div>

    </div>
@extends('Materia.ModalMateriaInsertar')
@endsection
