<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_orders', function (Blueprint $table) {
            $table->id();
			
						$table->foreignId('user_id');
			$table->foreignId('patient_id');
		$table->double('total_cost_before_initial_vat_and_discount', 14, 4)->nullable();
			$table->double('total', 14, 4);
			$table->double('adjustment', 14, 4); // discount
			$table->tinyInteger('transitiontype'); // 1-> nogode porishod  2-bakir sathe adjust
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
        Schema::dropIfExists('return_orders');
    }
}
