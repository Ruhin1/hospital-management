<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use \Carbon\Carbon;
use DateTime;

class doctorappointmenttransaction extends Model
{
    use HasFactory;
	
				 protected $fillable = [
           'doctor_id',
	'patient_id',
		'date',
		'agentdetail_id',
		'serialno',
		'fees',
		'nogod',
	     'due',
		 'adjust_with_advance',
		 'cancel_serial_no',
		 'absent',
		 'user_id',
		 'doctoroncallforadmittedpartient','grossamount',
		 

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
	
	
		public function setTransactionDateAttribute($value)
{
    $this->attributes['date'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');

}

	public function getTransactionDateAttribute($value)
{
    return Carbon::createFromFormat('Y-m-d', $value)->format('m/d/Y');
	    
}

	
	
}
