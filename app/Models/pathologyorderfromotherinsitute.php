<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pathologyorderfromotherinsitute extends Model
{
    use HasFactory;
	
	
	
	
		
						 protected $fillable = [
           'patient_id',
	'user_id',
	'supplier_id',

		'due',
		

		'pay_in_cash',
	 
		 'totalbeforediscount',
		 'total',
		 'discount',
		 'remark',
	

    ];
	
	
	
						 public function patient()
    {
    	return $this->belongsTo(patient::class);
    }
	



						 public function supplier()
    {
    	return $this->belongsTo(supplier::class);
    }











						 public function user()
    {
    	return $this->belongsTo(User::class);
		
    }	
	
	
	
	
	
	
	
	
	
	
			public function pathologytransitionfromotherinstitue()
    {
        return $this->hasMany(pathologytransitionfromotherinstitue::class);
    }
	
	
	
}
