<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinetransitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicinetransitions', function (Blueprint $table) {
            $table->id();
			$table->foreignId('medicine_id')->nullable();
			$table->foreignId('user_id')->nullable();
			$table->foreignId('patient_id')->nullable();
			
			$table->unsignedInteger('order_id')->nullable();
			$table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
			
			
			$table->double('unit', 10, 2)->nullable();
			$table->double('vat', 10, 2)->nullable();
			$table->double('pay_by_cash', 10, 2)->nullable();
				$table->double('amount', 14, 4)->nullable();
			$table->double('adjust', 10, 2)->nullable();
			$table->double('pay_by_adv', 10, 2)->nullable();
			$table->double('unitprice', 10, 4)->nullable();
			$table->double('discount', 10, 2)->nullable();
			$table->double('totalvat', 10, 2)->nullable();
			$table->double('totaldiscount', 10, 2)->nullable();
			
			
			$table->double('due', 10, 2)->nullable();
			$table->double('Total_cost', 10, 2)->nullable();
			
			
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
        Schema::dropIfExists('medicinetransitions');
    }
}
