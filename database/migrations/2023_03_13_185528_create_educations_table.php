<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Columna para la clave foránea
            $table->string('degree'); // Título o grado obtenido
            $table->string('institution'); // Nombre de la institución
            $table->date('startDate'); // Fecha de inicio
            $table->date('endDate')->nullable(); // Fecha de finalización, puede ser nulo
            $table->text('description')->nullable(); // Descripción, puede ser nulo
            $table->timestamps(); // created_at y updated_at

            // Definir la clave foránea
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('educations');
    }
}
