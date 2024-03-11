<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buy_return_medicine_from_company extends Model
{
    use HasFactory;
	
			 protected $fillable = [
        'medicinecomapnyname_id',
'medicine_id',
'due',
'advance',
'unit',
'unit_price',
'user_id',
'amount',
'comment',
'transitiontype',  // 1-sell 2-return
    ];
	
	
	
	  public function User()
    {
        return $this->belongsTo(User::class);
    }
	
	  public function medicinecomapnyname()
    {
        return $this->belongsTo(medicinecomapnyname::class);
    }
	
		  public function medicine()
    {
        return $this->belongsTo(medicine::class);
    }
	
	
	
	
	
	
	
	
	
}
