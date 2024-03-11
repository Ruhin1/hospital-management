<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductcompanytransitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productcompanytransitions', function (Blueprint $table) {
            $table->id();

			$table->foreignId('medicinecomapnyname_id');

			$table->foreignId('medicine_id');   
			$table->foreignId('productcompanyorder_id');   

			$table->foreignId('user_id');
		
		
			$table->double('unirprice');
			$table->double('quantity');
			$table->double('amount');
	$table->double('discountpercentage')->default(0);
			$table->double('discount')->default(0);
			$table->double('finalamountafterdiscount');
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
        Schema::dropIfExists('productcompanytransitions');
    }
}
