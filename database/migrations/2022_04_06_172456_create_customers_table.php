<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('national_code', 50);
            $table->text('address');
            $table->enum('customer_gender',['female','male']);
            $table->string('tell', 11);
            $table->string('mobile', 11);
            $table->binary('profile_image');
            $table->integer('user_id');
            $table->integer('account_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
