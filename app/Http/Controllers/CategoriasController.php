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
        $cursos = $this->ordenador($cursos,[]);
        return view ('publicviews.categorias_detail')->with(['cursos'=>$cursos,'categoria'=>$categoria]);
    }

    public function ordenador($cursos, $encontrados)
    {
        $ordenados = [];
        $noestan = [];
        foreach($cursos as $curso)
        {
            if(count($encontrados) > 0)
            {
                for($i = 0; $i < count($encontrados); $i++)
                {
                    if($curso != $encontrados[$i])
                    {
                        $noestan[] = $curso;
                    }
                }
            }
            else
            {
                $noestan[] = $curso;
            }
        }
        $premium = [];
        $extraordinaria = [];
        $basica = [];

        foreach($noestan as $n)
        {
            switch($n->institucion->membresia)
            {
                case 'premium': 
                    $premium[] = $n;
                    break;
                
                case 'extraordinaria':
                    $extraordinaria[] = $n;
                    break;
                
                case 'gratuita':
                    $basica[] = $n;
            }
        }

        foreach($premium as $p)
        {
            $ordenados[] = $p;
        }

        foreach($extraordinaria as $e)
        {
            $ordenados[] = $e;
        }

        foreach($basica as $b)
        {
            $ordenados[] = $b;
        }
        return $ordenados;
    }
}
