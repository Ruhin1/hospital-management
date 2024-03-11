<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
			
			$table->foreignId('user_id');
			$table->foreignId('patient_id');
			$table->integer('discountrefernceid')->nullable();
			$table->double('totalbeforediscount', 10, 2)->nullable();
			$table->double('due', 12, 2)->nullable();
			$table->double('pay_in_cash', 12, 2);
			$table->double('pay_by_adv', 12, 2);
			
				
			$table->double('total', 12, 2);
			$table->double('discount', 10, 2)->default(0);
			$table->double('refundamount', 10, 2)->default(0);
			$table->integer('refundbyuser')->nullable();
			
			
			
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
        Schema::dropIfExists('orders');
    }
}
