<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Esta creación es de manera POO
        // Cambiamos Schema::table por Schema::create porque o sino sale un mensaje de que la tabla no existe.
        /* Schema::create('usuarios', function (Blueprint $table) {
            // Definimos aca nuestras columnas
            $table->increments('id');
            $table->string('nombre', 255);
            $table->string('email', 255);
            $table->string('passwrod', 255);
            $table->integer('edad');
            $table->integer('sueldo');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        }); */

        // Esta creación es de manera SQL
        DB::statement("
            CREATE TABLE usuarios(
            id int(255) auto_increment not null,
            nombre varchar(255),
            email varchar(255),
            password varchar(255),
            PRIMARY KEY(id)
        );");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::table('usuarios', function (Blueprint $table) {
            //
        //});
        // Esto em permite borrar la tabla
        Schema::drop('usuarios');
    }
};
