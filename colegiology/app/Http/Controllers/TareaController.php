<?php

namespace App\Http\Controllers;

use App\Materia;
use App\Presentacion;
use App\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TareaController extends Controller
{
    public function create(Request $request)
    {
        $objTarea=new Tarea();
        $objTarea->titulo=$request->get('titulo');
        $objTarea->descripcion=$request->get('descripcion');
        $objTarea->fechalimite=$request->get('fechalimite');
        $objTarea->notamaxima=$request->get('notamaxima');
        $objTarea->materia_id=$request->get('materia_id');
        $objTarea->orden=$request->get('orden');
        $objTarea->save();
        return json_encode($objTarea);
    }

    public function update(Request $request)
    {
        $objTarea=Tarea::find($request->get('id'));
        $objTarea->titulo=$request->get('titulo');
        $objTarea->descripcion=$request->get('descripcion');
        $objTarea->fechalimite=$request->get('fechalimite');
        $objTarea->notamaxima=$request->get('notamaxima');
        $objTarea->save();
        return json_encode($objTarea);
    }

    public function delete($id)
    {
        $objTarea=Tarea::find($id);

        $listaPresentaciones = Presentacion::where('tarea_id', $objTarea->id)->delete();


        $resp=$objTarea->id;
        $objTarea->delete();
        return $resp;
    }

    public function gettarea($id)
    {
        $objTarea=Tarea::find($id);
        return json_encode($objTarea);
    }

    public function view($id)
    {
        $objTarea=Tarea::find($id);
        $objMateria=Materia::find($objTarea->materia_id);
        $listaPresentaciones=DB::table('presentacions')->where('tarea_id', $objTarea->id)->get();
        //echo $listaPresentaciones;
        return view('Tarea.Tarea', compact('objTarea', 'objMateria', 'listaPresentaciones'));
    }

    public function studentview($id)
    {
        $objTarea=Tarea::find($id);
        $objMateria=Materia::find($objTarea->materia_id);

        $objUsuario=session('usuario');

        $listaPresentaciones=DB::table('presentacions')->where('alumno_id', $objUsuario->id)
            ->where('tarea_id', $objTarea->id)->get();

        if(count($listaPresentaciones)>0){
            $objPresentacion=$listaPresentaciones[0];
        }else{
            $objPresentacion=0;
        }



        return view('Tarea.TareaStudent', compact('objTarea', 'objMateria', 'objPresentacion'));
    }

}
