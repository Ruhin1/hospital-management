<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agenttransaction extends Model
{
    use HasFactory;
				 protected $fillable = [
           'agentdetail_id',
	 'user_id',
		'patient_id',
		'paidamount',
		'transitiontype',
		'comment',
		'paidorunpaid',
		'amount',
		'discount',
		'receiveableamount'
		


    ];
	
	
			public function agentdetail()
    {
    	
		  return $this->belongsTo(agentdetail::class, );
		
		
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
