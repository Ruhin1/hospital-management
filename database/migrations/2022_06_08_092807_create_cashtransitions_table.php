<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashtransitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashtransitions', function (Blueprint $table) {
            $table->id();
			
			$table->foreignId('patient_id')->nullable();
			$table->foreignId('user_id');
			
			$table->foreignId('doctor_id')->nullable();
			$table->foreignId('supplier_id')->nullable();
			$table->foreignId('pathologyorderfromotherinsitute_id')->nullable();				
			$table->foreignId('doctorappointmenttransaction_id')->nullable();
			$table->foreignId('order_id')->nullable();
			$table->foreignId('reportorder_id')->nullable();
			$table->foreignId('surgerytransaction_id')->nullable();
			$table->foreignId('serviceorder_id')->nullable();
			$table->foreignId('cabinefeetransition_id')->nullable();
			$table->foreignId('cabinetransaction_id')->nullable();
			$table->foreignId('khoroch_transition_id')->nullable();			
			$table->foreignId('dhar_shod_othoba_advance_er_mal_buje_pawa_id')->nullable();				
			
			
$table->foreignId('Taka_uttolon_transition_id')->nullable();			
	$table->foreignId('return_order_id')->nullable();		
	$table->foreignId('employeesalarytransaction_id')->nullable();			
			
				$table->foreignId('duetransition_id')->nullable();		
$table->foreignId('longterminstallerorder_id')->nullable();
$table->foreignId('agenttransaction_id')->nullable();

$table->foreignId('doctorCommissionTransition_id')->nullable();
$table->foreignId('medicinecompanyorder_id')->nullable();
$table->foreignId('medicine_comapnyer_dena_pawan_shod_id')->nullable();
		    $table->tinyInteger('company_type')->nullable();  // 1-> deposit 2->withdrawl  // 3-> neither deu decarese for //return medicine
					
					
			$table->tinyInteger('customer_type')->nullable();	 // 1 -> cash paid for product sale , 2-> due/ advance //payment 3-> //due  4->refund
					

			$table->tinyInteger('transitionproducttype')->nullable();
			
			// 1-Cabine
			// 2- Medicine 3-surgery 4-pathology 5-Doctorbill 6-service 7- bivinno 8->cole jabar somoy cash back 
			// 9-> cabineadmisson fee 10->deposit  11-  installment 12-> owners withdrawl and deposit 13-> khoroch Transition
			// 14-> supplier due payment 15->salary payemnt 16-> agent commission 17->doctor Commisiion 18- medicine kroy //19-> medicie company duepayemt
				$table->double('gorssamount')->nullable();
			$table->double('discount')->nullable();
			$table->double('advance_deposit_minus')->nullable();						
			$table->double('amount_after_discount')->nullable();			
			$table->double('deposit')->default(0);
			$table->double('withdrwal')->default(0);
			$table->double('debit')->nullable();
			$table->double('credit')->nullable();
				$table->double('customer_joma')->nullable();
					$table->double('customer_baki')->nullable();
			$table->text('description')->nullable();			
			
			
			
			
			
			
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
        Schema::dropIfExists('cashtransitions');
    }
}
