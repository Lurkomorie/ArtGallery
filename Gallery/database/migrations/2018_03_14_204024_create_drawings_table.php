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
            $table->text('name');
            $table->text('city');
            $table->text('country');
            $table->date('date');
            $table->text('genre');
            $table->text('technology');
            $table->text('size');
            $table->boolean('status');
            $table->float('price');
            $table->boolean('removed');
            $table->date('redacted');
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
