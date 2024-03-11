<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinecompanyordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicinecompanyorders', function (Blueprint $table) {
            $table->id();
			
            $table->foreignId('user_id');
			$table->foreignId('medicinecomapnyname_id');

			$table->double('totalbeforediscount', 10, 2)->nullable();
			$table->double('due', 12, 2)->nullable();
			$table->double('pay_in_cash', 12, 2);

			
				
			$table->double('total', 12, 2);
			$table->double('discount', 10, 2)->default(0);
		
			$table->tinyInteger('transitiontype')->default('1'); // 1-> product buy 2->product return 
			
			
			
			
			
			
			
			
			
			
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
        Schema::dropIfExists('medicinecompanyorders');
    }
}
