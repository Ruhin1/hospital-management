<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cabinelist extends Model
{
    use HasFactory;
	
			 protected $fillable = [
        'serial_no',
		'price',
		'booking_status',
		'patient_id',
		'patientname',
		'softdelete',

    ];
	
	 public function patient()
    {
        return $this->hasOne(patient::class);
    }
	



					 public function findpatientbycabine()
    {
    	return $this->belongsTo(cabinelist::class,'patient_id' );
    }



	
}
