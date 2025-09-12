<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // $password = 'irene143143';
        // $hash_password = bcrypt($password);
        // User::factory()->create([
        //     'name' => 'IRENE JOY',
        //     'email' => 'irenejoy15@gmail.com',
        //     'password' => $hash_password,
        // ]);

        Product::create([
            'price' => 1100,
            'title' => 'iPhone 14 Pro Max',
            'imageUrl' => 'https://image.made-in-china.com/318f0j00nEfGPdYIhWom/6%E6%9C%8814%E6%97%A5%287%29.mp4.webp',
        ]);

        Product::create([
            'price' => 1700,
            'title' => 'Mac Book Pro 15',
            'imageUrl' => 'https://image.made-in-china.com/2f0j00CTdkRwQaYmzE/2023-Latest-Original-Good-Quality-Laptop-for-Book-15-2023-Laptop.webp',
        ]);

        Product::create([
            'price' => 1500,
            'title' => 'Samsung Phone',
            'imageUrl' => 'https://d1b5h9psu9yexj.cloudfront.net/60226/Samsung-Galaxy-S24_20240319-183738_full.jpeg',
        ]);

        Product::create([
            'price' => 900,
            'title' => 'Logitech Headset',
            'imageUrl' => 'https://resource.logitech.com/b_white/content/dam/logitech/en/products/headsets/zone-900/gallery/logitech-zone-900-gallery-1.png',
        ]);
    }
}
