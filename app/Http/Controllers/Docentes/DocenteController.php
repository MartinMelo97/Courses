<?php

namespace App\Http\Controllers\Docentes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Docente;
class DocenteController extends Controller
{
    public function profile(){
        $docente_id = \Auth::guard('docentes')->user()->id;
        $docente = Docente::find($docente_id);
        $cursos = $docente->cursos()->orderBy('nombre')->paginate(3);
        $other = false; //Esta variable es para saber si el perfil es propio o ajeno
        return view('docentes.profile')->with(['docente'=>$docente,'cursos'=>$cursos,'other'=>$other]);
    }

    public function show($usuario){
        $docente = Docente::where('usuario',$usuario)->first();
        $cursos = null;
        $other = true;
        return view('docentes.profile')->with(['docente'=>$docente,'cursos'=>$cursos,'other'=>$other]);
    }

    public function profileEdit(){
        $docente_id = \Auth::guard('docentes')->user()->id;
        $docente = Docente::find($docente_id);
        return view('docentes.edit_profile')->with('docente',$docente);
    }

    public function profileEditPOST(Request $request){
        $docente_id = \Auth::guard('docentes')->user()->id;
        $docente = Docente::find($docente_id);
        $docente->fill($request->all());

        $current_imagen = $docente->imagen->id;
        if(!is_null($request->imagen)){
            $file = $request->imagen;
            $name = 'Docente_'.$request->usuario.'.'.$file->getClientOriginalExtension();
            $path = public_path().'/images/docentes';
            $file->move($path,$name);
            $route = '/images/docentes/'.$name;
            $imagen = new Imagen();
            $imagen->ruta = $route;
            $imagen->save();
            $docente->imagen_id = $imagen->id;
        }
        $docente->imagen_id = $current_imagen;
        $docente->save();
        
        return redirect()->route('docentes.perfil.own');
    }
}
