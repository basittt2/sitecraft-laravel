<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Wireless Headphones',
                'category' => 'Product',
                'price' => 14000,
                'image' => 'headphones.jpg',
                'description' => 'High-quality wireless headphones with noise cancellation.',
            ],
            [
                'name' => 'Bluetooth Speaker',
                'category' => 'Product',
                'price' => 22500,
                'image' => 'speaker.jpg',
                'description' => 'Portable Bluetooth speaker with deep bass and long battery life.',
            ],
            [
                'name' => 'Ergonomic Mouse',
                'category' => 'Product',
                'price' => 7000,
                'image' => 'mouse.jpg',
                'description' => 'Comfortable ergonomic mouse designed for long working hours.',
            ],
            [
                'name' => 'Web Development',
                'category' => 'Service',
                'price' => 50000,
                'image' => 'webdev.jpg',
                'description' => 'Custom website development and design services.',
            ],
            [
                'name' => 'Game Design Service',
                'category' => 'Service',
                'price' => 70000,
                'image' => 'game.jpg',
                'description' => 'Interactive 2D/3D game design and prototyping services.',
            ],
            [
                'name' => 'Movie Editing & Production',
                'category' => 'Service',
                'price' => 30000,
                'image' => 'movie.jpg',
                'description' => 'Professional movie editing, color grading, and post-production services.',
            ],
        ]);
    }
}
