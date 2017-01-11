<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'nombre'=>'Programación',
            'slug'=>'programacion'
        ]);
    }
}
