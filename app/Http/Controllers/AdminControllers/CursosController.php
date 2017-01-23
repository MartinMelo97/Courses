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

class CursosController extends Controller
{
    public function index(){
        $cursos = Curso::orderBy('created_at','DESC')->paginate(5);
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
        $curso_create->fill($data->all());
        $curso_create->institucion_id = $institucion->id;
        $curso_create->duracion = $data->duracion.' '.$data->duracion_unit;
        if($institucion->membresia != "premium")
        {
            $file = $data->file('media');
            $nombre = 'Curso_'.$data->nombre.'.'.$file->getClientOriginalExtension();
            $path = public_path().'/images/cursos/';
            $file->move($path,$nombre);
            $route = '/images/cursos/'.$nombre;
            $curso_create->media = $route;
        }
        
        else

        {
            $url = $data->media;
            if(strpos($url, 'youtube') == true)
            {
                $partes = explode("v=",$url);
                $url = 'https://youtube.com/embed/'.$partes[1];
            }
            $curso_create->media = $url;
        }

        $curso_create->save();
        //Guardamos las categorias seleccionadas
        $curso_create->categorias()->sync($data->categorias);

        //Guardamos los profesores seleccionamos
        if($data->docentes){
        $curso_create->docentes()->sync($data->docentes);
        }

        //Spliteamos las tags y las guardamos
        $tags = explode(",",$data->tags);
        if($tags){
        foreach($tags as $tag)
        {
            $new_tag = new Tag();
            $new_tag->nombre = $tag;
            $new_tag->curso_id = $curso_create->id;
            $new_tag->save();
        }
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

    }

    public function show($id){

    }

    public function edit($id){

    }

    public function update(Request $data, $id){

    }
    
    public function destroy($id){
        
    }
}
