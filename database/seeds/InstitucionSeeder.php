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
            'membresia'=>'gratuita',
            'direccion'=>'Calle Heróico Colegio Milital Esq. Lic. Verdad',
            'facebook'=>'https://www.facebook.com/Cbtis83.Vinc',
            'twitter'=>'https://twitter.com/@cbtis83vinc',
            'pagina_web'=>'http://www.cbtis83.edu.mx/index.html',
            'imagen'=>'http://www.cbtis83.edu.mx/imagenes/Cbtis83.jpg'
        ]);

        DB::table('instituciones')->insert([
            'nombre'=>'UPIITA',
            'email'=>'upiita@ipn.mx',
            'telefono'=>'5554321212',
            'codigo_postal'=>07340,
            'pais'=>'México',
            'estado'=>'Ciudad de México',
            'membresia'=>'extraordinaria',
            'municipio'=>'Gustavo A. Madero',
            'direccion'=>'Avenida Instituto Politécnico Nacional No. 2580, Col. Barrio la Laguna Ticomán',
            'facebook'=>'https://www.facebook.com/sseis.upiita?',
            'twitter'=>'https://twitter.com/upiita_ipn',
            'google'=>'upiita@gmail.com',
            'pagina_web'=>'https://www.upiita.ipn.mx/',
            'imagen'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/UPIITA-IPN_Logo.jpg/245px-UPIITA-IPN_Logo.jpg'
        ]);

        DB::table('instituciones')->insert([
            'nombre'=>'Instituto Tecnológico de Estudios Superiores de Monterrey',
            'email'=>'contacto@itesm.com.mx',
            'telefono'=>'8811234567',
            'codigo_postal'=>12345,
            'pais'=>'México',
            'estado'=>'Nuevo León',
            'membresia'=>'premium',
            'municipio'=>'Monterrey',
            'direccion'=>'Av. Eugenio Garza Sada No. 2501 Sur, Col. Tecnológico',
            'facebook'=>'https://www.facebook.com/tecdemty/?rf=114775005201526',
            'twitter'=>'https://twitter.com/TecdeMonterrey',
            'google'=>'mail.itesm.mx',
            'pagina_web'=>'http://www.tec.mx/',
            'imagen'=>'https://pbs.twimg.com/profile_images/701763580983537664/jTw8HJIX.png'
        ]);
    }
}
