<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rarity extends Model
{
    protected $fillable = [
        'name',
        'color_tag',
        'multiplier',
    ];

    public function rocks()
    {
        return $this->hasMany(Rock::class, 'rarity_id');
    }
}
