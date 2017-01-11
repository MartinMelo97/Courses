<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Docentes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('docentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',140);
            $table->string('apellidos',140);
            $table->string('grado_estudio',140);
            $table->string('email')->unique();
            $table->string('usuario',140);
            $table->string('password');
            $table->integer('institucion_id')->unsigned();
            $table->foreign('institucion_id')->references('id')->on('instituciones')->onDelete('cascade');
            $table->string('imagen')->nullable();   
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
        
        Schema::drop('docentes');
        
    }
}
