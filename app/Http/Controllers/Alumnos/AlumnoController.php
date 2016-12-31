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
    public function dashboard(){
        $alumno_id = \Auth::guard('alumnos')->user()->id;
        $alumno = Alumno::find($alumno_id);
        $cursos = $alumno->cursos()->orderBy('nombre')->paginate(5);
        return view('alumnos.dashboard')->with(['alumno'=>$alumno,'cursos'=>$cursos]);
    }

    public function profileEdit(){
        $alumno_id = \Auth::guard('alumnos')->user()->id;
        $alumno = Alumno::find($alumno_id);
        return view('alumnos.edit_profile')->with('alumno',$alumno);
    }
    
    public function profileEditPOST(Request $request){
        $alumno_id = \Auth::guard('alumnos')->user()->id;
        $alumno = Alumno::find($alumno_id);
        $some = $alumno->imagen;
        if(!is_null($request->imagen)){
            $file = $request->imagen;
            $name = 'Alumno_'.$request->usuario.'.'.$file->getClientOriginalExtension();
            $path = public_path().'/images/alumnos/profile';
            $file->move($path,$name);
            $route = '/images/alumnos/profile/'.$name;
            $some = $route;
        }
            $alumno->fill($request->all());
            $alumno->imagen = $some;
            $alumno->save();
            return redirect()->route('alumnos.perfil.own');
       
    }
}