<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductcompanyordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productcompanyorders', function (Blueprint $table) {
            $table->id();
			
		
			$table->foreignId('medicinecomapnyname_id');
			$table->foreignId('user_id');
			$table->double('amount')->default(0);
				$table->double('discount')->default(0);
			$table->double('amountafterdiscount')->default(0);
			$table->integer('serialno')->nullable();
			$table->string('comment')->nullable();
			$table->double('debit')->default(0);
			$table->double('credit')->default(0);
			$table->double('balance')->default(0); 
			$table->tinyInteger('type')->default('1');  // 1-product kroy  2- due payment 3-product ferot  4-product ferot babod company theke   money back neya 5-delete entry 10-reverse entry  11-reverse due enry 12-deleted due entry
           
			
			
			
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
        Schema::dropIfExists('productcompanyorders');
    }
}
