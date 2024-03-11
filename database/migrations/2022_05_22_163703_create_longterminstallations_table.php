<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLongterminstallationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('longterminstallations', function (Blueprint $table) {
            $table->id();
			$table->foreignId('longterminstallerorder_id');
			$table->foreignId('patient_id')->nullable();
			$table->foreignId('user_id')->nullable();
			$table->foreignId('doctorappointmenttransaction_id')->nullable();			
			$table->foreignId('dentalservice_id')->nullable();
			
			
			$table->double('unit_price', 10, 4)->nullable();
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
        Schema::dropIfExists('longterminstallations');
    }
}
