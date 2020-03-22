<?php

namespace App\Http\Controllers;

use App\Inscripcion;
use App\Materia;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InscripcionController extends Controller
{
    public function create(Request $request)
    {
        $objInscripcion=new Inscripcion();
        $objUsuario=session('usuario');
        $objInscripcion->alumno_id=$objUsuario->id;
        $code=$request->get('codigo');
        $objMateria=DB::table('materias')->where('codigo', $code)->get();
        $objInscripcion->materia_id=$objMateria[0]->id;
        $objInscripcion->save();
        return json_encode($objInscripcion);
    }
    public function view($id)
    {
        $lstInscripcion=DB::table('inscripcions')->where('materia_id', $id)->get();
        $objMateria=Materia::find($id);
        $lstUsuarios=array();
        foreach ($lstInscripcion as $objInscripcion){
            $objUsuario=Usuario::find($objInscripcion->alumno_id);
            $lstUsuarios[]=$objUsuario;
        }

        return view('Inscripcion.Miembros', compact('lstUsuarios' ,'objMateria'));
    }
    public function viewStudent($id)
    {
        $lstInscripcion=DB::table('inscripcions')->where('materia_id', $id)->get();
        $objMateria=Materia::find($id);
        $lstUsuarios=array();
        foreach ($lstInscripcion as $objInscripcion){
            $objUsuario=Usuario::find($objInscripcion->alumno_id);
            $lstUsuarios[]=$objUsuario;
        }

        return view('Inscripcion.MiembrosStudent', compact('lstUsuarios' ,'objMateria'));
    }
    public function delete(Request $request)
    {
        $alumno_id=$request->get('alumno_id');
        $materia_id=$request->get('materia_id');
        $objInscrip=Inscripcion::where('alumno_id', $alumno_id)->where('materia_id', $materia_id)->get();
        $objInscripcion=$objInscrip[0];
        $resp=$objInscripcion->id;
        $objInscripcion->delete();
        return $resp;

    }
    public function deleteme($id)
    {
        $objUsuario=session('usuario');
        $materia_id=$id;
        $objInscrip=Inscripcion::where('alumno_id', $objUsuario->id)->where('materia_id', $materia_id)->get();
        $objInscripcion=$objInscrip[0];
        $objInscripcion->delete();
        return $materia_id;

    }
}
