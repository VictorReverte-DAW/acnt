<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('calificacion')->nullable();
            $table->text('comentario')->nullable();
            $table->unsignedBigInteger('Id_Usuario');
            $table->foreign('Id_Usuario')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
    
            $table->unsignedBigInteger('Id_Torneo');
            $table->foreign('Id_Torneo')
                    ->references('id')->on('torneos')
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
        Schema::dropIfExists('participantes');
    }
}
