<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportorders', function (Blueprint $table) {
            $table->increments('id');
			$table->foreignId('user_id');
			$table->foreignId('doctor_id')->nullable(); // agent doctor doctor_commission_transitions
			$table->foreignId('doctor_commission_transition_id')->nullable();
			$table->integer('discountrefernceid')->nullable();
			$table->foreignId('agentdetail_id')->nullable();
			$table->foreignId('agenttransaction_id')->nullable();
			$table->foreignId('refdoctor_id')->nullable();	
			$table->foreignId('patient_id');
			$table->double('commission', 10, 2)->default(0);
			$table->double('due', 10, 2)->nullable();
			$table->double('pay_in_cash', 10, 2);
			$table->double('pay_by_adv', 10, 2)->nullable();
			
			$table->double('totalbeforediscount', 10, 2)->nullable();
			$table->double('total', 10, 2);
			$table->double('discount', 10, 2)->default(0);
			$table->double('refundamount', 10, 2)->default(0);
			$table->foreignId('refundbyuser_id')->nullable();
            $table->date('refunddate')->nullable();	
$table->integer('refundbyuser')->nullable();


			$table->double('specialconsessionamount', 10, 2)->default(0);
			$table->foreignId('specialconsessionbyuser')->nullable();
            $table->date('specialconsessiondate')->nullable();	
            $table->tinyInteger('specialconsession')->default('0');  // 0 no special consession,  1 yes special consession 
			$table->text('remark')->nullable();
			
			$table->date('deliverydate')->nullable();
			$table->tinyInteger('status')->default('0'); // 0->not delivered , 1-delivered 
            $table->tinyInteger('refund')->default('0');	// 0-> not refund 		
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
        Schema::dropIfExists('reportorders');
    }
}
