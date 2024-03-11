<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctorCommissionTransition extends Model
{
    use HasFactory;
	 protected $fillable = [
        'doctor_id',
       'user_id',
		'amount',
		'comment',
		'patient_id',
		'transitiontype',
		'paidorunpaid',
		'collection',
		'discount',
		'receiveablecollection',
	
    ];

  public function doctor()
    {
        return $this->belongsTo(doctor::class);
    }
	

  public function patient()
    {
        return $this->belongsTo(patient::class);
    }
	

  public function User()
    {
        return $this->belongsTo(User::class);
    }
	
}
