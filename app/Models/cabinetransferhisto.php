<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cabinetransferhisto extends Model
{
    use HasFactory;
	
	
					 protected $fillable = [
           'cabinelist_id',
	'user_id',
		'patient_id',
		'cabinetransaction_id',
		'starting', 
		'ending',

		'due',

	'gross_amount_from_previous',	



    ];



					 public function patient()
    {
    	return $this->belongsTo(patient::class);
    }
	


	
					 public function cabinelist()
    {
    	return $this->belongsTo(cabinelist::class);
    }
	
						 public function User()
    {
    	return $this->belongsTo(User::class);
    }



						 public function cabinetransaction()
    {
    	return $this->belongsTo(cabinetransaction::class);
    }







	public function setTransactionDateAttribute($value)
{
    $this->attributes['starting'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
	    $this->attributes['ending'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
}

	public function getTransactionDateAttribute($value)
{
    return Carbon::createFromFormat('Y-m-d', $value)->format('m/d/Y');
	    return Carbon::createFromFormat('Y-m-d', $value)->format('m/d/Y');
}
	
	
	
}
