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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();

            //it can be a table when dynamic type or enum for example: not weekend, etc or type id read from config
            //$table->unsignedBigInteger('discount_type_id');

            $table->tinyInteger('type')->unsigned();

            // The voucher (discount) code
            $table->string('code')->nullable();

            $table->string('discount_title')->nullable();

            $table->decimal('min_limit_price')->nullable();
            $table->decimal('max_limit_price')->nullable();

            $table->boolean('is_fixed')->default(true);

            $table->tinyInteger('percent')->default(0);
            $table->decimal('fix_amount', 8, 2)->default(0);

            //- Not necessary 
            $table->string('discount_description')->nullable();


            $table->date('starts_at');
            $table->date('expires_at');

            $table->enum('status', ['active', 'inactive'])->default('inactive');
            
 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts');
    }
};
