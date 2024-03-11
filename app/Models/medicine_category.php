<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicine_category extends Model
{
    use HasFactory;
	
		 protected $fillable = [
        'name',
'softdelete',
    ];
	
	
		public function medicine()
    {
        return $this->hasMany(medicine::class);
    }
}
