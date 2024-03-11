<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurgerytransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surgerytransactions', function (Blueprint $table) {
            $table->id();
		    $table->foreignId('surgerylist_id')->nullable();
			$table->foreignId('doctor_id')->nullable(); // agent_doctor 
			$table->foreignId('doctor_commission_transition_id')->nullable();
            $table->foreignId('agentdetail_id')->nullable(); 
			$table->foreignId('agenttransaction_id')->nullable();
            $table->double('comission', 12, 2)->default('0');			
			$table->foreignId('patient_id');
			$table->foreignId('user_id');
			$table->foreignId('refdoc_id')->nullable()->references('id')->on('doctors'); // ref doctor 
			$table->foreignId('Surgeon_id')->nullable()->references('id')->on('doctors');
			$table->foreignId('Surgeontransid')->nullable();
			$table->foreignId('anesthesiologist_id')->nullable()->references('id')->on('doctors');
            $table->foreignId('anesthesiologisttransid')->nullable();
			$table->double('pre_operative_charge', 12, 2)->default('0');
			$table->double('Surgeon_charge', 12, 2)->default('0');
			$table->double('anesthesia_charge', 12, 2)->default('0');
			$table->double('assistant_charge', 12, 2)->default('0'); 
			$table->double('ot_charge', 12, 2)->default('0'); 
			$table->double('o2_no2_charge', 12, 2)->default('0');
			$table->double('c_arme_charge', 12, 2)->default('0');
			$table->double('post_operative_charge', 12, 2)->default('0');
			$table->double('miscellaneous_expenses', 12, 2)->default('0')->nullable();
			$table->double('surgeon_fees', 12, 2)->default('0')->nullable();
			$table->double('anesthesiologist_fees', 12, 2)->nullable();
	        $table->string('remark')->nullable();		
			
			$table->date('surgerydate')->nullable();
			$table->double('due',12,2)->default('0');
			$table->double('commission',12,2)->default('0')->nullable();	
			$table->double('pay_in_cash',12,2)->default('0');	
				
			//$table->double('vat_by_percentage', 10, 4)->nullable();
			$table->double('totalvat', 14, 4)->default(0);

			//$table->double('discount_by_percentage', 10, 4)->default(0);
			$table->double('totaldiscount', 14, 4)->default(0);  
 			$table->double('total_cost_before_initial_vat_and_discount', 14, 2)->nullable();          			
			$table->double('total_cost_after_initial_vat_and_discount', 14, 2);
			$table->double('adjust_with_advance', 14, 2)->nullable(); 	
			
		
			
			
			
			
			
			
			
			
			
			
			
			
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
        Schema::dropIfExists('surgerytransactions');
    }
}
