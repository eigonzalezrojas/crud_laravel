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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->String('nombre', 50);
            $table->String('correo', 50);
            //creamos una llave foreanea hacia la tabla carrera
            $table->foreignId('id_carrera')->constrained('carreras')->onUpdate('cascade')->onDelete('restrict');
            //onUpdate: cuando se actualice la carrera automáticamente se actualizará en la tabla alumnos
            //onDelete: cuando se quiera eliminar un carrera, no lo dejará si la carrera fue ocupada por algún alumno
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
};
