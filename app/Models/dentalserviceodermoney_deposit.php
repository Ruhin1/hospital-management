<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dentalserviceodermoney_deposit extends Model
{
    use HasFactory;
	
	
		
		 protected $fillable = [
        'patient_id','user_id',
'longterminstallerorder_id','amount','doctor_id','agentdetail_id',
'total_amount','discount','pay_by_advance',
    ];
	
	
					 public function patient()
    {
    	return $this->belongsTo(patient::class);
    }
	
						 public function agentdetail()
    {
    	return $this->belongsTo(agentdetail::class);
    }
	
	
						 public function doctor()
    {
    	return $this->belongsTo(doctor::class);
    }
	
							 public function User()
    {
    	return $this->belongsTo(User::class);
    }
	
	
							public function longterminstallerorder()
    {
    	return $this->belongsTo(longterminstallerorder::class);
    }
	
	
	
	
	
	
	
	
	
}
