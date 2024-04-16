<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coshma extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'type',
        'softdelete',
    ];
} 

