<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineCompanyTransitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_company_transitions', function (Blueprint $table) {
            $table->id();
			$table->foreignId('medicine_id');
			$table->foreignId('medicinecompanyorder_id');
			$table->double('Quantity', 14, 4);
		
			$table->double('unit_price', 14, 4);

			
			
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
        Schema::dropIfExists('medicine_company_transitions');
    }
}
