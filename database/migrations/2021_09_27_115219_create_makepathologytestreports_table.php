<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakepathologytestreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('makepathologytestreports', function (Blueprint $table) {
            $table->id();
			$table->foreignId('patient_id');
			$table->foreignId('doctor_id')->nullable();
			$table->foreignId('user_id');
			$table->foreignId('reportlist_id'); // reportlist_id->test ID
			$table->foreignId('pathology_test_component_id');
			
			$table->string('result');
			$table->foreignId('reportorder_id');
			$table->Integer('test_no');
			
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
        Schema::dropIfExists('makepathologytestreports');
    }
}
