<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            [
                'category_name' => 'Sports',
                'category_slug' => 'sports',
                'category_image' => 'sports.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'SUV',
                'category_slug' => 'suv',
                'category_image' => 'suv.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Luxury',
                'category_slug' => 'luxury',
                'category_image' => 'luxury.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Electric',
                'category_slug' => 'electric',
                'category_image' => 'electric.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Sedan',
                'category_slug' => 'sedan',
                'category_image' => 'sedan.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
