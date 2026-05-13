<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name',
        'description',
        'power_level',
    ];

    public function rocks()
    {
        return $this->belongsToMany(Rock::class, 'rock_skill');
    }
}
