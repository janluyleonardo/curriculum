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
            $table->id('id_about');
            $table->string('id_user');
            $table->string('name');
            $table->string('lastname');
            $table->string('address');
            $table->string('neighborhood');
            $table->string('locality');
            $table->string('phone_number');
            $table->string('email');
            $table->longText('profile');
            $table->string('linkedin_address');
            $table->string('github_address');
            $table->string('twitter_address');
            $table->string('facebook_address');
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
