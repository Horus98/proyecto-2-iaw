<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAuto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id('id');
            $table->timestamps();
            $table->string('marca');
            $table->string('modelo');
            $table->text('descripcion');
            $table->integer('anio');
            $table->integer('precio');
            $table->integer('kilometros');
            $table->boolean('vendido');
            $table->longText('imagen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
