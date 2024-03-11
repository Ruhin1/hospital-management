<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientfinalhisabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patientfinalhisabs', function (Blueprint $table) {
            $table->id();
			 $table->foreignId('user_id');
			 $table->foreignId('patient_id');
			 $table->double('gross_amount',14,2)->nullable();
             $table->double('receiveable_amount',14,2)->nullable();		
			 $table->double('total_discount',14,2)->nullable();	
			 $table->double('total_due',14,2)->nullable();	
			 $table->double('refund',14,2)->nullable();	
			  $table->double('total_Commission',14,2)->nullable();
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
        Schema::dropIfExists('patientfinalhisabs');
    }
}
