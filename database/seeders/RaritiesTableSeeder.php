<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rarity;

class RaritiesTableSeeder extends Seeder
{
    public function run(): void
    {
        $rarities = [
            ['name' => 'Common', 'color_tag' => 'secondary', 'multiplier' => 1.00],
            ['name' => 'Uncommon', 'color_tag' => 'info', 'multiplier' => 1.25],
            ['name' => 'Rare', 'color_tag' => 'primary', 'multiplier' => 1.50],
            ['name' => 'Legendary', 'color_tag' => 'warning', 'multiplier' => 2.00],
            ['name' => 'Mythical Pebble', 'color_tag' => 'danger', 'multiplier' => 3.00],
        ];

        foreach ($rarities as $rarity) {
            $newRarity = new Rarity();
            $newRarity->name = $rarity['name'];
            $newRarity->color_tag = $rarity['color_tag'];
            $newRarity->multiplier = $rarity['multiplier'];
            $newRarity->save();
        }
    }
}
