<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class finalreport extends Model
{
    use HasFactory;
	
	
						 protected $fillable = [
       
	'patient_id',

	     'due',
		
		 'user_id',
		
		 'totalvat', 
 	 
		 
		  'totaldiscount',
		  'totalservicecharge_after_adjusting_vat_tax',

    ];
	
					 public function patient()
    {
    	return $this->belongsTo(patient::class);
    }
	

							 public function User()
    {
    	return $this->belongsTo(User::class);
    }
	
}
