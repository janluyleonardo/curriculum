<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id('id');
            $table->string('dateOfBirth');
            $table->string('Photo');
            $table->string('name');
            $table->string('document');
            $table->string('phone');
            $table->string('city');
            $table->string('department');
            $table->string('locality');
            $table->string('address');
            $table->string('barrio');
            $table->longText('personalProfile');
            $table->string('social_media_links');
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
        Schema::dropIfExists('abouts');
    }
}
