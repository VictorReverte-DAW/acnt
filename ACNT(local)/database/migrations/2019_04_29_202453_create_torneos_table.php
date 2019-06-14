<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTorneosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torneos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('imagen');
            $table->integer('max_jugadores');
            $table->string('estado');
            $table->date('fecha');
            $table->string('hora');
            $table->boolean('gratis');
            $table->double('precio')->nullable();
            
            $table->unsignedBigInteger('id_juego');
            $table->foreign('id_juego')
                    ->references('id')->on('juegos')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('torneos');
    }
}
