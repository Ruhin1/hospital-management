<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class cabinetransaction extends Model
{
    use HasFactory;
					 protected $fillable = [
           'cabinelist_id',
	'patient_id',
		'starting',
		'doctor_id',
		'agentdetail_id', 
		'refdoctor_id',
		'ending',
		'vat',
		'discount',
	  'comission',
	  'diagnosis',
		 'total_before_vat_dis',
		 'total_after_vat_dis',
		 'total_after_adjustment',
		 'due',
		 'admissionfee',
		 'tillpaiddate',
		 'gross_amount_admisson_fee',
'user_id',

    ];
	
	
					 public function patient()
    {
    	return $this->belongsTo(patient::class);
    }
	
						 public function doctor()
    {
    	return $this->belongsTo(doctor::class);
    }
	
							 public function agentdetail()
    {
    	return $this->belongsTo(agentdetail::class);
    }
	
	
	

	
					 public function cabinelist()
    {
    	return $this->belongsTo(cabinelist::class);
    }
	
						 public function User()
    {
    	return $this->belongsTo(User::class);
    }

	public function setTransactionDateAttribute($value)
{
    $this->attributes['starting'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
	    $this->attributes['ending'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
	 $this->attributes['tillpaiddate'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
}

	public function getTransactionDateAttribute($value)
{
    return Carbon::createFromFormat('Y-m-d', $value)->format('m/d/Y');
	    return Carbon::createFromFormat('Y-m-d', $value)->format('m/d/Y');
}
	
}
