<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;
use App\Notifications\UserDocenteResetPasswordNotification;
class Docente extends User
{
    protected $table = 'docentes';
    protected $fillable = ['nombre','apellidos','usuario','grado_estudio','email','imagen','password'];
    protected $hidden = ['password','remember_token'];

    public function institucion(){
        return $this->belongsTo('App\Institucion');
    }

    public function cursos(){
        return $this->belongsToMany('App\Curso')->withTimestamps();
    }
    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserDocenteResetPasswordNotification($token));
    }

}