<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temario extends Model
{
    protected $table = 'temarios';
    protected $fillable = ['tema'];

    public function curso(){
        return $this->belongsTo('App\Curso');
    }
}
