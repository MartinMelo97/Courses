<?php

use Illuminate\Database\Seeder;
use Illuminate\Databse\Eloquent\Model;
class VentajaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ventajas')->insert([
            'ventaja'=>'Te dara las bases para ser todo un hacker!',
            'curso_id'=>1
        ]);
        DB::table('ventajas')->insert([
            'ventaja'=>'Aprende uno de los lenguajes más potentes en la actualidad',
            'curso_id'=>1
        ]);
        DB::table('ventajas')->insert([
            'ventaja'=>'Tu mundo se abrirá',
            'curso_id'=>1
        ]);
        DB::table('ventajas')->insert([
            'ventaja'=>'Te olvidarás de PHP!',
            'curso_id'=>1
        ]);
    }
}
