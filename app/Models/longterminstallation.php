<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class longterminstallation extends Model
{
    use HasFactory;
	
	
						 protected $fillable = [
          
		'user_id',
		'patient_id',
	'doctorappointmenttransaction_id','gross_amount','totaldiscount','receiveable_amount',
		
	'longterminstallerorder_id', 'dentalservice_id',	
		
		
		
		

    ];
	
	
			public function dentalservice()
    {
    	return $this->belongsTo(dentalservice::class);
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
