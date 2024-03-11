<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
			$table->foreignId('medicine_category_id');
			$table->foreignId('medicinecomapnyname_id')->nullable();
			$table->string('name');  
			$table->string('Genericname')->nullable();  
			$table->string('Strength')->nullable();  
			$table->double('stock', 12, 2);
			$table->double('unitprice', 12, 2);
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
        Schema::dropIfExists('medicines');
    }
}
