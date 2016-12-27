<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Alumno;

class CursoController extends Controller
{
    public function list(){
        $cursos = Curso::orderBy('created_at','DESC')->paginate(5);
        $cursos->each(function($cursos){
            $cursos->institucion;
            $cursos->categorias = $cursos->categorias->pluck('nombre');
            $cursos->categorias_slugs = $cursos->categorias_slugs->pluck('slug');
            $cursos->tags = $cursos->tags->pluck('nombre');
            $cursos->tags_slugs = $cursos->tags_slugs->pluck('slug');
        });
        return view('publicviews.cursos_list')->with('cursos',$cursos);
    }

    public function detail($slug){
        $curso = Curso::where('slug',$slug)->first();
        $gratis = "";
        if($curso->gratis){
            $gratis = "Si";
        }
        else{
            $gratis = "No";
        }

        $categorias = $curso->categorias;
        $tags = $curso->tags;
        $docentes = $curso->docentes;
        $comentarios = $curso->comentarios;
        $comentarios->each(function ($comentarios){
            $comentarios->alumno_id = Alumno::find($comentarios->alumno_id);
        });


        return view('publicviews.cursos_detail')->with(['curso'=>$curso,
        'categorias'=>$categorias,'tags'=>$tags,'docentes'=>$docentes,
        'comentarios'=>$comentarios,'gratis'=>$gratis]);
    }
}

