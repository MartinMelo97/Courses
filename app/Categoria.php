<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Categoria extends Model
{
    use Sluggable;

    protected $table = 'categorias';
    protected $fillable = ['nombre','porcentaje','slug'];

    public function cursos(){
        return $this->belongsToMany('App\Curso')->withTimestamps();
    }


    public function sluggable(){
        return [
            'slug' => [
                'source' => 'nombre'
            ]
        ];
    }
} 