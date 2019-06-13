<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuotas', function (Blueprint $table) {
            $table->date('fecha_pago');
            $table->date('mes_pagados');
            $table->integer('total');
            $table->unsignedBigInteger('id_Usuario')->nullable();
            $table->foreign('id_Usuario')
                    ->references('id')->on('users')
                    ->onDelete('cascade'); 
            $table->primary('id_Usuario');
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
        Schema::dropIfExists('cuotas');
    }
}
