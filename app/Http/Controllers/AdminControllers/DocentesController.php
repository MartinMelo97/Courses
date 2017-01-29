<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Docente;
use App\Institucion;

class DocentesController extends Controller
{
    public function index(){
        $docentes = Docente::orderBy('nombre','ASC')->paginate(10);
        $docentes->each(function($docentes){
            $docentes->institucion;
        });
        return view('admin.docentes.list')->with('docentes',$docentes);
    }

    public function create(){
        $instituciones = Institucion::orderBy('nombre','DESC')->pluck('nombre','id');
        return view('admin.docentes.create')->with('instituciones',$instituciones);
    }

    public function store(Request $data){

        $new_docente = new Docente();
        $new_docente->fill($data->all());

        if($data->imagen)
       {
            $file = $data->file('imagen');
            $name = 'Docente_'.$data->usuario.'.'.$file->getClientOriginalExtension();
            $path = public_path().'/images/docentes';
            $file->move($path,$name);
            $route = 'images/docentes'.$name;
            $new_docente->imagen = $route;
        }

        $new_docente->institucion_id = $data->institucion_id;
        $new_docente->password = bcrypt($data->password);
        $new_docente->save();
        
        return redirect()->route('docentes.index');
    }


    public function edit($usuario){
        $docente = Docente::where('usuario',$usuario)->first();
        $instituciones = Institucion::orderBy('nombre','DESC')->pluck('nombre','id');
        error_log($docente->institucion->nombre);
        return view('admin.docentes.edit')->with(['docente'=>$docente,'instituciones'=>$instituciones]);  
    }

    public function update(Request $data, $usuario){
        $docente = Docente::where('usuario',$usuario)->first();
        $docente->fill($data->all());
        if($data->imagen)
        {
            $file = $data->file('imagen');
            $name = 'Docente_'.$data->usuario.'.'.$file->getClientOriginalExtension();
            $path = public_path().'/images/docentes/';
            $file->move($path, $name);
            $route = '/images/docentes/'.$name;
            $docente->imagen = $route;
        }
        $docente->save();
        return redirect()->route('docentes.index');
    }
    
    public function destroy($usuario){
        $docente_delete = Docente::where('usuario',$usuario)->first();
        $docente_delete->delete();
        return redirect()->route('docentes.index');
    }
}
