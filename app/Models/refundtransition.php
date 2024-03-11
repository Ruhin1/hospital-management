<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class refundtransition extends Model
{
    use HasFactory;
	
		 protected $fillable = [
        'patient_id',
       'user_id',
		'amount',
		'comment',

		'doctorappointmenttransaction_id',
		'order_id',
		'reportorder_id',
		'surgerytransaction_id',
		'serviceorder_id',
		'duetransition_id'
	
		
		
	
    ];
  public function patient()
    {
        return $this->belongsTo(patient::class);
    }
	


  public function doctorappointmenttransaction()
    {
        return $this->belongsTo(doctorappointmenttransaction::class);
    }
	  public function order()
    {
        return $this->belongsTo(order::class);
    }
	  public function reportorder()
    {
        return $this->belongsTo(reportorder::class);
    }
	  public function surgerytransaction()
    {
        return $this->belongsTo(surgerytransaction::class);
    }
	  public function serviceorder()
    {
        return $this->belongsTo(serviceorder::class);
    }

	  public function duetransition()
    {
        return $this->belongsTo(duetransition::class);
    }


  public function User()
    {
        return $this->belongsTo(User::class);
    }	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
