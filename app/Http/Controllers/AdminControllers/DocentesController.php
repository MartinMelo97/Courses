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

    public function show($id){

    }

    public function edit($id){

    }

    public function update(Request $data, $id){

    }
    
    public function destroy($id){
        
    }
}
