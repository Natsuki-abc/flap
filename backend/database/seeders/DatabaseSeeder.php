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
            ->afterCreating(function ($user) {
                Deck::factory()->count(2)
                    ->for($user)
                    ->afterCreating(function ($deck) {
                        Card::factory()->count(5)
                            ->for($deck)
                            ->create();
                    })
                    ->create();
            })
        ->create();
    }
}
