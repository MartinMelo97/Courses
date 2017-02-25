<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Institucion extends Model
{
    use Sluggable;
   protected $table = 'instituciones';
   protected $fillable = ['nombre','email','telefono','codigo_postal','pais','membresia','estado','municipio','direccion','latitud','longitud','facebook','twitter','google','pagina_web'];

   public function docentes(){
       return $this->hasMany('App\Docente');
   }

   public function cursos(){
       return $this->hasMany('App\Curso');
   }

   public function imagen(){
       return $this->belongsTo('App\Imagen');
   }

   public function sluggable(){
        return [
            'slug' => [
                'source' => 'nombre'
            ]
        ];
    }

}
