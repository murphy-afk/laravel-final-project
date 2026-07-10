<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rock;

class RocksTableSeeder extends Seeder
{
    public function run(): void
    {
        $rocks = [
            [
                'name' => 'Sir Pebbleton',
                'type_id' => 1,
                'mood_id' => 3,
                'rarity_id' => 4,
                'weight' => 320,
                'texture' => 'Smooth',
                'color' => 'Gray',
                'origin_story' => 'Found meditating by a quiet river.',

                'adopted' => false,
                'image_url' => null,
            ],
            [
                'name' => 'Grumble Boulder',
                'type_id' => 2,
                'mood_id' => 1,
                'rarity_id' => 3,
                'weight' => 540,
                'texture' => 'Rough',
                'color' => 'Dark Gray',
                'origin_story' => 'Complains about everything.',

                'adopted' => false,
                'image_url' => null,
            ],
            [
                'name' => 'Pebble Spice',
                'type_id' => 3,
                'mood_id' => 2,
                'rarity_id' => 2,
                'weight' => 150,
                'texture' => 'Polished',
                'color' => 'Beige',
                'origin_story' => 'Has strong opinions about fashion.',

                'adopted' => false,
                'image_url' => null,
            ],
        ];

        foreach ($rocks as $rock) {
            $newRock = new Rock();
            $newRock->fill($rock);
            $newRock->save();
        }
    }
}
