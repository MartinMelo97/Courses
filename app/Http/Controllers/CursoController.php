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

        $cursos = Curso::orderBy('created_at','DESC')->paginate(5); //Traemos todos los cursos, y paginamos con 5
        
        $cursos->each(function($cursos){
            $cursos->imagenes;
            $cursos->institucion;
            $cursos->categorias = $cursos->categorias->pluck('nombre');
            $cursos->categorias_slugs = $cursos->categorias_slugs->pluck('slug');
        });

        return view('publicviews.cursos_list')->with('cursos',$cursos);
    }

    public function detail($slug){

        //Traigo el curso con ese slug
        $curso = Curso::where('slug',$slug)->first();

        //Inicializo esta variable para hacerla global
        $cursos_relacionados = "";

        //Traigo todo el objeto de la institucion a la que pertenece el curso
        $institucion = Institucion::find($curso->institucion_id);

        //Traigo las categorias del curso detallado
        $categorias = $curso->categorias;

        //Traigo los docentes encargados del curso
        $docentes = $curso->docentes;

        //Tags
        $tags = $curso->tags;

        //De igual manera los comentarios hechos
        $comentarios = $curso->comentarios;

        //Las ventajas
        $ventajas = $curso->ventajas;

        //El temario
        $temario = $curso->temarios;

        $no_categorias = count($curso->categorias); //Cuento cuantas categorias tiene el curso MAX 3

        switch($no_categorias){ //Hacemos un switch para jalar y mostrar los relacionados

            case 1:
                $categoria_id = $categorias[0]->id; //Solo es una categoria, traemos el id
                $categoria_object = Categoria::find($categoria_id); //Traemos todo el objeto
                $cursos_relacionados = $categoria_object->cursos->reverse()->take(4); //Tomamos 4 cursos
            break;

            case 2:

                $cursos_relacionados = []; //Convierto la variable global en un arreglo vacio

                $new_variable = []; //Instancio otro arreglo vacio auxiliar

                $truncate_at = 2; //Variable para truncar en la función

                for($m = 0; $m < 2; $m++){ //Debido a que son 2 categoria, traeré 2 cursos relacionados de c/u

                    error_log("Soy un for con indice: ".$m);

                    $categoria_id = $categorias[$m]->id; //Jalo el id de la categoria analizada
                    $categoria_object = Categoria::find($categoria_id); //Traigo todo el objeto
                    error_log("categoria: ".$categoria_object->nombre);

                    $cursos_of_categoria = $categoria_object->cursos; //Genero array de los cursos con esa categoria

                    $prerelacionados = $this->prerelacionados($cursos_of_categoria, $slug, $truncate_at); //Funcion para llenar arreglo auxiliar

                    $cursos_relacionados = $this->relacionados($prerelacionados, $cursos_relacionados); //Filtrado y array general

                    error_log("YA ME VOY");
                }
            break;

            case 3:

                //Al tener 3 categorias, la primer categoría tendrá 2 cursos, y las otras 2 un solo curso
                //Cuando se implemente el porcentaje, será el parámetro de ordenación

                $cursos_relacionados = []; 

                $truncate_at = 2;

                $categoria_id = $categorias[0]->id; //Tomo la categoria que esté en el top
                $categoria_object = Categoria::find($categoria_id);
                $cursos_of_categoria = $categoria_object->cursos;
                
                $prerelacionados = $this->prerelacionados($cursos_of_categoria, $slug, $truncate_at);
                $cursos_relacionados = $this->relacionados($prerelacionados, $cursos_relacionados);

                //Ahora voy con los categorias que solo aportarán un curso
                for($m = 0; $m < 2; $m++)
                {
                    $truncate_at = 1;
                    $categoria_id = $categorias[$m + 1]->id;
                    $categoria_object = Categoria::find($categoria_id);
                    $cursos_of_categoria = $categoria_object->cursos;
                    $prerelacionados = $this->prerelacionados($cursos_of_categoria, $slug, $truncate_at);
                    $cursos_relacionados = $this->relacionados($prerelacionados, $cursos_relacionados);
                }
            break;
        }

        $comentarios->each(function ($comentarios){
            $comentarios->alumno_id = Alumno::find($comentarios->alumno_id);
        });

        return view('publicviews.cursos_detail')->with(['curso'=>$curso,
        'categorias'=>$categorias,'docentes'=>$docentes,
        'comentarios'=>$comentarios,'tags'=>$tags,'ventajas'=>$ventajas,'temario'=>$temario,
        'institucion'=>$institucion,'relacionados'=>$cursos_relacionados]);
    }

    //Funcion para llenar arreglo auxiliar
    public function prerelacionados($cursos, $slug, $truncate_at)
    {
        $prerelacionados = [];
        $limitador = 0; //Variable con que limitaré en caso de que existan más de 2 cursos

        error_log("cursos de la categoria: ".count($cursos));

        for($j = 0; $j < count($cursos); $j++) //Realizo otro for con los cursos de la categoria analizada
        {
            error_log($cursos[$j]->slug." ".$slug);

            if($slug != $cursos[$j]->slug) //Con esta condición valido que el curso analizado no sea el mismo del de detalle
            {
                error_log("es diferente");

                $prerelacionados[] = $cursos[$j]; //Si no es el mismo, lo guardo en el array auxiliar
                $limitador++;

            }

            error_log("variable pendeja: ".$limitador);

            if($limitador == $truncate_at){ //Cuando ya haya 2 cursos en el auxiliar, rompemos el for
                error_log("Ya me voy ya tengo 2");
                break;
            }
        }
        return $prerelacionados;
    }

    //Funcion para filtrar y llenar el array que se envia al template
    public function relacionados($prerelacionados, $cursos_relacionados)
    {
        foreach($prerelacionados as $prerelacionado) //Ahora pasaremos los datos del auxiliar al general
        {
            error_log("ya voy a meterme al array, soy:".$prerelacionado->nombre);

            $noesta = false; //Declaro variable boolean auxiliar

            foreach($cursos_relacionados as $relacionado) //Analizo lo que tengo dentro de mi array general
            {

                if($prerelacionado == $relacionado) // Si el curso YA ESTÁ dentro del general evito volverlo a meter
                {
                    error_log("Ya estoy, bai");
                    $noesta = true;
                }
            }

            if($noesta == false)
            {
                $cursos_relacionados[] = $prerelacionado;
            }
        }
        return $cursos_relacionados;
    }
}

