<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
			 $table->string('name');
			 
		 $table->string('guardian_name_rel')->nullable();	 
			 
			  $table->string('mobile')->nullable();
			   $table->string('address')->nullable();
			   $table->string('diagnosisfor')->nullable();
			    $table->string('age')->nullable();
				$table->string('sex')->nullable();
			    $table->double('due')->default(0);
				$table->double('dena')->default(0);
				$table->double('cabinerate')->default(0);
				
				$table->double('long_term_installment')->default(0); 
				
				$table->tinyInteger('booking_status')->default('0');
				//0 -> outdoor 1-> cabine 2->released  // 3- pathology // 4- outdoor doctor // 5- phermachy
				$table->foreignId('patientbook_id')->nullable();
				$table->foreignId('agentdetail_id')->nullable();
						$table->string('image')->nullable();
				
				$table->foreignId('doctor_id')->nullable(); // dalal 
				$table->foreignId('refdoc_id')->nullable()->references('id')->on('doctors'); // ref doctor 
					$table->foreignId('cabinelist_id')->nullable();
					$table->foreignId('cabinetransaction_id')->nullable();
								  $table->string('cabineserial')->nullable();
					
					
					$table->tinyInteger('softdelete')->default('0');
			 
			
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
        Schema::dropIfExists('patients');
    }
}
