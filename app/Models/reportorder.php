<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class reportorder extends Model
{
    use HasFactory;
	
					 protected $fillable = [
          
		'user_id',
		'patient_id',
		'doctor_id',
		'due',
	'deliverydate',
	'remark',
		'pay_in_cash',
		'total',
		'agentdetail_id',
		'refdoctor_id',
		'status',
		'refund',
		'commission',
		'totalbeforediscount',
		'discountrefernceid',
		'discount',
		'agenttransaction_id',
		'doctor_commission_transition_id',
		'refundamount',
		'refundbyuser_id',
		'specialconsessionamount',
		'specialconsessionbyuser',
		'specialconsessiondate',
		'specialconsession',
		'refunddate',
		
		
		
		
		
		

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

			public function reporttransaction()
    {
        return $this->hasMany(reporttransaction::class);
    }
	
				public function makepathologytestreport()
    {
        return $this->hasMany(makepathologytestreport::class);
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
