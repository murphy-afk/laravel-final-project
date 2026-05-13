<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rocks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('weight');
            $table->string('texture');
            $table->string('color');
            $table->text('origin_story')->nullable();
            $table->decimal('price', 8, 2);
            $table->boolean('adopted')->default(false);
            $table->string('image_url')->nullable();
            $table->foreignId('type_id')->constrained('rock_types');
            $table->foreignId('mood_id')->constrained('moods');
            $table->foreignId('rarity_id')->constrained('rarities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rocks');
    }
};
