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
        Schema::create('main_invoices', function (Blueprint $table) {
            //According to the Task let's suppose privacy of company is any invoice has one car rental. so it doesn t need to invoice item for any car.
            $table->id();
            $table->string('invoice_number');//code

            $table->unsignedBigInteger('customer_id')->constrained()->nullable();
            //customer info log
            $table->string('customer_first_name');
            $table->string('customer_last_name');
            $table->enum('customer_gender',['female','male']);
            $table->string('customer_national_no');
            $table->string('customer_username');
            $table->string('customer_tell');
            $table->string('customer_mobile');
            $table->text('customer_address');

            $table->unsignedBigInteger('car_owner_id');
            
            //car info
            $table->integer('car_model_year');
            $table->string('car_brand', 25);
            $table->string('color', 15);

            // in invoice not need log a lot of info about car owner
            $table->string('owner_first_name');
            $table->string('owner_last_name');

            $table->unsignedBigInteger('tax_id');
            $table->unsignedBigInteger('payment_id');
            //payment info log
            $table->unsignedBigInteger('payment_method_id');
            $table->decimal('price', 8, 2);//according to task fix amount
            $table->decimal('total_final_price', 8, 2);//according to task fix amount (if has tax)
            $table->dateTime('payment_time');
            $table->unsignedBigInteger('currency_id');
     
            //invoice info log
            $table->date('due_date');
            $table->dateTime('reserved_time');

            $table->enum('status_type', ['reserved','completed', 'failed', 'expired_time', 'paid', 'canceled', 'deleted']);//if imposible it will be change, we should have statuses table so this field changed to status_id


            $table->text('comment')->nullable();

            $table->date('created_date');
            $table->date('delivery_date');

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('car_owner_id')->references('id')->on('car_owners');
            $table->foreign('payment_id')->references('id')->on('payments');
            $table->foreign('tax_id')->references('id')->on('taxes');


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
        Schema::dropIfExists('main_invoices');
    }
};
