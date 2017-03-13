<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Curso;
use App\Institucion;
use App\Docente;
use App\Comentarios;
use App\Ventaja;
use App\Temario;
use App\Categoria;
use App\Tag;
use App\Imagen;
use App\Subcategoria;

class CursosController extends Controller
{
    public function index(){
        $cursos = Curso::orderBy('created_at','DESC')->paginate(10);
        $cursos->each(function($cursos){
            $cursos->institucion;
            $cursos->alumnos = count($cursos->alumnos);
            $cursos->tags;
            //$cursos->categorias;
            $cursos->categoria;
            $cursos->subcategoria;
            $cursos->docentes;
        });
        return view('admin.cursos.list')->with('cursos',$cursos);
    }

    public function create(){
        $docentes="";
        $institucion_slug = Input::get('institucion','none');
        $institucion = Institucion::orderBy('nombre','DESC')->pluck('nombre','slug');
        $institucion_owner = Institucion::where('slug',$institucion_slug)->first();
        $categorias = Categoria::orderBy('nombre','DESC')->pluck('nombre','id');
        if($institucion_slug != "none"){
        $docentes = $institucion_owner->docentes->pluck('usuario','id');
        }
        return view('admin.cursos.create')->with(['institucion'=>$institucion, 'institucion_owner'=>$institucion_owner ,
        'institucion_slug'=>$institucion_slug,'categorias'=>$categorias,'docentes'=>$docentes]);
    }


    public function store(Request $data){
        $curso_create = new Curso();
        $institucion = Institucion::where('nombre',$data->institucion)->first();
        $categoria = Categoria::where('nombre', $data->categoria)->first();
        $subcategoria = Subcategoria::where('nombre', $data->subcategoria)->first();
        $curso_create->fill($data->all());
        $curso_create->institucion_id = $institucion->id;
        $curso_create->categoria_id = $categoria->id;
        $curso_create->subcategoria_id = $subcategoria->id;
        $curso_create->duracion = $data->duracion.' '.$data->duracion_unit;
        
        if($institucion->membresia == "premium"){
            $url = $data->video;
            error_log($url);
                if(strpos($url, 'youtube') == true)
                {
                    $partes = explode("v=",$url);
                    $url = 'https://youtube.com/embed/'.$partes[1];
                }
            $curso_create->video = $url;
        }

        $curso_create->save();
        //Guardamos las categorias seleccionadas
        //$curso_create->categorias()->sync($data->categorias);

        //Guardamos los profesores seleccionamos
        if($data->docentes){
        $curso_create->docentes()->sync($data->docentes);
        }

        //Spliteamos las tags y las guardamos

        if(count($data->tags) > 0)
        {
            $tags_ids = []; //Creo un arreglo vacio para almacenar los ids de los tags después de guardarlos

            foreach($data->tags as $tag)
            {
                $comprobador = Tag::where('nombre',$tag)->first(); //Busco en la tabla tags si ya existe alguno con ese nombre
                error_log(count($comprobador)); 
                if(count($comprobador) == 0) //Si no se encontró ninguno, se guarda
                {
                    error_log("ven");
                    $new_tag = new Tag(); //Instancio un nuevo tag
                    $new_tag->nombre = $tag; //Le paso como nombre del tag lo que viene del formulario
                    $new_tag->save(); //Lo guardo en la base de datos
                    $tags_ids[] = $new_tag->id; //Guardo el id del tag recién creado en el arreglo
                }
                else
                {
                    error_log("no entre");
                    $tags_ids[] = $comprobador->id; //Si si lo encontró, guardo en el array vacio el id del tag
                }
            }
            $curso_create->tags()->sync($tags_ids); //Almaceno en la tabla pivote todos los ids de los tags
        }
        //Guardamos las ventajas
        foreach($data->ventajas as $ventaja)
        {
            
            $new_ventaja = new Ventaja();
            $new_ventaja->ventaja = $ventaja;
            $new_ventaja->curso_id = $curso_create->id;
            $new_ventaja->save();
        }

        if($data->temarios)
        {
            foreach($data->temarios as $temario)
            {
                $new_temario = new Temario();
                $new_temario->tema = $temario;
                $new_temario->curso_id = $curso_create->id;
                $new_temario->save();
            }
        }

        if(count($data->imagen) > 0)
        {
            $imagenes_to_save = [];
            $cont = 0;
            foreach($data->imagen as $img){
                $file = $img;
                $nombre = 'Curso_'.$data->nombre.'-'.($cont+1).'.'.$file->getClientOriginalExtension();
                $path = public_path().'/images/cursos/';
                $file->move($path,$nombre);
                $route = '/images/cursos/'.$nombre;
                $imagen = new Imagen();
                $imagen->ruta = $route;
                $imagen->save();
                $imagenes_to_save[] = $imagen->id;
                $cont++;
            }

            $curso_create->imagenes()->sync($imagenes_to_save);

        }

        return redirect()->route('cursos.index');
    }

    public function show($id){

    }

    public function edit($slug){
        //$categorias_in_course = [];
        $docentes_in_course = [];
        $curso = Curso::where('slug',$slug)->first();
        /*foreach($curso->categorias as $categoria)
        {
            error_log('entre, '.$categoria->id);
            $categorias_in_course[] = $categoria->id;
        }*/

        foreach($curso->docentes as $docente)
        {
            error_log('entre doc, '.$docente->id);
            $docentes_in_course[] = $docente->id;
        }

        $categorias = Categoria::orderBy('nombre','DESC')->pluck('nombre','id');
        $docentes = Docente::where('institucion_id',$curso->institucion->id)->pluck('usuario','id');
        $instituciones = Institucion::orderBy('nombre','DESC')->pluck('nombre','id');
        $duracion_array = explode(" ", $curso->duracion);
        return view('admin.cursos.edit')->with(['curso'=>$curso,'duracion'=>$duracion_array,'categorias'=>$categorias,
        'docentes'=>$docentes,/*'categorias_curso'=>$categorias_in_course,*/'docentes_curso'=>$docentes_in_course,
        'instituciones'=>$instituciones]);
    }

    public function update(Request $data, $slug){
        $curso_edit = Curso::where('slug',$slug)->first();
        $curso_edit->fill($data->all());
        $institucion = Institucion::where('nombre',$data->institucion)->first();
        $categoria = Categoria::where('nombre', $data->categoria)->first();
        $subcategoria = Subcategoria::where('nombre', $data->subcategoria)->first();
        $curso_create->fill($data->all());
        $curso_create->institucion_id = $institucion->id;
        $curso_create->categoria_id = $categoria->id;
        $curso_create->subcategoria_id = $subcategoria->id;
        $curso_edit->duracion = $data->duracion.' '.$data->duracion_unit;

        if($institucion->membresia == "premium")
        {
           $url = $data->video;
            error_log($url);
                if(strpos($url, 'youtube') == true)
                {
                    $partes = explode("v=",$url);
                    $url = 'https://youtube.com/embed/'.$partes[1];
                }
            $curso_edit->video = $url;
        }

        $curso_edit->save();

////////////////////////////////Categorias////////////////////

        /*$curso_edit->categorias()->detach();
        $curso_edit->categorias()->sync($data->categorias);*/

//////////////////////////Docentes/////////////////////////////

        if(count($curso_edit->docentes) > 0 )
        {
            $curso_edit->docentes()->detach();
        }

        if($data->docentes)
        {
            $curso_edit->docentes()->sync($data->docentes);
        }
        
        
////////////////////////////////Tags///////////////////////////
        if($curso_edit->tags)
        {
            $curso_edit->tags()->detach();
        }

        if(count($data->tags) > 0)
        {
            $tags_ids = [];

            foreach($data->tags as $tag)
            {
                $comprobador = Tag::where('nombre',$tag)->first();

                if(count($comprobador) == 0)
                {
                    $new_tag = new Tag();
                    $new_tag->nombre = $tag;
                    $new_tag->save();
                    $tags_ids[] = $new_tag->id;
                }
                else
                {
                    $tags_ids[] = $comprobador->id;
                }
            }

            $curso_edit->tags()->sync($tags_ids);
        }

        ////////////////////////Ventajas//////////////////
        $ventajas_before = $curso_edit->ventajas;

        if(count($ventajas_before) > 0)
        {
            foreach($ventajas_before as $ventaja_bye)
            {
                $ventaja_delete = Ventaja::find($ventaja_bye->id);
                $ventaja_delete->delete();
            }
        }

        if($data->ventajas)
        {
            foreach($data->ventajas as $ventaja)
            {
                
                $new_ventaja = new Ventaja();
                $new_ventaja->ventaja = $ventaja;
                $new_ventaja->curso_id = $curso_edit->id;
                $new_ventaja->save();
            }
        }
        /////////////////////Temario///////////////////////

        if($institucion->membresia != "gratuita")
        {
            $temario_before = $curso_edit->temarios;
            
            if(count($temario_before) > 0)
            {
                foreach($temario_before as $temario_bye)
                {
                    $temario_delete = Temario::find($temario_bye->id);
                    $temario_delete->delete();
                }
            }
            if($data->temarios)
            {
                foreach($data->temarios as $temario)
                {
                    $new_temario = new Temario();
                    $new_temario->tema = $temario;
                    $new_temario->curso_id = $curso_edit->id;
                    $new_temario->save();
                }
            }
        }

        /////////////////////Imagenes/////////////////////////
        

        //////////////////Redireccion//////////////////////////
        return redirect()->route('cursos.index');
    }
    
    public function destroy($slug){
        $curso_delete = Curso::where('slug',$slug)->first();
        $curso_delete->delete();

        return redirect()->route('cursos.index');
    }
    
    public function ajax_subcategories($id)
    {
        if($id > 0)
        {
            $categoria = Categoria::find($id);
            $subcategorias = $categoria->subcategorias;
            $subcategorias->status = "yes";
            return $subcategorias->toArray();
        }

    }
}
