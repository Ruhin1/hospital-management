<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khoroch_transition extends Model
{
    use HasFactory;
	
					 protected $fillable = [
           'khorocer_khad_id',
	'supplier_id',
	'user_id',
		'unit',
		'unit_price',
		'due',
		
		'comment',
		'advance',
	     'type',
		 'amount',
		

    ];
	
				 public function khorocer_khad()
    {
    	return $this->belongsTo(khorocer_khad::class);
    }
	

	
					 public function supplier()
    {
    	return $this->belongsTo(supplier::class);
    }

	
		public function User()
    {
    	return $this->belongsTo(User::class);
    }
	
	
	
	
	
	
	
}
