<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prescriptionusages extends Model
{
    use HasFactory;
	
						 protected $fillable = [
     'usage',
 'softdelete',

    ];
	
}
