<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Curso;

class BuscadorController extends Controller
{
    public function search()
    {
        $word = Input::get('q','none');
        $cursos = Curso::where('nombre','like','%'.$word.'%')
        ->orWhere('descripcion','like','%'.$word.'%')->paginate(10);
        $bye = $this->filtrador($cursos);
        dd($bye);
        return view('publicviews.buscador')->with(['cursos'=>$cursos,'word'=>$word]);
    }

    public function filtrador($cursos)
    {
        error_log("entro");
        $premium = [];
        $especial = [];
        $basica = [];

        foreach($cursos as $curso){
            if($curso->institucion->membresia == "premium"){
                
            }

            else if($curso->institucion->membresia == "extraordinaria")
            {
                $especial[] = $curso;
            }

            else
            {
                $basica[] = $curso;
            }

            
            return "que pedo";
        }
    }
}
