<?php

namespace App\Http\Controllers;

use App\Inscripcion;
use App\Materia;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Psy\Util\Json;
use Symfony\Component\HttpFoundation\Session\Storage\SessionStorageInterface;

class UsuarioController extends Controller
{
    public function create(Request $request)
    {
        $objUsuario = new Usuario();
        $objUsuario->tipo = $request->get('tipo');
        $objUsuario->nombrecompleto = $request->get('nombrecompleto');
        $objUsuario->correo = $request->get('correo');
        $cont1 = $request->get('contrasena');
        $cont2 = $request->get('confirmacion');
        if ($cont1 == $cont2) {
            $objUsuario->contrasena = sha1($cont1);
            $objUsuario->save();
            return "true";
        }
        return "false";
    }

    public function login(Request $request)
    {
        $objUsuario = DB::table('usuarios')->where('correo', $request->get('correo'))->get();
        $pass = $request->get('contrasena');
        if ($objUsuario[0]->contrasena == sha1($pass)) {
            session(['usuario' => $objUsuario[0]]);
            return  json_encode($objUsuario[0]);
        } else {
            return "false";
        }
        return "false";

    }
    public function cerrarsession()
    {
        Session::forget('usuario');
        if(!Session::has('usuario'))
        {
            return "signout";
        }
    }
    public function existuser()
    {
        $objUsuario=session('usuario');
        if($objUsuario==null){
            return "false";
        }
        return json_encode($objUsuario);
    }

    public function getuser()
    {
        $objUsuario=session('usuario');
        return json_encode($objUsuario);
    }

    public function desktop()
    {
        //$objUsuario = Usuario::find($id);
        $objUsuario=session('usuario');
        if($objUsuario==null){
            return "Por favor, inicie sesión primero";
        }
        $listaMaterias = DB::table('materias')->where('docente_id', $objUsuario->id)->get();
        return view('Desktop', compact('objUsuario', 'listaMaterias'));

    }


    public function home()
    {
        //$listaInscripcion = DB::table('inscripcions')->where('alumno_id', $id)->get();
        $objUsuario=session('usuario');
        if($objUsuario==null){
            return "Por favor, inicie sesión primero";
        }
        $listaInscripcion = DB::table('inscripcions')->where('alumno_id', $objUsuario->id)->get();
        $listaMaterias = array();
        foreach ($listaInscripcion as $objInscripcion) {
            $objMateria = Materia::find($objInscripcion->materia_id);
            $listaMaterias[] = $objMateria;
        }


        //$objUsuario = Usuario::find($id);
        return view('Home', compact('objUsuario', 'listaMaterias'));
    }

}
