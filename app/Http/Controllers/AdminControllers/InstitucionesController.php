<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Institucion;
use App\Imagen;
use Illuminate\Support\Facades\File;

class InstitucionesController extends Controller
{
    public function index(){
        $instituciones = Institucion::orderBy('created_at')->paginate(5);
        return view('admin.instituciones.list')->with('instituciones',$instituciones);
    }

    public function create(){
        return view('admin.instituciones.create');
    }

    public function store(Request $data){

        $institucion = new Institucion();
        $institucion->fill($data->all());

        if(!is_null($data->imagen)){
            $file = $data->file('imagen');
            $nombre = 'Institucion_'.$data->nombre.'.'.$file->getClientOriginalExtension();
            $path = public_path().'/images/instituciones/';
            $file->move($path,$nombre);
            $route = '/images/instituciones/'.$nombre;
            $imagen = new Imagen();
            $imagen->ruta = $route;
            $imagen->save();
            $institucion->imagen_id = $imagen->id;
        }
        else
        {
            $institucion->imagen_id = 2;
        }
        
        $institucion->save();
        return redirect()->route('instituciones.index');
    }

    public function edit($slug){
        $institucion = Institucion::where('slug',$slug)->first();
        return view('admin.instituciones.edit')->with('institucion',$institucion);
    }

    public function update(Request $data, $slug){
        $institucion_edit = Institucion::where('slug',$slug)->first();
        $current_image = $institucion_edit->imagen->id;
        $institucion_edit->fill($data->all());

        if(!is_null($data->imagen)){
            $file = $data->file('imagen');
            $nombre = 'Institucion_'.$institucion_edit->nombre.'.'.$file->getClientOriginalExtension();
            $path = public_path().'/images/instituciones/';
            $file->move($path,$nombre);
            $route = '/images/instituciones/'.$nombre;

            $imagen = new Imagen();
            $imagen->ruta = $route;
            $imagen->save();
            error_log($imagen->id);
            $institucion_edit->imagen_id = $imagen->id;
        }
        else
        {
            $institucion_edit->imagen_id = $current_image;
        }
        $institucion_edit->save();
        return redirect()->route('instituciones.index');
    }
    
    public function destroy($slug){
        $institucion_delete = Institucion::where('slug',$slug)->first();
        $institucion_delete->delete();
        return redirect()->route('instituciones.index');
    }
}
