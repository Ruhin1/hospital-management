<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory;
	
	
		 protected $fillable = [
        'name',
       'address',
		'mobile',
		'softdelete',
		'due',
	'advance',
    ];


	



		public function khoroch_transition()
    {
        return $this->hasMany(khoroch_transition::class);
    }


	
	
	
	
	
	
}
