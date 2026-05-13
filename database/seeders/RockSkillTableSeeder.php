<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rock;

class RockSkillTableSeeder extends Seeder
{
    public function run(): void
    {
        Rock::find(1)?->skills()->attach([1, 2]);

        Rock::find(2)?->skills()->attach([4]);

        Rock::find(3)?->skills()->attach([3]);

    }
}
