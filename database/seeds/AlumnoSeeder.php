<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alumnos')->insert([
            'nombre'=>'Martín',
            'apellidos'=>'Melo Godínez',
            'email'=>'nitram-210397@hotmail.com',
            'sexo'=>'masculino',
            'imagen'=>'https://i.ytimg.com/vi/WfJnFFQULis/hqdefault.jpg',
            'pais'=>'México',
            'fecha_nacimiento'=>'1997-03-21',
            'usuario'=>'MartinMelo97',
            'password'=>bcrypt('cbtis2014$')
        ]);
    }
}
