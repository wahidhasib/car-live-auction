<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::insert([
            [
                'brand_title' => 'Toyota',
                'brand_logo' => 'toyota.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_title' => 'BMW',
                'brand_logo' => 'bmw.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_title' => 'Mercedes-Benz',
                'brand_logo' => 'mercedes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_title' => 'Honda',
                'brand_logo' => 'honda.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_title' => 'Ford',
                'brand_logo' => 'ford.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
