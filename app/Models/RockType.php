<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RockType extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function rocks()
    {
        return $this->hasMany(Rock::class);
    }
}
