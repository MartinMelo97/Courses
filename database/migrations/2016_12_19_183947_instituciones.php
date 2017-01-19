<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Instituciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('instituciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',140);
            $table->string('email',140)->unique();
            $table->string('telefono')->unique();
            $table->string('codigo_postal');
            $table->string('pais');
            $table->string('estado');
            $table->string('municipio');
            $table->string('direccion');
            $table->enum('membresia',['gratuita','extraordinaria','premium'])->default('gratuita');
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('google')->nullable();
            $table->string('pagina_web')->nullable();
            $table->string('imagen')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
            
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::drop('instituciones');
        
    }
}
