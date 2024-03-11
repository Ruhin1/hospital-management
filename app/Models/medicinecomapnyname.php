<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicinecomapnyname extends Model
{
   
	
	    use HasFactory;
	
		 protected $fillable = [
        'name',
'softdelete',
'due',
'advance',
'agent_mobile',
'agent_name',
'openingbalance',
    ];
	
	
		public function medicine()
    {
        return $this->hasMany(medicine::class);
    }
	
}
