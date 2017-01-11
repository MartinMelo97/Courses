<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class ComentarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comentarios')->insert([
            'comentario'=>'Gran curso, todo entendible. Recomendado +10 lince',
            'curso_id'=>1,
            'alumno_id'=>1
        ]);
    }
}
