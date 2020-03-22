<?php

namespace App\Http\Controllers;

use App\Materia;
use App\Presentacion;
use App\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresentacionController extends Controller
{
    public function create(Request $request)
    {
        $objUsuario=session('usuario');

        /*
        $listaPresentaciones=DB::table('presentacions')->where('alumno_id', $objUsuario->id)
            ->where('tarea_id', $request->get('tarea_id'))->get();

        if(count($listaPresentaciones)>0){
            $obj=$listaPresentaciones[0]
            $obj->delete();
        }
        */


        $path=$_FILES["direccion"]["name"];
        $ruta=".".pathinfo($path, PATHINFO_EXTENSION);

        $objPresentacion=new Presentacion();

        $objPresentacion->alumno_id=$objUsuario->id;
        $objPresentacion->tarea_id=$request->get('tarea_id');
        $objPresentacion->descripcion=$request->get('descripcion');
        $objPresentacion->nota=0;
        $objPresentacion->fechapresentacion=date('Y-m-d H:i:s');
        $objPresentacion->estado=false;
        $objPresentacion->direccion=$ruta;
        $objPresentacion->save();



        $lastId=$objPresentacion->id;

        $ruta=$lastId.$ruta;
//dd($ruta);
//        dd($_FILES['direccion']['tmp_name']);
        copy($_FILES['direccion']['tmp_name'], 'Documents/'.$ruta);

        $id=$request->get('tarea_id');
        //$objTarea=Tarea::find($id);
        //$objMateria=Materia::find($objTarea->materia_id);
        //return view('Tarea.Tarea', compact('objTarea', 'objMateria', 'objPresentacion'));
        return redirect('/Homework/'.$id);
    }

    public function calificar(Request $request)
    {
        $id= $request->get('id');
        $objPresentacion=Presentacion::find($id);
        $objTarea=Tarea::find($objPresentacion->tarea_id);
        $notaactual=$request->get('nota');
        $notamax=$objTarea->notamaxima;
        if($notaactual<=$notamax){
            $objPresentacion->nota=$request->get('nota');
            $objPresentacion->estado=true;
            $objPresentacion->save();
            return json_encode($objPresentacion);
        }else{
            return null;
        }

    }













}
