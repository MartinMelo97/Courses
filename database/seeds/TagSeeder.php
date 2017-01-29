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
            'nombre'=>'Informática',
            'slug'=>'informatica'
        ]);

        DB::table('tags')->insert([
            'nombre'=>'Fixter',
            'slug'=>'fixter'
        ]);
    }
}
