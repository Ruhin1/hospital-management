<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReporttransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporttransactions', function (Blueprint $table) {
            $table->id();
					$table->foreignId('reportlist_id');
		    
			$table->unsignedInteger('reportorder_id');
			$table->foreign('reportorder_id')->references('id')->on('reportorders')->onDelete('cascade');			
			
	$table->integer('serialnumber')->nullable();

$table->foreignId('patient_id')->nullable();
			
			//$table->foreignId('reportorder_id');
			$table->foreignId('doctor_id')->nullable();
			$table->double('unit', 10, 4);
			$table->double('vat', 10, 4)->nullable();
			$table->double('totalvat', 10, 4);
			$table->double('unitprice', 10, 4)->nullable();
			
			
			$table->double('discount', 10, 4)->nullable();
			$table->double('totaldiscount', 10, 4);    
			$table->double('amount', 10, 4);
			$table->double('adjust', 10, 4)->nullable();
			
			
			
			
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
        Schema::dropIfExists('reporttransactions');
    }
}
