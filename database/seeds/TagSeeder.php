<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'curso_id'=>1,
            'nombre'=>'Informática',
            'slug'=>'informatica'
        ]);
    }
}
