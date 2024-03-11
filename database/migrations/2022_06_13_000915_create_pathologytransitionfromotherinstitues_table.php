<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePathologytransitionfromotherinstituesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pathologytransitionfromotherinstitues', function (Blueprint $table) {
            $table->id();
			
			
			
							$table->foreignId('reportlist_id');
		    
			$table->foreignId('pathologyorderfromotherinsitute_id');
	$table->foreignId('supplier_id')->nullable();			
			



			
		
		
			$table->double('unit', 10, 4);

			
			
			
			$table->double('discount', 10, 4)->nullable();
			$table->double('totaldiscount', 10, 4);    
			$table->double('amount', 10, 4);
	$table->double('adjust', 10, 4);
	$table->double('unitprice', 10, 4)->nullable();
	
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
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
        Schema::dropIfExists('pathologytransitionfromotherinstitues');
    }
}
