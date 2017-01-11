<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('docentes')->insert([
            'nombre'=>'Guadalupe',
            'apellidos'=>'Ángeles Mata',
            'grado_estudio'=>'Mtra. en Seguridad Informática',
            'email'=>'gamby@cbtis83.com',
            'usuario'=>'GambyMata',
            'password'=>bcrypt('cbtis2014$'),
            'institucion_id'=>1
        ]);
    }
}
