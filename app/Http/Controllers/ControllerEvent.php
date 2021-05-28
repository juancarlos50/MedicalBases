<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;

class ControllerEvent extends Controller
{
    //
    //formulario de eventtos
    public function form(){
        return view("evento/form");
    }

    //guardar evento
    public function create(Request $request){

    // validacion

        $this->validate($request, [
            'titulo'     =>  'required',
            'descripcion'  =>  'required',
            'fecha' =>  'required'
        ]);

        //guarda la base de datos

        Event::insert([
            'titulo'       => $request->input("titulo"),
            'descripcion'  => $request->input("descripcion"),
            'fecha'        => $request->input("fecha")
        ]);

        // devuelve el mensaje de exito
        return back()->with('success', 'Enviado exitosamente!');

    }
}
