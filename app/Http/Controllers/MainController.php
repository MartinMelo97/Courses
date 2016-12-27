<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Categoria;
use App\Tag;

class MainController extends Controller
{
    public function index(){
        $cursos = Curso::orderBy('created_at','DESC')->paginate(10);
        $cursos->each(function($cursos){
            $cursos->institucion;
            $cursos->categorias;
        });

        $categorias = Categoria::orderBy('nombre','DESC')->get();

        return view('publicviews.main')->with(['cursos'=>$cursos,'categorias'=>$categorias]);
    }
}
