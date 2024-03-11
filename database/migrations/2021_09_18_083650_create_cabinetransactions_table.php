<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabinetransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabinetransactions', function (Blueprint $table) {
            $table->id();
			$table->foreignId('cabinelist_id');
			$table->foreignId('user_id')->nullable();
		    $table->foreignId('doctor_id')->nullable();   //agent doctor 
			$table->foreignId('agentdetail_id')->nullable();
			$table->foreignId('refdoctor_id')->nullable();
			$table->foreignId('patient_id');
			$table->string( 'diagnosis' )->nullable();
			$table->double('comission', 12, 2)->default('0');
			$table->date( 'starting' )->nullable();
			$table->double('gross_amount_admisson_fee', 12, 2)->default('0');
			$table->double('admissionfee', 12, 2)->default('0');
			
			
			$table->date( 'ending' )->nullable();
			$table->date( 'tillpaiddate' )->nullable();
			$table->double( 'discount' )->nullable();
			$table->double( 'vat' )->nullable();
			$table->double( 'total_before_vat_dis' )->nullable();
			$table->double( 'total_after_vat_dis' )->nullable();
			$table->double( 'total_after_adjustment' )->nullable();
			$table->double( 'due' )->nullable();
				$table->double('collection_from_previous_seat', 12, 2)->nullable()->default('0');
			
			
			
			
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
        Schema::dropIfExists('cabinetransactions');
    }
}
