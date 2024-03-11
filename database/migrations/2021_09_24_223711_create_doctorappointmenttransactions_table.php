<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorappointmenttransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctorappointmenttransactions', function (Blueprint $table) {
            $table->id();
			$table->foreignId('doctor_id');
			$table->foreignId('patient_id');
			$table->foreignId('user_id');
			$table->foreignId('agentdetail_id')->nullable();
			
			
			$table->date('date');
			$table->integer('serialno')->nullable();
			$table->double('grossamount')->nullable();
			$table->double('fees')->nullable(); // paid
			$table->double('nogod')->nullable();// paid -> dutai paid , asole emon obostha hoyeche je //vul kore ekhon duita kei deya lagche paid hisabe 
			$table->double('due')->nullable();
			$table->double('adjust_with_advance')->nullable();			
			
			$table->tinyInteger('cancel_serial_no')->default('0');
			$table->tinyInteger('doctoroncallforadmittedpartient')->default('0');
			$table->tinyInteger('absent')->default('0');

			
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
        Schema::dropIfExists('doctorappointmenttransactions');
    }
}
