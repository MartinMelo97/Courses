<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Curso extends Model
{

    use Sluggable;

    protected $table = 'cursos';
    protected $fillable = ['nombre','duracion','fecha_inicio','lenguaje','nivel','descripcion','bloqueo','calificacion','video','slug'];

    public function docentes(){
        return $this->belongsToMany('App\Docente')->withTimestamps();
    }

    public function institucion(){
        return $this->belongsTo('App\Institucion');
    }

    public function comentarios(){
       return $this->hasMany('App\Comentario');
   }

   public function ventajas(){
       return $this->hasMany('App\Ventaja');
   }

   public function temarios(){
       return $this->hasMany('App\Temario');
   }
   
    public function categorias(){
        return $this->belongsToMany('App\Categoria')->withTimestamps();
    }

    public function categorias_slugs(){
        return $this->belongsToMany('App\Categoria')->withTimestamps();
    }

    public function alumnos(){
        return $this->belongsToMany('App\Alumno')->withTimestamps();
    }

    public function tags(){
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function tags_slugs(){
         return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function imagenes(){
        return $this->belongsToMany('App\Imagen')->withTimestamps();
    }

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'nombre'
            ]
        ];
    }
}

