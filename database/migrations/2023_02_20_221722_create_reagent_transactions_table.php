<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReagentTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reagent_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reagent_id');
            $table->foreignId('reagent_order_id');
            $table->integer('quantity');
            $table->integer('price_amount');
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
        Schema::dropIfExists('reagent_transactions');
    }
}
