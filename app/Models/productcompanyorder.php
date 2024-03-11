<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productcompanyorder extends Model
{
    use HasFactory;
	
							 protected $fillable = [
          
		'medicinecomapnyname_id',
		'user_id',
		
		'amount',
	'serialno',
		'comment',	'debit',	'credit', 'balance','type', 'discount', 'amountafterdiscount',

    ];
					 public function user()
    {
    	return $this->belongsTo(user::class);
    }
	
				 public function medicinecomapnyname()
    {
    	return $this->belongsTo(medicinecomapnyname::class);
    }

			public function productcompanytransition()
    {
        return $this->hasMany(productcompanytransition::class);
    }
	
	
	
	
	
	
	
	
}
