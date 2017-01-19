<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Institucion;

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
        $file = $data->file('imagen');
        $nombre = 'Institucion_'.$data->nombre.'.'.$file->getClientOriginalExtension();
        $path = public_path().'/images/instituciones/';
        $file->move($path,$nombre);
        $route = '/images/instituciones/'.$nombre;
        $institucion = new Institucion();
        $institucion->fill($data->all());
        $institucion->imagen = $route;
        $institucion->save();
        return redirect()->route('instituciones.index');
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
