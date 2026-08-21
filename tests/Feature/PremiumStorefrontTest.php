<?php

use App\Models\Category;
use App\Models\Product;

it('loads premium category and product pages with active catalog data', function () {
    $category = Category::create([
        'name' => 'Living Room',
        'slug' => 'living-room',
        'description' => 'Modern essentials for everyday living.',
        'image' => 'https://images.unsplash.com/photo-1494526585095-c41746248156?auto=format&fit=crop&w=1200&q=80',
        'is_active' => true,
    ]);

    Product::create([
        'category_id' => $category->id,
        'name' => 'Luna Accent Chair',
        'slug' => 'luna-accent-chair',
        'description' => 'A warm-toned statement chair with a clean silhouette and soft textured fabric.',
        'price' => 14999,
        'sale_price' => 12999,
        'stock' => 12,
        'image' => 'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=1200&q=80',
        'images' => [
            'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=1200&q=80',
            'https://images.unsplash.com/photo-1517705008128-361805f42e86?auto=format&fit=crop&w=1200&q=80',
        ],
        'is_active' => true,
        'is_featured' => true,
    ]);

    $categoryResponse = $this->get(route('products.category', $category->slug));
    $categoryResponse->assertOk();
    $categoryResponse->assertSee('Living Room');

    $productResponse = $this->get(route('products.show', 'luna-accent-chair'));
    $productResponse->assertOk();
    $productResponse->assertSee('Luna Accent Chair');
});
