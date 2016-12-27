<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentarios';
    protected $fillable = ['comentario'];

    public function curso(){
        return $this->belongsTo('App\Curso');
    }

    public function alumno(){
        return $this->belongsTo('App\Alumno');
    }
}
