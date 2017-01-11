<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventaja extends Model
{
    protected $table = 'ventajas';
    protected $fillable = ['ventaja'];

    public function curso(){
        return $this->belongsTo('App\Curso');
    }
}
