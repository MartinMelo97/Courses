<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Curso;

class BuscadorController extends Controller
{
    public function search()
    {
        $word = Input::get('buscador_txt','none');
        $cursos = Curso::where('nombre','like','%'.$word.'%')
        ->orWhere('descripcion','like','%'.$word.'%')->paginate(10);
        return view('publicviews.buscador')->with(['cursos'=>$cursos,'word'=>$word]);
    }
}
