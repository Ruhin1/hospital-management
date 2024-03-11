<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDuetransitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duetransitions', function (Blueprint $table) {
            $table->id();
			$table->foreignId('patient_id');
			$table->foreignId('return_order_id')->nullable();   
			$table->foreignId('user_id');
			$table->foreignId('doctor_id')->nullable();
			
			$table->foreignId('doctorappointmenttransaction_id')->nullable();
			$table->foreignId('order_id')->nullable();
			$table->foreignId('reportorder_id')->nullable();
			$table->foreignId('surgerytransaction_id')->nullable();
			$table->foreignId('serviceorder_id')->nullable();
			$table->foreignId('cabinefeetransition_id')->nullable();
			$table->foreignId('cabinetransaction_id')->nullable();			
			
			
			
			$table->double('totalamount')->nullable();
			$table->double('amount')->nullable();
			$table->double('discountondue')->nullable()->default(0);
			$table->string('comment')->nullable();
			$table->tinyInteger('transitiontype')->nullable(); // 1-> joma ,,, 4->customer ponno ferot dicche, due komche   2->customer notun kore dute korche ba customer er due barbe 3->cutomer ke taka ferot hocche 7-customer k ponno ferot er binimoye taka ferot      
            // 5->customer advance dicche 6-> customer er due adjust hocche advance er sathe
			
			
			$table->tinyInteger('transitionproducttype')->nullable();
			
			// 1-Cabine
			// 2- Medicine 3-surgery 4-pathology 5-Doctorbill 6-service 7- bivinno 8->cole jabar somoy cash back 
			// 9-> cabineadmisson fee
			
			
			$table->tinyInteger('duepaidfor')->nullable(); // 1-> medicine 2- Patho 3- Doctotor visit 4- surgery 5- cabine 6-service 
			
			
			
			
			
			
			
			
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
        Schema::dropIfExists('duetransitions');
    }
}
