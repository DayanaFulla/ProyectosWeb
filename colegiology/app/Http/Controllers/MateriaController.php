<?php

namespace App\Http\Controllers;

use App\Contenido;
use App\Inscripcion;
use App\Materia;
use App\Presentacion;
use App\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Matcher\HasKey;
use phpDocumentor\Reflection\DocBlock\Tags\Generic;

class MateriaController extends Controller
{
    public function index($id)
    {
        $objMateria = Materia::find($id);
        $listaContenido = DB::table('contenidos')->where('materia_id', $id)->orderBy('orden')->get();
        $listaTareas = DB::table('tareas')->where('materia_id', $id)->orderBy('orden')->get();
        return view('Materia.Materia', compact('objMateria', 'listaContenido', 'listaTareas'));
    }

    public function getmateria($id)
    {
        $objMateria = Materia::find($id);
        return json_encode($objMateria);
    }

    public function studentview($id)
    {
        $objMateria = Materia::find($id);
        $listaContenido = DB::table('contenidos')->where('materia_id', $id)->get();
        $listaTareas = DB::table('tareas')->where('materia_id', $id)->get();
        return view('Materia.MateriaStudent', compact('objMateria', 'listaContenido', 'listaTareas'));
    }

    public function create(Request $request)
    {
        $objUsuario = session('usuario');
        $objMateria = new Materia();
        $crypt = sha1(time());
        $code = substr($crypt, 0, 8);
        $objMateria->codigo = $objUsuario->id . "" . $code;
        $objMateria->nombre = $request->get('nombre');
        $objMateria->docente_id = $objUsuario->id;
        $objMateria->save();
        return json_encode($objMateria);
    }

    public function update(Request $request)
    {
        $objMateria = Materia::find($request->get('id'));
        $objMateria->nombre = $request->get('nombre');
        $objMateria->save();
        return json_encode($objMateria);
    }

    public function delete($id)
    {
        $objMateria = Materia::find($id);
        $listaTareas = Tarea::where('materia_id', $objMateria->id)->get();
        $listaContenidos = Contenido::where('materia_id', $objMateria->id)->delete();
        $listaInscripciones = Inscripcion::where('materia_id', $objMateria->id)->delete();

        if(count($listaTareas)>0){
            $listaPresentaciones = Presentacion::where('tarea_id', $listaTareas[0]->id)->delete();
        }

        $listaTareas = Tarea::where('materia_id', $objMateria->id)->delete();


        $resp = $objMateria->id;
        $objMateria->delete();
        return $resp;
    }
}
