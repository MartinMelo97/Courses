<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Curso;
use App\Alumno;
use App\Institucion;
use App\Categoria;
use App\Subcategoria;

class CursoController extends Controller
{
    public function list(){

        $cursos = Curso::orderBy('created_at','DESC')->paginate(5); //Traemos todos los cursos, y paginamos con 5
        
        $cursos->each(function($cursos){
            $cursos->imagenes;
            $cursos->institucion;
        });

        $cursos = $this->ordenador($cursos,[]);

        return view('publicviews.cursos_list')->with('cursos',$cursos);
    }

    public function detail($slug){

        $ventajas = [];
        $temario = [];
        //Traigo el curso con ese slug
        $curso = Curso::where('slug',$slug)->first();
        //Traigo todo el objeto de la institucion a la que pertenece el curso
        $institucion = Institucion::find($curso->institucion_id);

        //Traigo los docentes encargados del curso
        $docentes = $curso->docentes;
        $docentes->each(function($docentes){
            $docentes->cursos = $docentes->cursos->take(4);
        });

        //Tags
        $tags = $curso->tags;

        //De igual manera los comentarios hechos
        $comentarios = $curso->comentarios;

        if($institucion->membresia != "gratuita")
        {
            //Las ventajas
            $ventajas = $curso->ventajas;
        }

        if($institucion->membresia == "premium")
        {
            //El temario
            $temario = $curso->temarios;
        }

        //Las imagenes
        $imagenes = $curso->imagenes;

        //Cursos relacionados con la misma subcategoria
        $subcategoria = Subcategoria::find($curso->subcategoria->id);
        $todos = $subcategoria->cursos;
        $relacionados_sub = $this->filtrador($todos, $curso);

        //Cursos relacionados con la misma categoria
        $categoria = Categoria::find($curso->categoria->id);
        $todos = $categoria->cursos;
        $relacionados_cat = $this->filtrador($todos, $curso);

        $comentarios->each(function ($comentarios){
            $comentarios->alumno_id = Alumno::find($comentarios->alumno_id);
        });
        error_log($curso->video);
        return view('publicviews.cursos_detail')->with(['curso'=>$curso,
        'categoria'=>$categoria,'subcategoria'=>$subcategoria,'docentes'=>$docentes,
        'comentarios'=>$comentarios,'tags'=>$tags,'ventajas'=>$ventajas,'temario'=>$temario,
        'institucion'=>$institucion,'relacionados_sub'=>$relacionados_sub,'relacionados_cat'=>$relacionados_cat, 
        'imagenes'=>$imagenes]);
    }
    public function filtrador($todos, $itself)
    {
        error_log($itself->nombre);
        $filtrado = [];
        foreach($todos as $curso)
        {
            error_log($curso->nombre);
            if($curso->id != $itself->id)
            {
                $filtrado[] = $curso;
            }

            if(count($filtrado) == 4)
            {
                break;
            }
        }
        return $filtrado;
    }

    public function added(Request $data){
        $curso = Curso::find($data->curso_id);
        error_log($curso->nombre);
        $alumno = Alumno::find($data->user_id);
        error_log($alumno->nombre);
        $alumnos_yaregistrados = $curso->alumnos;
        foreach($alumnos_yaregistrados as $registrado)
        {
            if($registrado->id == $alumno->id)
            {
                return response()->json(array('status'=>'ya'));
            }
            else
            {
                $curso->alumnos()->attach($alumno);
                return response()->json(array('status'=>"OK"));
            }
        }
        
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

