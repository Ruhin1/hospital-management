<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabinetransferhistosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabinetransferhistos', function (Blueprint $table) {
            $table->id();
						$table->foreignId('cabinelist_id');
			$table->foreignId('user_id')->nullable();
			$table->foreignId('patient_id');
			$table->foreignId('cabinetransaction_id')->nullable();
			$table->date( 'paid_tiil_date' )->nullable();
			$table->date( 'ending' )->nullable();

			
			
		    $table->double('due', 12, 2)->default('0');
			$table->double('gross_amount_from_previous', 12, 2)->default('0');
			
			
			
			
			
			
			
			
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
        Schema::dropIfExists('cabinetransferhistos');
    }
}
