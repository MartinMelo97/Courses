<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Notifications\UserAlumnoResetPasswordNotification;
class Alumno extends User
{

    protected $table = 'alumnos';
    protected $fillable = ['nombre','apellidos','usuario','email','sexo','imagen','pais','fecha_nacimiento','password'];
    protected $hidden = ['password', 'remember_token'];
 
    public function cursos(){
        return $this->belongsToMany('App\Curso')->withTimestamps();
    }

    public function comentarios(){
        return $this->hasMany('App\Comentario');
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserAlumnoResetPasswordNotification($token));
    }  

}
