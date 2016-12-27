<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',255);
            $table->string('duracion');
            $table->date('fecha_inicio');
            $table->string('lenguaje');
            $table->enum('nivel',['facil','intermedio','alto'])->default('facil');
            $table->boolean('gratis');
            $table->text('descripcion');
            $table->integer('calificacion');
            $table->integer('institucion_id')->unsigned();
            $table->foreign('institucion_id')->references('id')->on('instituciones')->onDelete('cascade');
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
        
        Schema::drop('cursos');
        
    }
}
