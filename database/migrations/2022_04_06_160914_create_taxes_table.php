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
        Schema::create('taxes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tax_type_id');

            $table->string('tax_title')->nullable();

            $table->decimal('min_limit_price')->nullable();
            $table->decimal('max_limit_price')->nullable();

            $table->boolean('is_fixed')->default( true );

            $table->tinyInteger('percent')->default(0);
            $table->tinyInteger('fix_amount')->default(0);

            //- Not necessary 
            $table->string('tax_description')->nullable();

            $table->tinyInteger('type')->unsigned( );


            $table->date('starts_at');
            $table->date('expires_at');

            $table->enum('status', ['active', 'inactive']);
            
            $table->timestamps();
            
            $table->softDeletes( );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxes');
    }
};
