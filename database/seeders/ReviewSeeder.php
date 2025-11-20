<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 11; $i++) {
            Review::create([
                'car_id' => $i,
                'user_id' => 1,
                'rating' => fake()->numberBetween(1, 5),
                'comment' => fake()->sentence(3),
            ]);
        }
    }
}
