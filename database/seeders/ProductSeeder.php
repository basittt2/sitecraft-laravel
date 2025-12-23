<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [

            [
                'name' => 'Wireless Headphones',
                'description' => 'High-quality wireless audio with deep bass and noise cancellation.',
                'price' => 4999,
                'image' => 'headphones.jpg',
                'category' => 'product',
            ],
            [
                'name' => 'Bluetooth Speaker',
                'description' => 'Portable speaker with rich sound and long battery life.',
                'price' => 7999,
                'image' => 'speaker.jpg',
                'category' => 'product',
            ],
            [
                'name' => 'Ergonomic Mouse',
                'description' => 'Comfort-designed mouse for everyday work and gaming.',
                'price' => 2499,
                'image' => 'mouse.jpg',
                'category' => 'product',
            ],
            [
                'name' => 'Mechanical Keyboard',
                'description' => 'RGB mechanical keyboard with smooth switches.',
                'price' => 8500,
                'image' => 'keyboard.jpg',
                'category' => 'product',
            ],
            [
                'name' => '1080p Webcam',
                'description' => 'Clear HD webcam ideal for meetings and streaming.',
                'price' => 5500,
                'image' => 'webcam.jpg',
                'category' => 'product',
            ],

            [
                'name' => 'Laptop Stand',
                'description' => 'Adjustable aluminum laptop stand for better posture.',
                'price' => 3200,
                'image' => 'laptopstand.jpg',
                'category' => 'product',
            ],
            [
                'name' => 'USB-C Hub',
                'description' => 'Multi-port hub supporting HDMI, USB 3.0, card reader, and Type-C charging.',
                'price' => 4500,
                'image' => 'hub.jpg',
                'category' => 'product',
            ],

            [
                'name' => 'Web Development Service',
                'description' => 'Fully customized websites for businesses, startups, and portfolios.',
                'price' => 20000,
                'image' => 'webdev.jpg',
                'category' => 'service',
            ],
            [
                'name' => 'Mobile App Development',
                'description' => 'Cross-platform Android/iOS apps built with modern frameworks.',
                'price' => 35000,
                'image' => 'appdev.jpg',
                'category' => 'service',
            ],
            [
                'name' => 'Game Development Service',
                'description' => '2D & 3D game development with Unity & Unreal Engine.',
                'price' => 45000,
                'image' => 'gamedev.jpg',
                'category' => 'service',
            ],

            [
                'name' => 'Graphic Design Service',
                'description' => 'Branding, posters, business cards, social media content & more.',
                'price' => 8000,
                'image' => 'graphic.jpg',
                'category' => 'service',
            ],
            [
                'name' => 'Video Editing Service',
                'description' => 'Professional editing for YouTube, reels, ads, & cinematic videos.',
                'price' => 12000,
                'image' => 'videoedit.jpg',
                'category' => 'service',
            ],
            [
                'name' => 'UI/UX Design Service',
                'description' => 'User-focused UI/UX designs for mobile and web applications.',
                'price' => 15000,
                'image' => 'uiux.jpg',
                'category' => 'service',
            ],

            [
                'name' => 'Portfolio Template',
                'description' => 'A sleek modern HTML/CSS template for personal portfolios.',
                'price' => 1500,
                'image' => 'portfolio.jpg',
                'category' => 'product',
            ],
            [
                'name' => 'Resume Pack Bundle',
                'description' => 'A pack of 5 professional resume designs (PDF + Editable).',
                'price' => 999,
                'image' => 'resume.jpg',
                'category' => 'product',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
