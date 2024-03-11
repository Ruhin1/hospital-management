<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhorochTransitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khoroch_transitions', function (Blueprint $table) {
            $table->id();
			$table->foreignId('user_id');
			$table->foreignId('khorocer_khad_id');
		    $table->foreignId('supplier_id');
			$table->text('comment')->nullable();
			
			
			
			
			$table->double('unit', 14, 4);
			$table->double('unit_price', 14, 4);
			$table->double('amount', 14, 4);
			$table->double('due', 14, 4)->default(0);
			$table->double('advance', 14, 4)->default(0);
$table->tinyInteger('type')->default('0');  // 0 - kroy 1-khorch
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
        Schema::dropIfExists('khoroch_transitions');
    }
}
