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
use App\Tags;

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
