<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mood extends Model
{
    protected $fillable = [
        'name',
        'emoji',
        'description',
    ];

    public function rocks()
    {
        return $this->hasMany(Rock::class);
    }
}
