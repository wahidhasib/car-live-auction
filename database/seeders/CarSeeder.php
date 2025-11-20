<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brandId = DB::table('brands')->pluck('id')->toArray();

        for ($i = 1; $i < 11; $i++) {
            DB::table('cars')->insert([
                'name' => fake()->company(),
                'slug' => Str::slug(fake()->company()),
                'brand_id' => fake()->randomElement($brandId),
                'rating' => fake()->numberBetween(1, 5),
                'description' => fake()->paragraph(4),
                'price' => fake()->randomFloat(2, 10000, 100000),
                'body_type' => fake()->numberBetween(1, 2), // assumes categories table has some data
                'condition' => fake()->numberBetween(1, 3), // 1=new, 2=used, 3=certified
                'milage' => fake()->numberBetween(1000, 80000),
                'transmission' => fake()->randomElement(['Automatic', 'Manual']),
                'year' => fake()->numberBetween(2015, 2024),
                'fuel_type' => fake()->randomElement(['Gasoline', 'Diesel', 'Electric', 'Hybrid']),
                'color' => fake()->safeColorName(),
                'doors' => fake()->numberBetween(2, 5),
                'cylenders' => fake()->numberBetween(3, 8),
                'engine' => fake()->numberBetween(500, 2000),
                'vin_number' => strtoupper(Str::random(17)),
                'meta_title' => fake()->paragraph(),
                'meta_description' => fake()->sentence(10),
                'meta_keywords' => implode(', ', fake()->words(5)),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
