<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->insert([
            'nombre'=>'Introduccion a la programación con Python',
            'duracion'=>'6 semanas',
            'fecha_inicio'=>'2017-03-01',
            'lenguaje'=>'Español',
            'nivel'=>'facil',
            'membresia'=>'gratuita',
            'bloqueo'=>'correo',
            'descripcion'=>'Este curso te permitirá aprender las bases de la programación con el lenguaje moderno más potente y rápido',
            'media'=>'http://metinsaylan.com/wp-content/uploads/2016/03/Python_logo.png',
            'slug'=>'introduccion-a-la-programacion-con-python',
            'institucion_id'=>1
        ]);


        DB::table('cursos')->insert([
            'nombre'=>'Aplicaciones científicas con NumPy y MatPlotLib',
            'duracion'=>'10 semanas',
            'fecha_inicio'=>'2017-07-10',
            'lenguaje'=>'Español',
            'nivel'=>'intermedio',
            'membresia'=>'extraordinaria',
            'bloqueo'=>'social',
            'descripcion'=>'Este curso te permitirá emular el funcionamiento de MATLAB con Python',
            'media'=>'https://bids.berkeley.edu/sites/default/files/styles/400x225/public/projects/numpy_project_page.jpg?itok=flrdydei',
            'slug'=>'aplicaciones-cientificas-con-numpy-y-matplotlib',
            'institucion_id'=>1
        ]);

        DB::table('cursos')->insert([
            'nombre'=>'Desarrollo de aplicaciones de escritorio con lenguaje ensamblador',
            'duracion'=>'150 horas',
            'fecha_inicio'=>'2017-03-11',
            'lenguaje'=>'Inglés',
            'nivel'=>'alto',
            'membresia'=>'premium',
            'bloqueo'=>'login',
            'descripcion'=>'Insane',
            'media'=>'https://www.youtube.com/embed/BNUYaLWdR04',
            'slug'=>'desarrollo-de-aplicaciones-de-escritorio-con-lenguaje-ensamblador',
            'institucion_id'=>1
        ]);
    }
}
