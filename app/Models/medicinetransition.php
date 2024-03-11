<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class medicinetransition extends Model
{
    use HasFactory;
	
				 protected $fillable = [
           'medicine_id',
	'order_id',
		'unit',
		
		'due',
		'vat',
		'discount',
	     'totalvat',
		 'totaldiscount',
		 'amount',
		 'adjust',
'pay_by_adv',

    ];
	
				 public function medicine()
    {
    	return $this->belongsTo(medicine::class);
    }
	

	
					 public function order()
    {
    	return $this->belongsTo(order::class,'order_id');
    }

	

	
	
}
