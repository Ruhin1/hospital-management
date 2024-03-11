<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyReturnMedicineFromCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_return_medicine_from_companies', function (Blueprint $table) {
            $table->id();
			$table->foreignId('medicinecomapnyname_id');
			$table->foreignId('medicine_id');
			$table->double('unit');
			$table->double('unit_price');
			$table->foreignId('user_id');
			
			$table->double('amount');
			$table->double('due')->default(0);
			$table->double('advance')->default(0);
			$table->string('comment')->nullable();
			$table->tinyInteger('transitiontype')->default('1'); // 1 -> medicine kena 2->medicine ferot
          
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
        Schema::dropIfExists('buy_return_medicine_from_companies');
    }
}
