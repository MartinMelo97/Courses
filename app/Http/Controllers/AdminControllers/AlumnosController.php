<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alumno;
class AlumnosController extends Controller
{
    public function index(){
        $alumnos = Alumno::orderBy('nombre','ASC')->paginate(10);
        $alumnos->each(function($alumnos){
            $alumnos->cursos = count($alumnos->cursos);
        });
        return view ('admin.alumnos.list')->with('alumnos',$alumnos);
    }

    public function create(){
        return view('admin.alumnos.create');
    }


    public function show($usuario){
        $alumno = Alumno::where('usuario',$usuario)->first();
        $cursos = $alumno->cursos;
        $comentarios = $alumno->comentarios;
        return view('admin.alumnos.detail')->with(['alumno'=>$alumno,'cursos'=>$cursos,'comentarios'=>$comentarios]);
    }

    
    public function destroy($usuario){
        $alumno = Alumno::where('usuario',$usuario)->first();
        $alumno->delete();
        return redirect()->route('alumnos.index');  
    }
}
