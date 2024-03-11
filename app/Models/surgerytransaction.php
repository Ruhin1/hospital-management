<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surgerytransaction extends Model
{
    use HasFactory;
	
					 protected $fillable = [
           'doctor_id',
	'patient_id',
		'surgerylist_id',
		'doctor_id', //agent doctor
		'agendetail_id',
		'comission',
		'refdoc_id',
	'agentdetail_id',
	'agenttransaction_id',
	'doctor_commission_transition_id',
	
		

		
	     'due',
			'pre_operative_charge',
		'Surgeon_charge',
		'anesthesia_charge',
		'assistant_charge',
		'ot_charge',
		'o2_no2_charge',
		'c_arme_charge',
		'post_operative_charge',
		'Surgeon_id',
		'anesthesiologist_id',
		'surgerydate',
		 'user_id',
		
		 'totalvat', 
 	 'pay_in_cash',
		 'discount',
		  'totaldiscount',
		'total_cost_after_initial_vat_and_discount',

		 'miscellaneous_expenses',
		 'remark',
		 'anesthesiologisttransid',
		 'Surgeontransid',
		 'adjust_with_advance',

    ];
	
					 public function patient()
    {
    	return $this->belongsTo(patient::class);
    }
	
	
	
					 public function surgerylist()
    {
    	return $this->belongsTo(surgerylist::class);
    }
	
						 public function agenttransaction()
    {
    	return $this->belongsTo(agenttransaction::class);
    }

	
							 public function doctor_commission_transition()
    {
    	return $this->belongsTo(doctor_commission_transition::class);
    }
	
							 public function surgeon()
    {
		return $this->belongsTo('doctor', 'id', 'Surgeon_id');
    	
    }
	
								 public function anesthesiologist()
    {
		return $this->belongsTo('doctor', 'id', 'anesthesiologist_id');
    	
    }
	
	
						 public function doctor()
    {
    	return $this->belongsTo(doctor::class);
    }	
	
	public function agentdetail()  
    {
    	return $this->belongsTo(agentdetail::class);
    }
	
							 public function User()
    {
    	return $this->belongsTo(User::class);
    }
	
	
	
	
	
		public function setTransactionDateAttribute($value)
{
    $this->attributes['surgerydate'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');

}

	public function getTransactionDateAttribute($value)
{
    return Carbon::createFromFormat('Y-m-d', $value)->format('m/d/Y');
	   
}
	
	
	
	
	
	
	
	
}
