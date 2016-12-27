<?php

namespace App\Http\Controllers\Alumnos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alumno;
class AlumnoController extends Controller
{
    public function profile(){
        $alumno_id = \Auth::guard('alumnos')->user()->id;
        $alumno = Alumno::find($alumno_id);
        $cursos = $alumno->cursos()->orderBy('nombre')->paginate(3);
        $other = false; //Esta variable es para saber si el perfil es propio o ajeno
        return view('alumnos.profile')->with(['alumno'=>$alumno,'cursos'=>$cursos,'other'=>$other]);
    }
    public function show($usuario){
        $alumno = Alumno::where('usuario',$usuario)->first();
        $cursos = null;
        $other = true;
        return view('alumnos.profile')->with(['alumno'=>$alumno,'cursos'=>$cursos,'other'=>$other]);
    }
}
