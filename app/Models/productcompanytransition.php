<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productcompanytransition extends Model
{
    use HasFactory;
	
		 protected $fillable = [
       
		'medicinecomapnyname_id',
		'productcompanyorder_id',
		'user_id',
		'unirprice',
	'medicine_id',
		'quantity',
		'amount',
'unitname',
'buyingunit',
'discountpercentage',
'discount',	
'finalamountafterdiscount',	

    ];	
	
				 public function medicinecomapnyname()
    {
    	return $this->belongsTo(medicinecomapnyname::class);
    }
	

					 public function product()
    {
    	return $this->belongsTo(product::class);
    }
					 public function productcompanyorder()
    {
    	return $this->belongsTo(productcompanyorder::class,'productorder_id');
    }

					 public function user()
    {
    	return $this->belongsTo(user::class,'user_id');
    }	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
