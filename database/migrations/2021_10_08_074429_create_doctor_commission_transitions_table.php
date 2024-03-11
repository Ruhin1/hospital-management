<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorCommissionTransitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_commission_transitions', function (Blueprint $table) {
            $table->id();
			
			$table->foreignId('doctor_id');
			$table->foreignId('user_id');
			$table->foreignId('patient_id')->nullable();
			$table->double('collection')->nullable();
			$table->double('discount')->nullable();			
			
			$table->double('receiveablecollection')->nullable();			
			
			$table->double('amount');
			
			
			$table->string('comment')->nullable();
			
			$table->tinyInteger('transitiontype')->default('1'); // 1 -> Doctor commosion for pathology , 3->doctor Commission for surgery 4->for cabine 5-> patient release hole. 2->outdoor er share for outddor 7->SURGEON fees 6-> aNASTHOLOGIST fess  8- ultra-sono 9-xray 
          $table->tinyInteger('paidorunpaid')->default(0);  //0->unpaid 1->unpaid
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
        Schema::dropIfExists('doctor_commission_transitions');
    }
}
