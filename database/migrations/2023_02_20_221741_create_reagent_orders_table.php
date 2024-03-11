<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReagentOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reagent_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('price_amount');
            $table->integer('paid');
            $table->integer('due');
            $table->tinyInteger('type')->default('1');
            $table->foreignId('supplier_id');           
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
        Schema::dropIfExists('reagent_orders');
    }
}
