<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicine_comapnyer_dena_pawan_shod extends Model
{
    use HasFactory;
		 protected $fillable = [
        'medicinecomapnyname_id',
       'user_id',
		'amount',
		'comment',
		'discount',
		'transitiontype'
	
    ];

  public function medicinecomapnyname()
    {
        return $this->belongsTo(medicinecomapnyname::class);
    }
	



  public function User()
    {
        return $this->belongsTo(User::class);
    }
}
