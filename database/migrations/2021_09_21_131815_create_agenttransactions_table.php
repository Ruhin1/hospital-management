<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenttransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenttransactions', function (Blueprint $table) {
            $table->id();
			$table->foreignId('agentdetail_id');
			$table->foreignId('user_id')->nullable();
			$table->foreignId('patient_id')->nullable();	
		
			$table->tinyInteger('transitiontype')->default('1'); // 1 ->  commosion for pathology , 3-> Commission for surgery 4->for cabine 5-> bibidhi.
          	$table->string('comment')->nullable();                 // 6-> Outdoor doctor Commission
			   $table->tinyInteger('paidorunpaid')->default(0);  //0->unpaid 1->paid
			
			$table->double( 'amount')->nullable();
			$table->double( 'discount')->nullable();
			$table->double( 'receiveableamount')->nullable();
			$table->double( 'paidamount');
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
        Schema::dropIfExists('agenttransactions');
    }
}
