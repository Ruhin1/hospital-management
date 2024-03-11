<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class medicinetransition extends Model
{
    use HasFactory;
	
				 protected $fillable = [
        'medicine_id',
		'user_id',
		'patient_id',
		'unit',
		'unitprice',
		'due',
		'vat',
		'discount',
		'pay_in_cash',
		'Total_cost',
		'unitprice',

    ];
	
			 public function medicine()
    {
    	return $this->belongsTo(medicine::class);
    }
	
				 public function user()
    {
    	return $this->belongsTo(user::class);
    }
	
				 public function patient()
    {
    	return $this->belongsTo(patient::class);
    }
	
	
	
	
}
