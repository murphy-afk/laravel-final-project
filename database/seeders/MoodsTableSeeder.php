<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mood;

class MoodsTableSeeder extends Seeder
{
    public function run(): void
    {
        $moods = [
            ['name' => 'Grumpy', 'emoji' => '😠', 'description' => 'Prefers to be left alone.'],
            ['name' => 'Sleepy', 'emoji' => '😴', 'description' => 'Low energy but adorable.'],
            ['name' => 'Chaotic Neutral', 'emoji' => '🤪', 'description' => 'Unpredictable but harmless.'],
            ['name' => 'Existential', 'emoji' => '😶‍🌫️', 'description' => 'Thinks too much.'],
        ];

        foreach ($moods as $mood) {
            $newMood = new Mood();
            $newMood->name = $mood['name'];
            $newMood->emoji = $mood['emoji'];
            $newMood->description = $mood['description'];
            $newMood->save();
        }
    }
}
