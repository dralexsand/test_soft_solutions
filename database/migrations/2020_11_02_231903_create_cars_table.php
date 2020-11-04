<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->bigInteger('brand_id');
            $table->bigInteger('model_id');
            $table->year('car_created_year');
            $table->string('car_number');
            $table->bigInteger('color_id');
            $table->integer('transmission_id');
            $table->unsignedFloat('price_per_day', 10, 2);
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
        Schema::dropIfExists('cars');
    }
}
