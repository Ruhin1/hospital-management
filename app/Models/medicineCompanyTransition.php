<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicineCompanyTransition extends Model
{
    use HasFactory;
	
					 protected $fillable = [
           'medicine_id',
	'medicinecomapnyname_id',
		'Quantity',
		'unit_price',
		'due',
		'advance',
		 'amount',
		 'ekok',
		 'comment',
		 'pay_in_cash',
		 'batch_no',
		 'transitiontype',
		 'medicinecompanyorder_id',
		 

    ];
					 public function medicine()
    {
    	return $this->belongsTo(medicine::class);
    }
	
						 public function medicinecomapnyname()
    {
    	return $this->belongsTo(medicinecomapnyname::class);
    }
	
	
						 public function medicinecompanyorder()
    {
    	return $this->belongsTo(medicinecompanyorder::class);
    }
	
	
	
	
	
	
	
	
	
}
