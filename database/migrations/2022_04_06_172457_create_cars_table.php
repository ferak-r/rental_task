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
            $table->unsignedBigInteger('owner_id')->index();
            $table->string('car_name', 30);
            $table->string('description', 100);
            $table->integer('car_model_year');
            $table->string('car_brand', 25);
            $table->string('color', 15);
            $table->integer('capacity');
            $table->string('plate_number', 11);
            $table->float('rate', 10, 0);
            $table->integer('status');
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
