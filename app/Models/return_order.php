<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class return_order extends Model
{
    
	
	    use HasFactory;
	
					 protected $fillable = [
          
		'user_id',
		'total_cost_before_initial_vat_and_discount',
		'patient_id',
		'adjustment',
	'transitiontype',
		'total'

    ];
	
						 public function user()
    {
    	return $this->belongsTo(user::class);
    }
	
				 public function patient()
    {
    	return $this->belongsTo(patient::class);
    }

			public function returnmedicinetransaction()
    {
        return $this->hasMany(returnmedicinetransaction::class);
    }
	
	
	
}
