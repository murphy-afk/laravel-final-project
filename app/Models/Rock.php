<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rock extends Model
{
    protected $fillable = [
        'name',
        'type_id',
        'mood_id',
        'rarity_id',
        'weight',
        'texture',
        'color',
        'origin_story',
        'adopted',
        'image_url',
    ];

    public function type()
    {
        return $this->belongsTo(RockType::class);
    }

    public function mood()
    {
        return $this->belongsTo(Mood::class);
    }

    public function rarity()
    {
        return $this->belongsTo(Rarity::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'rock_skill');
    }
}
