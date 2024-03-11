<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnmedicinetransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returnmedicinetransactions', function (Blueprint $table) {
            $table->id();
			
			$table->foreignId('medicine_id');
		
			$table->foreignId('return_order_id');
			$table->foreignId('user_id')->nullable();
			$table->foreignId('patient_id')->nullable();
			$table->double('unit', 14, 4);
			$table->double('vat', 14, 4)->nullable();
			$table->double('totalvat', 14, 4);
			
			
			
			$table->double('discount', 14, 4)->nullable();
			$table->double('totaldiscount', 10, 4);    
			$table->double('amount', 14, 4);
			$table->double('adjust', 14, 4)->nullable();
		
			
			
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('returnmedicinetransactions');
    }
}
