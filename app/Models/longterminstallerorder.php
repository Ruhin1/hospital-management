<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class longterminstallerorder extends Model
{
    use HasFactory;
	
	

					 protected $fillable = [
          
		'user_id',
		'patient_id',
	'doctorappointmenttransaction_id','gross_amount','totaldiscount','receiveable_amount','agentdetail_id',
	'doctor_id',	
		
		
		
		
		

    ];
	
	public function doctorappointmenttransaction()
    {
    	return $this->belongsTo(doctorappointmenttransaction::class);
    }	
	
	public function doctor()
    {
    	return $this->belongsTo(doctor::class);
    }		
	
		
	
	public function agentdetail()
    {
    	return $this->belongsTo(agentdetail::class);
    }	
	
	public function user()
    {
    	return $this->belongsTo(user::class);
    }	
		
	
		public function patient()
    {
    	return $this->belongsTo(patient::class);
    }
	
	
				public function longterminstallation()
    {
        return $this->hasMany(longterminstallation::class);
    }
	
	
	
	
	
	
	
	
	
	
}
