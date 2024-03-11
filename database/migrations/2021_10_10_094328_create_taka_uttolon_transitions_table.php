<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakaUttolonTransitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taka_uttolon_transitions', function (Blueprint $table) {
            $table->id();
			$table->foreignId('sharepartner_id');
			$table->double('amount');
			$table->string('comment')->nullable(); 
			$table->tinyInteger('transitiontype')->default(1);  //1->uttolon , 2->joma
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
        Schema::dropIfExists('taka_uttolon_transitions');
    }
}
