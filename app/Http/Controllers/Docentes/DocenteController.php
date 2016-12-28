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
        dd($docente);
        $cursos = $docente->cursos()->orderBy('nombre')->paginate(3);
        $other = false; //Esta variable es para saber si el perfil es propio o ajeno
        return view('docentes.profile')->with(['docente'=>$docente,'cursos'=>$cursos,'other'=>$other]);
    }
    public function show($usuario){
    /*    $docente = Docente::where('usuario',$usuario)->first();
        $cursos = null;
        $other = true;
        return view('docentes.profile')->with(['docente'=>$docente,'cursos'=>$cursos,'other'=>$other]);*/
    }
    public function dashboard(){
       /* $alumno_id = \Auth::guard('alumnos')->user()->id;
        $alumno = Alumno::find($alumno_id);
        $cursos = $alumno->cursos()->orderBy('nombre')->paginate(5);
        return view('alumnos.dashboard')->with(['alumno'=>$alumno,'cursos'=>$cursos]);*/
    }
}
