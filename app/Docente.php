<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;
use App\Notifications\UserDocenteResetPasswordNotification;
use Cviebrock\EloquentSluggable\Sluggable;
class Docente extends User
{
    use Sluggable;
    protected $table = 'docentes';
    protected $fillable = ['nombre','usuario','grado_estudio','email','password'];
    protected $hidden = ['password','remember_token'];

    public function institucion(){
        return $this->belongsTo('App\Institucion');
    }

    public function cursos(){
        return $this->belongsToMany('App\Cursos')->withTimestamps();
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

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'nombre'
            ]
        ];
    }
}