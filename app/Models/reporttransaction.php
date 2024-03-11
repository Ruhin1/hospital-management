<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reporttransaction extends Model
{
    use HasFactory;
	
					 protected $fillable = [
           'reportlist_id',
	'reportorder_id',
	'doctor_id',
	'patient_id',
		'unit',
		'serialnumber',
		'due',
		'vat',
		'discount',
	     'totalvat',
		 'totaldiscount',
		 'amount',
		 'adjust',
		 'unitprice',

    ];
	
					 public function patient()
    {
    	return $this->belongsTo(patient::class);
    }
	
	
	
				 public function reportlist()
    {
    	return $this->belongsTo(reportlist::class);
    }
	
				 public function doctor()
    {
    	return $this->belongsTo(doctor::class);
    }

	
					 public function reportorder()
    {
    	return $this->belongsTo(reportorder::class,'reportorder_id');
    }

	

	
}
