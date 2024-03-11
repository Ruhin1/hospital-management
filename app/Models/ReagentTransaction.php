<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReagentTransaction extends Model
{
    use HasFactory;

    public function reagent()
    {
    	return $this->belongsTo(Reagent::class);
    }
    public function reagentOrder()
    {
    	return $this->belongsTo(ReagentOrder::class,'reagent_order_id');
    }


}
