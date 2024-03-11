<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLongterminstallerordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('longterminstallerorders', function (Blueprint $table) {
            $table->id();
			

			$table->foreignId('patient_id')->nullable();
			$table->foreignId('user_id')->nullable();
			$table->foreignId('doctorappointmenttransaction_id')->nullable();			
			$table->foreignId('agentdetail_id')->nullable();
			$table->foreignId('doctor_id')->nullable();			
			
			
				   $table->string('Code')->nullable();		
						$table->tinyInteger('flag')->default('0'); // 0  not finished, 1 - finished
	
						$table->double('gross_amount', 10, 4)->nullable();
			$table->double('totaldiscount', 10, 4);    
			$table->double('receiveable_amount', 10, 4);
			
			
			
			
			
			
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
        Schema::dropIfExists('longterminstallerorders');
    }
}
