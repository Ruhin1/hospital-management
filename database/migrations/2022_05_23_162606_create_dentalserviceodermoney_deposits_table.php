<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDentalserviceodermoneyDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dentalserviceodermoney_deposits', function (Blueprint $table) {
            $table->id();
	$table->foreignId('patient_id')->nullable();
			$table->foreignId('user_id')->nullable();
			$table->foreignId('longterminstallerorder_id')->nullable();	
			$table->foreignId('doctor_id')->nullable();
			$table->foreignId('agentdetail_id')->nullable();
			$table->foreignId('doctorappointmenttransaction_id')->nullable();
$table->double('total_amount', 10, 4)->nullable();		
$table->double('discount', 10, 4)->nullable();		
			$table->double('amount', 10, 4)->nullable();
						$table->double('pay_by_advance', 10, 4)->nullable();
		   $table->string('code')->nullable();					
			
			
			
			
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
        Schema::dropIfExists('dentalserviceodermoney_deposits');
    }
}
