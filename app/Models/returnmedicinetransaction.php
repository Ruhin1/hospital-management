<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class returnmedicinetransaction extends Model
{
    use HasFactory;
	
					 protected $fillable = [
           'medicine_id',
	'return_order_id',
		'unit',
		'user_id','patient_id',
		'due',
		'vat',
		'discount',
	     'totalvat',
		 'totaldiscount',
		 'amount',
		 'adjust'

    ];
	
					 public function medicine()
    {
    	return $this->belongsTo(medicine::class);
    }
	



					 public function patient()
    {
    	return $this->belongsTo(patient::class);
    }


					 public function user()
    {
    	return $this->belongsTo(user::class);
    }




	
					 public function return_order()
    {
    	return $this->belongsTo(return_order::class,'return_order_id');
    }

	
	
	
}
