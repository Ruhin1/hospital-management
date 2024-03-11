<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineComapnyerDenaPawanShodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_comapnyer_dena_pawan_shods', function (Blueprint $table) {
            $table->id();
			$table->foreignId('medicinecomapnyname_id');
			$table->foreignId('user_id');
			$table->double('amount');
			$table->double('discount')->default(0);
			$table->string('comment')->nullable();
			$table->tinyInteger('transitiontype')->default('1'); // 1->dena shod , 2->pawna aday.
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
        Schema::dropIfExists('medicine_comapnyer_dena_pawan_shods');
    }
}
