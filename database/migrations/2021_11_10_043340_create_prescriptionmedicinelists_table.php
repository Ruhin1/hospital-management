<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionmedicinelistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptionmedicinelists', function (Blueprint $table) {
            $table->id();
			$table->foreignId('prescription_id');
			$table->foreignId('medicine_id');
			$table->foreignId('medicine_category_id');
			$table->foreignId('prescriptionusages_id')->nullable();
			$table->foreignId('prescriptionkhabaragepore_id')->nullable();
		    $table->string('day')->nullable();
			$table->string('comment')->nullable();
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
        Schema::dropIfExists('prescriptionmedicinelists');
    }
}
