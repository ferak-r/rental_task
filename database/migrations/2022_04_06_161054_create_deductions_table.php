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
        Schema::create('deductions', function (Blueprint $table) {
            $table->id();
            
            //$table->unsignedBigInteger('deduction_type_id');
            $table->tinyInteger('type')->unsigned();

            // The voucher (deduction) code
            $table->string('code')->nullable();

            $table->string('deduction_title');

            $table->boolean('is_fixed')->default(true);

            $table->tinyInteger('percent')->default(0);
            $table->decimal('fix_amount', 8, 2)->default(0);

            //- Not necessary 
            $table->string('deduction_description')->nullable();

            $table->enum('status', ['active', 'inactive'])->default('inactive');
            
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
        Schema::dropIfExists('deductions');
    }
};
