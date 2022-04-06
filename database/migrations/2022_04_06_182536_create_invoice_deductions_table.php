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
        Schema::create('invoice_deductions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('deduction_id');
            $table->unsignedBigInteger('main_invoice_id');
            $table->foreign('main_invoice_id')->references('id')->on('main_invoices');
            $table->foreign('deduction_id')->references('id')->on('deductions');

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
        Schema::dropIfExists('invoice_deductions');
    }
};
