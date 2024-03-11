<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patientfinalhisab extends Model
{
    use HasFactory;
	
		 protected $fillable = [
        'user_id',
       'patient_id',
		'gross_amount',
		'receiveable_amount',
		'total_discount',
		'total_due',
		'total_Commission',
		'refund'
		
	
    ];
	
	
		  public function user()
    {
        return $this->belongsTo(user::class);
    }
	
			  public function patient()
    {
        return $this->belongsTo(patient::class);
    }
	
	
	
}
