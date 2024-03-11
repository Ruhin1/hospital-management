<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePathologyorderfromotherinsitutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pathologyorderfromotherinsitutes', function (Blueprint $table) {
            $table->id();
			
			
			$table->foreignId('patient_id')->nullable();
			$table->foreignId('user_id');
			
			$table->foreignId('supplier_id')->nullable();
			
			
			$table->double('due', 10, 2)->nullable();
			$table->double('pay_in_cash', 10, 2);

			
			$table->double('totalbeforediscount', 10, 2)->nullable();
			$table->double('total', 10, 2);
			$table->double('discount', 10, 2)->default(0);
			


			
			$table->text('remark')->nullable();
			
		

		
			
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
        Schema::dropIfExists('pathologyorderfromotherinsitutes');
    }
}
