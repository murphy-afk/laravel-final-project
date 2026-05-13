<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillsTableSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name' => 'Emotional Support', 'description' => 'Provides silent comfort.', 'power_level' => 5],
            ['name' => 'Staying Perfectly Still', 'description' => 'Unmatched stability.', 'power_level' => 10],
            ['name' => 'Vibe Emission', 'description' => 'Radiates mysterious energy.', 'power_level' => 3],
            ['name' => 'Rolling Unpredictably', 'description' => 'Chaos incarnate.', 'power_level' => 7],
        ];

        foreach ($skills as $skill) {
            $newSkill = new Skill();
            $newSkill->name = $skill['name'];
            $newSkill->description = $skill['description'];
            $newSkill->power_level = $skill['power_level'];
            $newSkill->save();
        }
    }
}
