<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Curso;
use App\Categoria;
use App\Subcategoria;
use App\Tag;
use App\Institucion;
use App\Docente;
use App\Alumno;


class BuscadorController extends Controller
{
    public function search()
    {
        $cursos_encontrados = [];
        $word = Input::get('q','none');
        $max_price = Input::get('max_precio',null);
        $min_price = Input::get('min_precio', null);
        $estado = Input::get('ubicacion', null);

        if($max_price == null && $min_price == null && $estado == null)
        {
            $cursos = Curso::searching($word)->get();
        }

        else if($max_price != null && $min_price == null && $estado == null)
        {
            $cursos = Curso::searching($word)->where('precio','<',$max_price)->get();
        }
        
        else if($min_price != null && $max_price == null && $estado == null)
        {
            $cursos = Curso::searching($word)->where('precio','>',$min_price)->get();
        }

        else if($estado != null && $max_price == null && $min_price == null)
        {
            $cursos = Curso::searching($word)->where('estado',$estado)->get();
        }

        else if($max_price != null && $min_price != null && $estado == null)
        {
            $cursos = Curso::searching($word)->where('precio','<',$max_price)
            ->where('precio','>',$min_price)->get();
        }

        else if($max_price != null && $min_price == null && $estado != null)
        {
            $cursos = Curso::searching($word)->where('precio','<',$max_price)
            ->where('estado',$estado)->get();
        }

        else if($max_price == null && $min_price != null && $estado != null)
        {
            $cursos = Curso::searching($word)->where('estado',$estado)
            ->where('precio','>',$min_price)->get();
        }

        else if($max_price != null && $min_price != null && $estado != null)
        {
            $cursos = Curso::searching($word)->where('estado',$estado)
            ->where('precio','>',$min_price)->where('precio','<',$max_price)->get();
        }
        


        $cursos->each(function($cursos){
            $cursos->counter = $cursos->counter_order;
        });

        $categorias = Categoria::where('nombre', 'LIKE', '%'.$word.'%')->get();
        error_log("Categorias: ".count($categorias));
        $subcategorias = Subcategoria::where('nombre', 'LIKE', '%'.$word.'%')->get();
        $tags = Tag::where('nombre', 'LIKE', '%'.$word.'%')->get();
        $instituciones = Institucion::where('nombre','LIKE','%'.$word.'%')->get();
        $docentes = Docente::where('nombre','LIKE','%'.$word.'%')->orWhere('apellidos','LIKE','%'.$word.'%')
            ->orWhere('email','LIKE','%'.$word.'%')->orWhere('usuario','LIKE','%'.$word.'%')->get();
        
        $cursos->sortByDesc('counter');
        $cursos_encontrados = $this->ordenador($cursos, $cursos_encontrados);

        return view('publicviews.buscador')->with(['word'=>$word,'cursos'=>$cursos_encontrados
        ,'categorias'=>$categorias,'subcategorias'=>$subcategorias,'tags'=>$tags,
        'instituciones'=>$instituciones, 'docentes'=>$docentes]);
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
