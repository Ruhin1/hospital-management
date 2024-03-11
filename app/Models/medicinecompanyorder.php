<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicinecompanyorder extends Model
{
    use HasFactory;
	
	
					 protected $fillable = [
          
		'user_id',
		'medicinecomapnyname_id',
		
		'due',
	
		'pay_in_cash',
		'total',

		'totalbeforediscount',

		'discount',
		'transitiontype',
		

    ];	
	
	
	
					 public function user()
    {
    	return $this->belongsTo(user::class);
    }
	
				 public function medicinecomapnyname()
    {
    	return $this->belongsTo(medicinecomapnyname::class);
    }

			public function medicineCompanyTransition()
    {
        return $this->hasMany(medicineCompanyTransition::class);
    }	
	
	
	
	
	
	
}
