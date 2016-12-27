<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Alumnos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',140);
            $table->string('apellidos',140);
            $table->string('email')->unique();
            $table->enum('sexo',['masculino','femenino']);
            $table->string('imagen');
            $table->string('pais');
            $table->date('fecha_nacimiento');
            $table->string('usuario',140)->unique();
            $table->string('password');
            $table->string('slug')->nullable();
            $table->rememberToken();
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
        
        Schema::drop('alumnos');
        
    }
}
