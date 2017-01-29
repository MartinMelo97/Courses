<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categoria;

class CategoriasController extends Controller
{
    public function index(){
        $categorias = Categoria::orderBy('nombre','DESC')->paginate(10);
        $categorias->each(function($categorias){
            $categorias->cursos = count($categorias->cursos);
        });
        return view('admin.categorias.list')->with('categorias',$categorias);
    }

    public function create(){
        return view('admin.categorias.create');
    }

    public function store(Request $data){
        $categoria = new Categoria();
        $categoria->fill($data->all());
        $categoria->save();
        return redirect()->route('categorias.index');  
    }

    public function show($id){

    }

    public function edit($slug){
        $categoria = Categoria::where('slug',$slug)->first();
        
        return view('admin.categorias.edit')->with('categoria',$categoria);
    }

    public function update(Request $data, $slug){
        $categoria = Categoria::where('slug',$slug)->first();
        $categoria->fill($data->all());
        $categoria->save();

        return redirect()->route('categorias.index');
    }
    
    public function destroy($slug){
        $categoria = Categoria::where('slug',$slug);
        $categoria->delete();

        return redirect()->route('categorias.index');
    }
}
