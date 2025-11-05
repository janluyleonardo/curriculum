<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con el usuario
            $table->string('name'); // Nombre del interés (ej: "Fútbol", "Fotografía")
            $table->text('description')->nullable(); // Descripción opcional
            $table->string('category_id')->nullable(); // Categoría (ej: "Deportes", "Arte")
            $table->string('dedication_level')->nullable(); // Nivel de dedicación
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
        Schema::dropIfExists('interests');
    }
}
