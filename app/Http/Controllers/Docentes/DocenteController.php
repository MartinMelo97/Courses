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
        $docente->save();
        return redirect()->route('docentes.perfil.own');
    }
}
