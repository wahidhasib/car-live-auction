<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carIds = DB::table('cars')->pluck('id')->toArray();

        foreach (range(1, 10) as $index) {
            DB::table('car_images')->insert([
                'car_id' => fake()->randomElement($carIds),
                'image_path' => 'images/cars/' . $index . '.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
