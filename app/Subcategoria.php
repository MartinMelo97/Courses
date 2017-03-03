<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Subcategoria extends Model
{
    use Sluggable;

    protected $table = 'subcategorias';
    protected $fillable = ['nombre','slug'];

    public function cursos(){
        return $this->hasMany('App\Curso');
    }

    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }


    public function sluggable(){
        return [
            'slug' => [
                'source' => 'nombre'
            ]
        ];
    }
}