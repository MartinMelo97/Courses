<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Institucion extends Model
{
    use Sluggable;
   protected $table = 'instituciones';
   protected $fillable = ['nombre','email','imagen'];

   public function docentes(){
       return $this->hasMany('App\Docente');
   }

   public function cursos(){
       return $this->hasMany('App\Curso');
   }
   public function sluggable(){
        return [
            'slug' => [
                'source' => 'nombre'
            ]
        ];
    }

}
