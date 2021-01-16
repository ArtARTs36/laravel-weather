<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeatherDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather_days', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('date');
            $table->integer('temperature');
            $table->integer('pressure');
            $table->integer('wind');
            $table->string('cloudy');

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
        Schema::dropIfExists('weather_days');
    }
}
