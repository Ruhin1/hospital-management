<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class externalcost extends Model
{
    use HasFactory;
	
				 protected $fillable = [
        'name',
		
		'cost',
		

    ];
	
}
