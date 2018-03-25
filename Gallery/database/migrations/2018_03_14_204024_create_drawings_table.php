<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrawingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drawings', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('artistId')->default(1);
            $table->string('picture'); //picture path
            $table->string('title');
            $table->string('city');
            $table->string('country');
            $table->string('date');
            $table->string('genre');
            $table->string('technology');
            $table->string('size');
            $table->string('status');
            $table->bigInteger('price');
            $table->boolean('removed')->default(false);
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
        Schema::dropIfExists('drawings');
    }
}
