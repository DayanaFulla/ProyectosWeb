<?php

namespace App\Http\Controllers;

use App\Contenido;
use App\Materia;
use Illuminate\Http\Request;

class ContenidoController extends Controller
{
    public function create(Request $request)
    {
        $objContenido=new Contenido();
        $objContenido->titulo=$request->get('titulo');
        $objContenido->materia_id=$request->get('materia_id');
        $objContenido->orden=$request->get('orden');
        $objContenido->contenidotextual=$request->get('contenido');
        $objContenido->save();
        return json_encode($objContenido);
    }

    public function update(Request $request)
    {
        $objContenido=Contenido::find($request->get('id'));
        $objContenido->titulo=$request->get('titulo');
        $objContenido->materia_id=$request->get('materia_id');
        $objContenido->orden=$request->get('orden');
        $objContenido->contenidotextual=$request->get('contenido');
        $objContenido->save();
        return json_encode($objContenido);
    }

    public function delete($id)
    {
        $objContenido=Contenido::find($id);
        $resp=$objContenido->id;
        $objContenido->delete();
        return $resp;
    }

    public function getcontenido($id)
    {
        $objContenido=Contenido::find($id);
        return json_encode($objContenido);
    }

    public function view($id)
    {
        $objContenido=Contenido::find($id);
        $objMateria=Materia::find($objContenido->materia_id);
        return view('Contenido.Contenido', compact('objContenido', 'objMateria'));
    }

    public function studentview($id)
    {
        $objContenido=Contenido::find($id);
        $objMateria=Materia::find($objContenido->materia_id);
        return view('Contenido.ContenidoStudent', compact('objContenido', 'objMateria'));
    }

}
