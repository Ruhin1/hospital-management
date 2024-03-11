<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportlists', function (Blueprint $table) {
            $table->id();
			
			$table->string('name');  
			
			$table->double('unitprice', 10, 2);
            $table->json('related_reagents')->nullable();
			
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
        Schema::dropIfExists('reportlists');
    }
}
