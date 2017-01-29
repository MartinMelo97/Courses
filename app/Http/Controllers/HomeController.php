<?php

namespace App\Http\Controllers;
use App\Curso;
use App\Institucion;
use App\Alumno;
use App\Categoria;
use App\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::orderBy('created_at','DESSC')->take(5)->get(); //Traemos los ultimos 5 cursos añadidos

        $alumnos = Alumno::orderBy('created_at','DESC')->take(5)->get(); //Traemos los ultimos 5 alumnos registrados

        //Traemos las instituciones, contamos cuantos cursos tiene c/u, ordenamos por el numeros de cursos
        //Y mandamos las 5 instituciones con mas cursos

        $instituciones = Institucion::withCount('cursos')->orderBy('cursos_count','desc')->take(5)->get();
        $instituciones->each(function($instituciones){
            $instituciones->cursos = count($instituciones->cursos);
        });

        //Hacemos lo mismo que instituciones, pero con categorias
        $categorias = Categoria::withCount('cursos')->orderBy('cursos_count','desc')->take(5)->get();
        $categorias->each(function($categorias){
            $categorias->cursos = count($categorias->cursos);
        });
        
        $tags = Tag::withCount('cursos')->orderBy('cursos_count','desc')->take(5)->get();
        $tags->each(function($tags){
            $tags->cursos = count($tags->cursos);
        });

        //Mandamos todo a la view
        return view('/admin/home')->with(['cursos'=>$cursos,'alumnos'=>$alumnos,'instituciones'=>$instituciones,
        'categorias'=>$categorias,'tags'=>$tags]);
        
    }

}
