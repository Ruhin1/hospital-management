<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReagentOrder extends Model
{

    protected $table='reagent_orders';
    use HasFactory;

    public function reagent_transaction()
    {
        return $this->hasMany(ReagentTransaction::class);
    }
    public function supplier()
    {
        return $this->belongsTo(supplier::class);
    }


}
