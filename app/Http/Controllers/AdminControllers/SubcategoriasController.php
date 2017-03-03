<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subcategoria;
use App\Categoria;

class SubcategoriasController extends Controller
{
    public function index(){
        $subcategorias = Subcategoria::orderBy('nombre','DESC')->paginate(10);
        $subcategorias->each(function($subcategorias){
            $subcategorias->cursos = count($subcategorias->cursos);
            $subcategorias->categoria;
        });
        return view('admin.subcategorias.list')->with('subcategorias',$subcategorias);
    }

    public function create(){
        $categorias = Categoria::orderBy('nombre','DESC')->pluck('nombre','id');
        error_log(count($categorias));
        return view('admin.subcategorias.create')->with('categorias',$categorias);
    }

    public function store(Request $data){
        $subcategoria = new Subcategoria();
        $subcategoria->fill($data->all());
        $subcategoria->categoria_id = $data->categoria;
        $subcategoria->save();
        return redirect()->route('subcategorias.index');  
    }

    public function show($id){

    }

    public function edit($slug){
        $subcategoria = subcategoria::where('slug',$slug)->first();
        $categorias = Categoria::orderBy('nombre','DESC')->pluck('nombre','id');
        return view('admin.subcategorias.edit')->with(['subcategoria'=>$subcategoria,'categorias'=>$categorias]);
    }

    public function update(Request $data, $slug){
        $subcategoria = Subcategoria::where('slug',$slug)->first();
        $subcategoria->fill($data->all());
        $subcategoria->categoria_id = $data->categoria;
        $subcategoria->save();

        return redirect()->route('subcategorias.index');
    }
    
    public function destroy($slug){
        $subcategoria = Subcategoria::where('slug',$slug);
        $subcategoria->delete();

        return redirect()->route('subcategorias.index');
    }
}
