<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Tag extends Model
{
    use Sluggable;

    protected $table = "tags";

    protected $fillabe = ["nombre"];

    public function curso(){
        return $this->belongsTo('App\Curso'); 
    }

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'nombre'
            ]
        ];
    }
}
