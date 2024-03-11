<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinalreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finalreports', function (Blueprint $table) {
            $table->id();
			$table->foreignId('patient_id');
			$table->foreignId('user_id');
			$table->double('due');
			$table->double('totalvat', 14, 4);
			$table->double('totaldiscount', 14, 4)->default(0);  
			$table->double('totalservicecharge_after_adjusting_vat_tax', 14, 4)->default(0);  
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
        Schema::dropIfExists('finalreports');
    }
}
