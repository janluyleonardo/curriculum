<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId'); // Columna para la clave foránea
            $table->string('degree'); // Título o grado obtenido
            $table->string('institution'); // Nombre de la institución
            $table->date('startDate'); // Fecha de inicio
            $table->date('endDate')->nullable(); // Fecha de finalización, puede ser nulo
            $table->text('description')->nullable(); // Descripción, puede ser nulo
            $table->timestamps(); // created_at y updated_at

            // Definir la clave foránea
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education');
    }
}
