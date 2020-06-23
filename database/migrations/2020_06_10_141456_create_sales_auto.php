<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesAuto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_auto', function (Blueprint $table) {
            $table->id('id');
            $table->timestamps();
            $table->string('empleado');
            $table->date('fecha');
            $table->bigInteger('auto');
            $table->foreign('auto')->references('id')->on('cars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_auto');
    }
}
