<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_discounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('discount_id');
            $table->unsignedBigInteger('main_invoice_id');
            $table->foreign('main_invoice_id')->references('id')->on('main_invoices');
            $table->foreign('discount_id')->references('id')->on('discounts');

            // // The number of uses currently
            // $table->integer('uses')->unsigned()->nullable();

            // // The max uses this voucher has
            // $table->integer('max_uses')->unsigned()->nullable();

            // // How many times a user can use this voucher.
            // $table->integer('max_uses_user')->unsigned()->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_discounts');
    }
};
