<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Curso;
class CategoriasController extends Controller
{
    public function list(){
        $categorias = Categoria::orderBy('nombre','DESC')->paginate(10);
        return view ('publicviews.categorias_list')->with('categorias',$categorias);
    }

    public function detail($slug){
        $categoria = Categoria::where('slug',$slug)->first();
        $cursos = Categoria::where('slug',$slug)->first()->cursos()->orderBy('created_at','DESC')->paginate(5);
        //$cursos = $categoria->cursos;
        return view ('publicviews.categorias_detail')->with(['cursos'=>$cursos,'categoria'=>$categoria]);
    }
}
