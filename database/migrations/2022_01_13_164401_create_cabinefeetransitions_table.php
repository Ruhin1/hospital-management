<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabinefeetransitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabinefeetransitions', function (Blueprint $table) {
            $table->id();
			$table->foreignId('cabinelist_id');
			$table->foreignId('user_id')->nullable();
			$table->foreignId('patient_id');
			$table->foreignId('cabinetransaction_id')->nullable();
			$table->date( 'starting' )->nullable();
			$table->date( 'ending' )->nullable();
			
				
			$table->double('gross_amount', 12, 2)->default('0');
			$table->double('paid', 12, 2)->default('0');
			$table->double('discount', 12, 2)->default('0');
			
			$table->double('adjust_with_advance', 12, 2)->default('0');
			
			
		    $table->double('due', 12, 2)->default('0');
			   $table->double('collection_from_previous_seat', 12, 2)->default('0');
			
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
        Schema::dropIfExists('cabinefeetransitions');
    }
}
