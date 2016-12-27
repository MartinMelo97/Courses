<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
class TagController extends Controller
{
    public function list(){
        $tags = Tag::orderBy('nombre','DESC')->paginate(10);
        return view ('publicviews.tags_list')->with('tags',$tags);
    }

    public function detail($slug){
        $tag = Tag::where('slug',$slug)->first();
        $cursos = Tag::where('slug',$slug)->first()->cursos()->orderBy('created_at','DESC')->paginate(5);
        //$cursos = $tag->cursos;
        return view ('publicviews.tags_detail')->with(['cursos'=>$cursos,'tag'=>$tag]);
    }
}
