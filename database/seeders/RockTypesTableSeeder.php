<?php

namespace Database\Seeders;

use App\Models\RockType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RockTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Sedimentary', 'description' => 'Chill rocks formed by layers of vibes.'],
            ['name' => 'Igneous', 'description' => 'Forged in fire. Dramatic energy.'],
            ['name' => 'Metamorphic', 'description' => 'Rocks that reinvented themselves.'],
            ['name' => 'Chaos Rock', 'description' => 'Unpredictable. Possibly cursed.'],
        ];

        foreach ($types as $type) {
            $newType = new RockType();
            $newType->name = $type['name'];
            $newType->description = $type['description'];
            $newType->save();
    }
}
}