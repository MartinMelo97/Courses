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
        /*$cursos = Curso::orderBy('created_at')->take(5)->get(); //Traemos los ultimos 5 cursos añadidos
        $alumnos = Alumno::orderBy('created_at')->take(5)->get(); //Traemos los ultimos 5 alumnos registrados
        //Traemos las instituciones, contamos cuantos cursos tiene c/u, ordenamos por el numeros de cursos
        //Y mandamos las 5 instituciones con mas cursos
        $instituciones = []; //Declaramos array vacio que sera el que enviaremos al view
        $array = Institucion::orderBy('nombre')->get(); //Traemos todas las instituciones
        $array->each(function($array){ //A cada institucion se cuenta sus cursos y se almacena en su funcion cursos
            $array->cursos = $array->cursos->count(); //Como un override
        });
        $array = $array->sortByDesc('cursos'); //Se ordena el array por el numeros de cursos
        for($i = 0; $i < 2; $i++){ //Se filtran las 5 instituciones con mas cursos
            $instituciones[$i] = $array[$i];
        }
        //Hacemos lo mismo que instituciones, pero con categorias
        $categorias = [];
        $array = Categoria::orderBy('nombre')->get();
        $array->each(function($array){
            $array->cursos = $array->cursos->count();
        });
        $array = $array->sortByDesc('cursos');
        for($i = 0; $i < 2; $i++){
            $categorias[$i] = $array[$i];
        }

        //Hacemos lo mismo que categorias, pero con tags;
        $tags = [];
        $array = Tag::orderBy('nombre')->get();
        $array->each(function($array){
            $array->cursos = $array->cursos->count();
        });
        $array = $array->sortByDesc('cursos');
        for($i = 0; $i < 2; $i++){
            $tags[$i] = $array[$i];
        }
        //Mandamos todo a la view
        return view('/admin/home')->with(['cursos'=>$cursos,'alumnos'=>$alumnos,'instituciones'=>$instituciones,
        'categorias'=>$categorias,'tags'=>$tags]);*/
        return ('Hola');
    }
}
