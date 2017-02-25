<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';
    protected $fillable = ['ruta'];

    public function alumno(){
        return $this->hasOne('App\Alumno');
    }

    public function docente(){
        return $this->hasOne('App\Docente');
    }

    public function institucion(){
        return $this->hasOne('App\Institucion');
    }

    public function cursos(){
        return $this->belongsToMany('App\Imagenes')->withTimestamps();
    }
}
