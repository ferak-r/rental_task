<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
           $table->id();
            $table->unsignedBigInteger('car_owner_id');
            $table->unsignedBigInteger('customer_id');
            $table->date('rental_date');
            $table->timestamp('rental_time')->useCurrentOnUpdate()->useCurrent();
            $table->date('return_date');
            $table->integer('rental_status');

            $table->index(['car_owner_id', 'customer_id']);
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('car_owner_id')->references('id')->on('car_owners');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rentals');
    }
}
