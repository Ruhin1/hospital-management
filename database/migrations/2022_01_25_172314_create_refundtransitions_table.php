<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefundtransitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refundtransitions', function (Blueprint $table) {
            $table->id();
					$table->foreignId('patient_id');
			$table->foreignId('user_id');
			
			$table->foreignId('doctorappointmenttransaction_id')->nullable();
			$table->foreignId('order_id')->nullable();
			$table->foreignId('reportorder_id')->nullable();
			$table->foreignId('surgerytransaction_id')->nullable();
			$table->foreignId('serviceorder_id')->nullable();
			
			$table->foreignId('duetransition_id')->nullable();
			
			
			$table->double('amount')->nullable();
			
			$table->string('comment')->nullable();
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
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
        Schema::dropIfExists('refundtransitions');
    }
}
