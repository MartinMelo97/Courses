<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Alumno;
use App\Institucion;
use App\Categoria;

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
        $cursos_relacionados = "";
        $institucion = Institucion::find($curso->institucion_id);
        $categorias = $curso->categorias;
        $tags = $curso->tags;
        $docentes = $curso->docentes;
        $comentarios = $curso->comentarios;
        $ventajas = $curso->ventajas;
        $temario = $curso->temarios;
        $no_categorias = count($curso->categorias);
        switch($no_categorias){
            case 1:
                $categoria_id = $categorias[0]->id;
                $categoria_object = Categoria::find($categoria_id);
                $cursos_relacionados = $categoria_object->cursos->reverse()->take(4);
            break;
            case 2:
            break;
            default:
        }

        $comentarios->each(function ($comentarios){
            $comentarios->alumno_id = Alumno::find($comentarios->alumno_id);
        });

        return view('publicviews.cursos_detail')->with(['curso'=>$curso,
        'categorias'=>$categorias,'tags'=>$tags,'docentes'=>$docentes,
        'comentarios'=>$comentarios,'ventajas'=>$ventajas,'temario'=>$temario,
        'institucion'=>$institucion,'relacionados'=>$cursos_relacionados]);
    }
}

