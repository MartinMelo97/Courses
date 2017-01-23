<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categoria;

class CategoriasController extends Controller
{
    public function index(){
        $categorias = Categoria::orderBy('nombre','DESC')->paginate(10);
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

    public function edit($id){

    }

    public function update(Request $data, $id){

    }
    
    public function destroy($id){
        
    }
}
