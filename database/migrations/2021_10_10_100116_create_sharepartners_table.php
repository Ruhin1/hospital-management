<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSharepartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sharepartners', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			
	
			$table->string('mobile');
			$table->string('address');
		$table->double('joma')->default(0);
		$table->double('uttholon')->default(0);
			$table->tinyInteger('softdelete')->default('0');
            $table->timestamps();
        });
    }

    /**sharepartner_id
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sharepartners');
    }
}
