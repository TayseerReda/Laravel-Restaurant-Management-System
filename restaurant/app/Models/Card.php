<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Card extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'menu_id',
        'quantity',
        
    ];

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }

    
    public function menu(): HasMany
    {
        return $this->hasMany(Menu::class);
    }
}
