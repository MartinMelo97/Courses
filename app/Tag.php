<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Tag extends Model
{
    use Sluggable;

    protected $table = "tags";

    protected $fillabe = ["nombre"];

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
