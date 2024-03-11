<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDharShodOthobaAdvanceErMalBujePawasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhar_shod_othoba_advance_er_mal_buje_pawas', function (Blueprint $table) {
            $table->id();
			$table->foreignId('supplier_id');
			$table->foreignId('user_id');
			$table->double('amount');
			$table->string('comment')->nullable();
			$table->tinyInteger('transitiontype')->default('1');  // 1 -> dena shod , 2->pawna ponno er madhome aday  , 3-> pawna nogode aday 
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
        Schema::dropIfExists('dhar_shod_othoba_advance_er_mal_buje_pawas');
    }
}
