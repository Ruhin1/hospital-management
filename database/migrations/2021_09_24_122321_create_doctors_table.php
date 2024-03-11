<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
			 $table->string('name');
			  $table->string('address');
			  $table->string('mobile');
			  $table->string('Degree');
			  $table->string('Department');
			  $table->string('workingplace')->nullable();
			  $table->double('commission_pecentage')->default('0');
			  $table->double('first_visit_fees');
			  $table->double('next_visit_fees');
			   $table->string('contact_address_for_serial')->nullable();
			   $table->text('chamber_address')->nullable();
			   $table->string('visiting_hours')->nullable();
			   $table->string('offday')->nullable();
			   $table->string('headerimage')->nullable();
			   $table->string('footerimage')->nullable();
			    $table->string('image')->nullable();
			   $table->text('prescriptionheading')->nullable();
			  $table->double('hospitaler_kache_pawna', 12, 2)->default(0);
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
        Schema::dropIfExists('doctors');
    }
}
