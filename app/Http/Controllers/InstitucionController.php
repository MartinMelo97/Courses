<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institucion;
class InstitucionController extends Controller
{
    
    public function list(){
        $instituciones = Institucion::orderBy('nombre')->paginate(10);
        $instituciones->each(function($instituciones){
            $instituciones->imagen;
        });
        return view('publicviews.instituciones_list')->with('instituciones',$instituciones);
    }

    public function detail($slug){
        $institucion = Institucion::where('slug',$slug)->first();
        return view('publicviews.instituciones_detail')->with('institucion',$institucion);
    }

    public function courses($slug){
        $institucion = Institucion::where('slug',$slug)->first();
        $cursos = Institucion::where('slug',$slug)->first()->cursos()->orderBy('created_at','DESC')->paginate(5);
        return view('publicviews.instituciones_courses')->with(['institucion'=>$institucion,'cursos'=>$cursos]);
    }
}
