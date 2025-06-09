<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Deck;
use App\Models\Card;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Factory
        User::factory()->count(10)
        ->has(
            Deck::factory()->count(2)
                ->state(['user_id' => $folder->user_id])
                ->for($folder)
                ->afterCreating(function ($deck) {
                    Card::factory()->count(5)
                        ->state(['user_id' => $deck->user_id])
                        ->for($deck)
                        ->create();
                })
            ->create()
        )
        ->create();
    }
}
