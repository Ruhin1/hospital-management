<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agentdetails', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->double('commission_pecentage')->default('0');
		
			$table->string('mobile');
			$table->double('hospitaler_kache_pawna', 12, 2)->default(0);
			$table->string('address');
		
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
        Schema::dropIfExists('agentdetails');
    }
}
