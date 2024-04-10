<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Childmenu extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'name',
        'route',
        'status',
        'rootmenu_id',
    ];

    public function menuaction(): HasMany
    {
        return $this->hasMany(Menuaction::class);
    }

    public function rootmenu() : BelongsTo
    {
        return $this->belongsTo(Rootmenu::class);
    }
}
