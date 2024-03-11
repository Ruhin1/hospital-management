<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePathologyTestComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pathology_test_components', function (Blueprint $table) {
            $table->id();
			$table->foreignId('reportlist_id');
			$table->string('component_name');  
			
            $table->string('Normalvalue')->nullable();
			$table->string('unit')->nullable();
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
        Schema::dropIfExists('pathology_test_components');
    }
}
