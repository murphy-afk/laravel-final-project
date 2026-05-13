<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rock;

class RockSkillTableSeeder extends Seeder
{
    public function run(): void
    {
        // Sir Pebbleton
        Rock::find(1)?->skills()->attach([1, 2]);

        // Grumble Boulder
        Rock::find(2)?->skills()->attach([4]);

        // Pebble Spice
        Rock::find(3)?->skills()->attach([3]);
    }
}
