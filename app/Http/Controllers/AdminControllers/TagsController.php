<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;

class TagsController extends Controller
{
    public function index(){
        $tags = Tag::orderBy('nombre','ASC')->paginate(10);
        $tags->each(function($tags)
        {
            $tags->cursos = count($tags->cursos);
        });
        return view('admin.tags.list')->with('tags',$tags);
    }

    public function create(){
        return view('admin.tags.create');
    }

    public function store(Request $data){
        error_log("estoy en store");
        $tag_new = new Tag();
        $tag_new->nombre = $data->nombre;
        $comprobador = Tag::where('nombre',$tag_new->nombre)->first();
        if($comprobador == 0)
        {
            $tag_new->save();
            return redirect()->route('tags.index');
        }
        else
        {
            error_log("El tag".$tag_new->nombre."ya esta registrado"); //Esto después se enviará como error a la vista
            return redirect()->route('tags.create');
        }
    }

    public function show($id){

    }

    public function edit($slug){
        $tag = Tag::where('slug',$slug)->first();
        return view('admin.tags.edit')->with('tag',$tag);
    }

    public function update(Request $data, $slug){
        $tag_edit = Tag::where('slug',$slug)->first();
        $tag_edit->nombre = $data->nombre;
        $tag_edit->save();
        return redirect()->route('tags.index');
    }
    
    public function destroy($slug){
        $tag = Tag::where('slug',$slug)->first();
        $tag->delete();

        return redirect()->route('tags.index');
    }
}
