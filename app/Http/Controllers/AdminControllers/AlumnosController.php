<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alumno;
class AlumnosController extends Controller
{
    public function index(){
        $alumnos = Alumno::orderBy('nombre','ASC')->paginate(10);
        return view ('admin.alumnos.list')->with('alumnos',$alumnos);
    }

    public function create(){

    }

    public function store(Request $data){

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
