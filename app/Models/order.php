<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user;

class order extends Model
{
    use HasFactory;
	
					 protected $fillable = [
          
		'user_id',
		'patient_id',
		
		'due',
	
		'pay_in_cash',
		'total',
		'refundamount',
		'refundbyuser',
		'totalbeforediscount',
		'discountrefernceid',
		'discount',
		

    ];
	
	
					 public function user()
    {
    	return $this->belongsTo(user::class);
    }
	
				 public function patient()
    {
    	return $this->belongsTo(patient::class);
    }

			public function medicinetransitions()
    {
        return $this->hasMany(medicinetransition::class);
    }
	
}
