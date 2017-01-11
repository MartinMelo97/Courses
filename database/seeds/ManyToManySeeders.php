<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class ManyToManySeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Hacemos una relación many 2 many en la tabla curso-docente
        DB::table('curso_docente')->insert([
            'curso_id'=>1,
            'docente_id'=>1
        ]);

        //Hacemos una relación many 2 many en la tabla alumno-curso
        DB::table('alumno_curso')->insert([
            'alumno_id'=>1,
            'curso_id'=>1
        ]);

        //Hacemos una relación many 2 many en la tabla categoria-curso
        DB::table('categoria_curso')->insert([
            'categoria_id'=>1,
            'curso_id'=>1,
            'porcentaje'=>100
        ]);

        DB::table('categoria_curso')->insert([
            'categoria_id'=>1,
            'curso_id'=>3,
            'porcentaje'=>100
        ]);

        DB::table('categoria_curso')->insert([
            'categoria_id'=>1,
            'curso_id'=>2,
            'porcentaje'=>100
        ]);

    }
}
