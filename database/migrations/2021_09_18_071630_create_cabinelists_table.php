<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabinelistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabinelists', function (Blueprint $table) {
            $table->id();
			
			$table->string('serial_no');
			$table->foreignId('patient_id')->nullable();
			$table->string('patientname')->nullable();
			$table->double('price', 14, 4);
			$table->tinyInteger('booking_status')->default('0');
						$table->tinyInteger('softdelete')->default('0');
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
        Schema::dropIfExists('cabinelists');
    }
}
