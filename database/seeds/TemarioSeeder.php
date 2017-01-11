<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class TemarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('temarios')->insert([
            'tema'=>'Sintaxis básica',
            'curso_id'=>1
        ]);
        DB::table('temarios')->insert([
            'tema'=>'Manipulacion de strings',
            'curso_id'=>1
        ]);
        DB::table('temarios')->insert([
            'tema'=>'Trabajar con datos introducidos',
            'curso_id'=>1
        ]);
        DB::table('temarios')->insert([
            'tema'=>'If-Else',
            'curso_id'=>1
        ]);
        DB::table('temarios')->insert([
            'tema'=>'Ciclos - bucles',
            'curso_id'=>1
        ]);
        DB::table('temarios')->insert([
            'tema'=>'Llaves',
            'curso_id'=>1
        ]);
        DB::table('temarios')->insert([
            'tema'=>'Diccionarios',
            'curso_id'=>1
        ]);
        DB::table('temarios')->insert([
            'tema'=>'NumPy',
            'curso_id'=>2,
        ]);
        DB::table('temarios')->insert([
            'tema'=>'MatPlotLib',
            'curso_id'=>2,
        ]);
    }
}
