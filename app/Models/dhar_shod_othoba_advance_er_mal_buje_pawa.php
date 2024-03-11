<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dhar_shod_othoba_advance_er_mal_buje_pawa extends Model
{
    use HasFactory;
	 protected $fillable = [
        'supplier_id',
       'user_id',
		'amount',
		'comment',
		'transitiontype'
	
    ];

  public function supplier()
    {
        return $this->belongsTo(supplier::class);
    }
	



  public function User()
    {
        return $this->belongsTo(User::class);
    }
	
	
}
