<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurgerylistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surgerylists', function (Blueprint $table) {
            $table->id();
			$table->string('name');  
			  $table->tinyInteger('softdelete')->default('0');
		
			$table->double('pre_operative_charge', 12, 2)->default('0');
			$table->double('Surgeon_charge', 12, 2)->default('0');
			$table->double('anesthesia_charge', 12, 2)->default('0');
			$table->double('assistant_charge', 12, 2)->default('0');
			$table->double('ot_charge', 12, 2)->default('0');
			$table->double('o2_no2_charge', 12, 2)->default('0');
			$table->double('c_arme_charge', 12, 2)->default('0');
			$table->double('post_operative_charge', 12, 2)->default('0');

			
			
			
				

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
        Schema::dropIfExists('surgerylists');
    }
}
