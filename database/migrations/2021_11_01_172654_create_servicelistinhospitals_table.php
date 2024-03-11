<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicelistinhospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicelistinhospitals', function (Blueprint $table) {
            $table->id();
			$table->string('servicename');
			$table->double('price', 14, 4);
			$table->tinyInteger('service_type')->default('0'); // 0 -> ek kalin 1-> per day wise
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
        Schema::dropIfExists('servicelistinhospitals');
    }
}
