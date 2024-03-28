<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoshmaPrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coshma_prescriptions', function (Blueprint $table) {
            $table->id();
            
            $table->integer('preint_id');
            $table->date('brith');
            $table->integer('ipd');
            $table->string('resph');
            $table->integer('recyl');
            $table->integer('reaxis');
            $table->integer('rebyes');
            $table->string('lesph');
            $table->integer('lecyl');
            $table->integer('leaxis');
            $table->string('lebyes');
            $table->string('add');
            $table->string('diopter');
            $table->json('instructions')->nullable();
            $table->json('type')->nullable();
            $table->json('color')->nullable();
            $table->json('remarks')->nullable();
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
        Schema::dropIfExists('coshma_prescriptions');
    }
}
