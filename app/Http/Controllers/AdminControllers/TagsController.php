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
            $tags->curso;
        });
        return view('admin.tags.list')->with('tags',$tags);
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
