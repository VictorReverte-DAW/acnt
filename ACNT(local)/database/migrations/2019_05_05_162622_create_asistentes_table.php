<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsistentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('Id_Usuario')->nullable();
            $table->foreign('Id_Usuario')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
        
            $table->unsignedBigInteger('id_Reunion')->nullable();
            $table->foreign('id_Reunion')
                    ->references('id')->on('reunions')
                    ->onDelete('cascade'); 
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
        Schema::dropIfExists('esta_reunion');
    }
}
