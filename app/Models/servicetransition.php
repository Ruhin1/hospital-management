<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicetransition extends Model
{
    use HasFactory;
	
						 protected $fillable = [
						 'serviceorder_id',
'servicelistinhospital_id',

'user_id',
'unit',
'charge',
'discount',
'receiveable_amount',


    ];
	
						 public function serviceorder()
    {
    	return $this->belongsTo(serviceorder::class);
    }
	

	
	
	
					 public function servicelistinhospital()
    {
    	return $this->belongsTo(servicelistinhospital::class);
    }
	
	

							 public function User()
    {
    	return $this->belongsTo(User::class);
    }
		
}
