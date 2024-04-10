<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class serviceorder extends Model
{
    use HasFactory;
	
						 protected $fillable = [
          
	
		
		
		'patient_id',
		'user_id','doctor_id','doctor_commission_transition_id',
		'discountrefernceid','agentdetail_id',
		'agenttransaction_id','refdoctor_id','remark',
		'refundamount','refundbyuser_id','refunddate','refundbyuser',
		'status','refund','total','discount','receiveableamount',
		'paid','due_adjust_from_advance','due','commission',

    ];
	
public function doctor()
    {
    	return $this->belongsTo(doctor::class);
    }
	
		public function refdoctor()
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
	
						 public function refundbyuser()
    {
    	return $this->belongsTo(user::class, 'refundbyuser_id');
    }
	
	
	
						 public function specialconsessionbyuser()
    {
    	return $this->belongsTo(user::class, 'specialconsessionbyuser');
    }	
	
	
	
	
	
				 public function patient()
    {
    	return $this->belongsTo(patient::class);
    }

			public function servicetransition()
    {
        return $this->hasMany(servicetransition::class);
    }
	

	
		public function setTransactionDateAttribute($value)
{
    $this->attributes['deliverydate'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
	    
}

	public function getTransactionDateAttribute($value)
{
    return Carbon::createFromFormat('Y-m-d', $value)->format('m/d/Y');
	   
}
	
}
