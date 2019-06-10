<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dni',9)->unique();
            $table->string('nick')->unique();
            $table->string('name');
            $table->string('apellido');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('provincia');
            $table->string('localidad');
            $table->string('cp');
            $table->integer('telefono');
            $table->date('fnac');
            $table->boolean('esMiembro')->default(false);
            $table->unsignedBigInteger('id_rol')->default(6);
            $table->foreign('id_rol')
                ->references('id')->on('rols')
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
        Schema::dropIfExists('users');
    }
}
