<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cashtransition extends Model
{
    use HasFactory;
	
	
	
	
		 protected $fillable = [
        'patient_id',
       'user_id',
		
		
		
		'company_type',
		'customer_type',
		'transitionproducttype',
		'gorssamount',
		'discount',
		'amount_after_discount',
		'deposit',
		'withdrwal',
		'description',
		'debit',
		'credit',
		'advance_deposit_minus',
		
		'doctorappointmenttransaction_id',
		'order_id',
		'reportorder_id',
		'surgerytransaction_id',
		'serviceorder_id',
		'discountondue',
		'cabinetransaction_id',
		
		
	
    ];
	
	
	
	  public function patient()
    {
        return $this->belongsTo(patient::class);
    }
	



  public function cabinetransaction()
    {
        return $this->belongsTo(cabinetransaction::class);
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




  public function User()
    {
        return $this->belongsTo(User::class);
    }
	
	
	
	
	
	
	
	
}
