<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class InstitucionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instituciones')->insert([
            'nombre'=>'CBTis 83',
            'email'=>'cbtis83@edu.mx',
            'telefono'=>'7727270580',
            'codigo_postal'=>42500,
            'pais'=>'México',
            'estado'=>'Hidalgo',
            'municipio'=>'Actopan',
            'direccion'=>'Calle Heróico Colegio Milital Esq. Lic. Verdad',
            'facebook'=>'https://www.facebook.com/Cbtis83.Vinc',
            'twitter'=>'https://twitter.com/@cbtis83vinc',
            'pagina_web'=>'http://www.cbtis83.edu.mx/index.html',
            'imagen'=>'http://www.cbtis83.edu.mx/imagenes/Cbtis83.jpg'
        ]);
    }
}
