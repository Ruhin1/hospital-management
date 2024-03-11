<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serviceorders', function (Blueprint $table) {
            $table->id();
 
			$table->foreignId('patient_id');
				$table->foreignId('user_id');
				
						$table->foreignId('doctor_id')->nullable(); // agent doctor doctor_commission_transitions
			$table->foreignId('doctor_commission_transition_id')->nullable();
			$table->integer('discountrefernceid')->nullable();
			$table->foreignId('agentdetail_id')->nullable();
			$table->foreignId('agenttransaction_id')->nullable();
			$table->foreignId('refdoctor_id')->nullable();	
		$table->text('remark')->nullable();
				
				
					$table->double('refundamount', 10, 2)->default(0);
			$table->foreignId('refundbyuser_id')->nullable();
            $table->date('refunddate')->nullable();	
$table->integer('refundbyuser')->nullable();		
				
				$table->tinyInteger('status')->default('0'); // 0->not delivered , 1-delivered 
            $table->tinyInteger('refund')->default('0');	// 0-> not refund 				
				
				
				
				
			$table->double('total', 12, 2); // gross amount
			$table->double('discount', 12, 2)->nullable();
			$table->double('receiveableamount', 12, 2)->nullable();
			
				$table->double('paid', 12, 2);
					$table->double('due_adjust_from_advance', 12, 2);
					$table->double('due', 12, 2);
					$table->double('commission', 12, 2)->nullable();
					
					
					
					
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
        Schema::dropIfExists('serviceorders');
    }
}
