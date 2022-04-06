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
        Schema::create('last_invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_invoice_id')->constrained();

            //for log
            $table->tinyInteger('percent_deduction')->default(0);
            $table->decimal('fix_amount_deduction', 8, 2)->default(0);

            $table->tinyInteger('percent_discount')->default(0);
            $table->decimal('fix_amount_discount', 8, 2)->default(0);

            $table->tinyInteger('percent_surcharge')->default(0);
            $table->decimal('fix_amount_surcharge', 8, 2)->default(0);

            $table->decimal('fix_amount_main_invoice', 8, 2)->default(0);
            $table->decimal('final_amount', 8, 2)->default(0);

            $table->foreign('main_invoice_id')->references('id')->on('main_invoices');

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
        Schema::dropIfExists('last_invoices');
    }
};
