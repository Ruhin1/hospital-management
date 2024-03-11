<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinecomapnynamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicinecomapnynames', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->string('agent_name');
			$table->string('agent_mobile');
			$table->double('due')->default('0');
			$table->double('openingbalance')->default('0');
			$table->double('advance')->default('0');
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
        Schema::dropIfExists('medicinecomapnynames');
    }
}
