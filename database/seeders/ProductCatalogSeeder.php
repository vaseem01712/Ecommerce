<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductCatalogSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('🚀 Starting premium ecommerce catalog seeder...');

        /*
        |--------------------------------------------------------------------------
        | Categories
        |--------------------------------------------------------------------------
        */

        $categories = [
            [
                'name' => 'Fashion',
                'slug' => 'fashion',
                'description' => 'Premium fashion essentials, clothing and accessories.',
                'image' => 'https://images.unsplash.com/photo-1445205170230-053b83016050?w=900&auto=format&fit=crop',
            ],
            [
                'name' => 'Electronics',
                'slug' => 'electronics',
                'description' => 'Modern gadgets, smart devices and electronics.',
                'image' => 'https://images.unsplash.com/photo-1498049794561-7780e7231661?w=900&auto=format&fit=crop',
            ],
            [
                'name' => 'Home & Living',
                'slug' => 'home-living',
                'description' => 'Beautiful products for a modern and comfortable home.',
                'image' => 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?w=900&auto=format&fit=crop',
            ],
            [
                'name' => 'Sports',
                'slug' => 'sports',
                'description' => 'Sports equipment and active lifestyle essentials.',
                'image' => 'https://images.unsplash.com/photo-1517836357463-d25dfeac3438?w=900&auto=format&fit=crop',
            ],
            [
                'name' => 'Beauty',
                'slug' => 'beauty',
                'description' => 'Beauty, skincare and personal care essentials.',
                'image' => 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?w=900&auto=format&fit=crop',
            ],
            [
                'name' => 'Accessories',
                'slug' => 'accessories',
                'description' => 'Premium everyday accessories and lifestyle products.',
                'image' => 'https://images.unsplash.com/photo-1523779917675-b6ed3a42a561?w=900&auto=format&fit=crop',
            ],
            [
                'name' => 'Gaming',
                'slug' => 'gaming',
                'description' => 'Gaming gear, accessories and entertainment essentials.',
                'image' => 'https://images.unsplash.com/photo-1593305841991-05c297ba4575?w=900&auto=format&fit=crop',
            ],
            [
                'name' => 'Books',
                'slug' => 'books',
                'description' => 'Books for learning, creativity and personal growth.',
                'image' => 'https://images.unsplash.com/photo-1495446815901-a7297e633e8d?w=900&auto=format&fit=crop',
            ],
        ];

        $categoryIds = [];

        foreach ($categories as $category) {

            $existing = DB::table('categories')
                ->where('slug', $category['slug'])
                ->first();

            $data = [
                'name' => $category['name'],
                'slug' => $category['slug'],
                'description' => $category['description'],
                'image' => $category['image'],
                'is_active' => true,
                'deleted_at' => null,
                'updated_at' => now(),
            ];

            if ($existing) {

                DB::table('categories')
                    ->where('id', $existing->id)
                    ->update($data);

                $categoryId = $existing->id;

            } else {

                $data['created_at'] = now();

                $categoryId = DB::table('categories')
                    ->insertGetId($data);
            }

            $categoryIds[$category['slug']] = $categoryId;
        }

        $this->command->info('✅ 8 categories ready.');

        /*
        |--------------------------------------------------------------------------
        | Products
        |--------------------------------------------------------------------------
        */

        $products = [

            /*
            |--------------------------------------------------------------------------
            | FASHION
            |--------------------------------------------------------------------------
            */

            [
                'category' => 'fashion',
                'name' => 'Premium Oversized Cotton T-Shirt',
                'price' => 1499,
                'sale_price' => 999,
                'stock' => 48,
                'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=900&auto=format&fit=crop',
                'featured' => true,
            ],

            [
                'category' => 'fashion',
                'name' => 'Classic Premium Denim Jacket',
                'price' => 3499,
                'sale_price' => 2499,
                'stock' => 26,
                'image' => 'https://images.unsplash.com/photo-1543076447-215ad9ba6923?w=900&auto=format&fit=crop',
                'featured' => true,
            ],

            [
                'category' => 'fashion',
                'name' => 'Minimal Linen Shirt',
                'price' => 2299,
                'sale_price' => 1799,
                'stock' => 32,
                'image' => 'https://images.unsplash.com/photo-1603252110481-7ba873bf42ab?w=900&auto=format&fit=crop',
                'featured' => false,
            ],

            [
                'category' => 'fashion',
                'name' => 'Premium Casual Sneakers',
                'price' => 4999,
                'sale_price' => 3499,
                'stock' => 21,
                'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=900&auto=format&fit=crop',
                'featured' => true,
            ],

            /*
            |--------------------------------------------------------------------------
            | ELECTRONICS
            |--------------------------------------------------------------------------
            */

            [
                'category' => 'electronics',
                'name' => 'Wireless Noise Cancelling Headphones',
                'price' => 8999,
                'sale_price' => 6999,
                'stock' => 18,
                'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=900&auto=format&fit=crop',
                'featured' => true,
            ],

            [
                'category' => 'electronics',
                'name' => 'Smart Watch Pro Series',
                'price' => 12999,
                'sale_price' => 9999,
                'stock' => 15,
                'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=900&auto=format&fit=crop',
                'featured' => true,
            ],

            [
                'category' => 'electronics',
                'name' => 'Premium Wireless Speaker',
                'price' => 5999,
                'sale_price' => 4499,
                'stock' => 24,
                'image' => 'https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?w=900&auto=format&fit=crop',
                'featured' => false,
            ],

            [
                'category' => 'electronics',
                'name' => 'Minimal Mechanical Keyboard',
                'price' => 6999,
                'sale_price' => 5499,
                'stock' => 17,
                'image' => 'https://images.unsplash.com/photo-1587829741301-dc798b83add3?w=900&auto=format&fit=crop',
                'featured' => true,
            ],

            /*
            |--------------------------------------------------------------------------
            | HOME & LIVING
            |--------------------------------------------------------------------------
            */

            [
                'category' => 'home-living',
                'name' => 'Modern Ceramic Table Lamp',
                'price' => 2999,
                'sale_price' => 2199,
                'stock' => 30,
                'image' => 'https://images.unsplash.com/photo-1507473885765-e6ed057f782c?w=900&auto=format&fit=crop',
                'featured' => true,
            ],

            [
                'category' => 'home-living',
                'name' => 'Minimal Scandinavian Chair',
                'price' => 8999,
                'sale_price' => 6999,
                'stock' => 12,
                'image' => 'https://images.unsplash.com/photo-1503602642458-232111445657?w=900&auto=format&fit=crop',
                'featured' => false,
            ],

            [
                'category' => 'home-living',
                'name' => 'Luxury Scented Candle',
                'price' => 1299,
                'sale_price' => 899,
                'stock' => 45,
                'image' => 'https://images.unsplash.com/photo-1603006905003-be475563bc59?w=900&auto=format&fit=crop',
                'featured' => true,
            ],

            [
                'category' => 'home-living',
                'name' => 'Premium Minimal Wall Clock',
                'price' => 2499,
                'sale_price' => 1899,
                'stock' => 19,
                'image' => 'https://images.unsplash.com/photo-1563861826100-9cb868fdbe1c?w=900&auto=format&fit=crop',
                'featured' => false,
            ],

            /*
            |--------------------------------------------------------------------------
            | SPORTS
            |--------------------------------------------------------------------------
            */

            [
                'category' => 'sports',
                'name' => 'Professional Running Shoes',
                'price' => 6999,
                'sale_price' => 4999,
                'stock' => 35,
                'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=900&auto=format&fit=crop',
                'featured' => true,
            ],

            [
                'category' => 'sports',
                'name' => 'Premium Training Dumbbells',
                'price' => 3999,
                'sale_price' => 2999,
                'stock' => 20,
                'image' => 'https://images.unsplash.com/photo-1583454110551-21f2fa2afe61?w=900&auto=format&fit=crop',
                'featured' => false,
            ],

            [
                'category' => 'sports',
                'name' => 'Performance Yoga Mat',
                'price' => 1999,
                'sale_price' => 1399,
                'stock' => 42,
                'image' => 'https://images.unsplash.com/photo-1601925260368-ae2f83cf8b7f?w=900&auto=format&fit=crop',
                'featured' => true,
            ],

            [
                'category' => 'sports',
                'name' => 'Professional Sports Backpack',
                'price' => 3499,
                'sale_price' => 2499,
                'stock' => 27,
                'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=900&auto=format&fit=crop',
                'featured' => false,
            ],

            /*
            |--------------------------------------------------------------------------
            | BEAUTY
            |--------------------------------------------------------------------------
            */

            [
                'category' => 'beauty',
                'name' => 'Luxury Skincare Essentials Set',
                'price' => 4999,
                'sale_price' => 3499,
                'stock' => 23,
                'image' => 'https://images.unsplash.com/photo-1556228578-8c89e6adf883?w=900&auto=format&fit=crop',
                'featured' => true,
            ],

            [
                'category' => 'beauty',
                'name' => 'Premium Facial Serum',
                'price' => 2499,
                'sale_price' => 1799,
                'stock' => 38,
                'image' => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?w=900&auto=format&fit=crop',
                'featured' => true,
            ],

            [
                'category' => 'beauty',
                'name' => 'Hydrating Body Care Kit',
                'price' => 2999,
                'sale_price' => 2199,
                'stock' => 29,
                'image' => 'https://images.unsplash.com/photo-1611930022073-b7a4ba5fcccd?w=900&auto=format&fit=crop',
                'featured' => false,
            ],

            [
                'category' => 'beauty',
                'name' => 'Premium Makeup Organizer',
                'price' => 1799,
                'sale_price' => 1299,
                'stock' => 31,
                'image' => 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?w=900&auto=format&fit=crop',
                'featured' => false,
            ],

            /*
            |--------------------------------------------------------------------------
            | ACCESSORIES
            |--------------------------------------------------------------------------
            */

            [
                'category' => 'accessories',
                'name' => 'Premium Leather Wallet',
                'price' => 2499,
                'sale_price' => 1799,
                'stock' => 40,
                'image' => 'https://images.unsplash.com/photo-1627123424574-724758594e93?w=900&auto=format&fit=crop',
                'featured' => true,
            ],

            [
                'category' => 'accessories',
                'name' => 'Classic Luxury Sunglasses',
                'price' => 3999,
                'sale_price' => 2999,
                'stock' => 22,
                'image' => 'https://images.unsplash.com/photo-1511499767150-a48a237f0083?w=900&auto=format&fit=crop',
                'featured' => true,
            ],

            [
                'category' => 'accessories',
                'name' => 'Minimalist Leather Belt',
                'price' => 1999,
                'sale_price' => 1499,
                'stock' => 34,
                'image' => 'https://images.unsplash.com/photo-1624222247344-550fb60583dc?w=900&auto=format&fit=crop',
                'featured' => false,
            ],

            [
                'category' => 'accessories',
                'name' => 'Premium Travel Backpack',
                'price' => 4999,
                'sale_price' => 3799,
                'stock' => 18,
                'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=900&auto=format&fit=crop',
                'featured' => true,
            ],

            /*
            |--------------------------------------------------------------------------
            | GAMING
            |--------------------------------------------------------------------------
            */

            [
                'category' => 'gaming',
                'name' => 'RGB Gaming Headset',
                'price' => 5999,
                'sale_price' => 4499,
                'stock' => 25,
                'image' => 'https://images.unsplash.com/photo-1599669454699-248893623440?w=900&auto=format&fit=crop',
                'featured' => true,
            ],

            [
                'category' => 'gaming',
                'name' => 'Pro Gaming Controller',
                'price' => 4999,
                'sale_price' => 3999,
                'stock' => 16,
                'image' => 'https://images.unsplash.com/photo-1592840496694-26c035b52b48?w=900&auto=format&fit=crop',
                'featured' => true,
            ],

            [
                'category' => 'gaming',
                'name' => 'RGB Gaming Keyboard',
                'price' => 6999,
                'sale_price' => 5499,
                'stock' => 14,
                'image' => 'https://images.unsplash.com/photo-1618384887929-16ec33fab9ef?w=900&auto=format&fit=crop',
                'featured' => false,
            ],

            [
                'category' => 'gaming',
                'name' => 'Professional Gaming Mouse',
                'price' => 2999,
                'sale_price' => 2199,
                'stock' => 33,
                'image' => 'https://images.unsplash.com/photo-1527814050087-3793815479db?w=900&auto=format&fit=crop',
                'featured' => false,
            ],

            /*
            |--------------------------------------------------------------------------
            | BOOKS
            |--------------------------------------------------------------------------
            */

            [
                'category' => 'books',
                'name' => 'The Modern Business Playbook',
                'price' => 899,
                'sale_price' => 699,
                'stock' => 50,
                'image' => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=900&auto=format&fit=crop',
                'featured' => true,
            ],

            [
                'category' => 'books',
                'name' => 'Design Thinking Handbook',
                'price' => 1299,
                'sale_price' => 999,
                'stock' => 36,
                'image' => 'https://images.unsplash.com/photo-1543002588-bfa74002ed7e?w=900&auto=format&fit=crop',
                'featured' => false,
            ],
        ];

        /*
        |--------------------------------------------------------------------------
        | Insert / Update Products
        |--------------------------------------------------------------------------
        */

        $productCount = 0;

        foreach ($products as $product) {

            if (!isset($categoryIds[$product['category']])) {
                continue;
            }

            $categoryId = $categoryIds[$product['category']];

            $slug = Str::slug($product['name']);

            $data = [
                'category_id' => $categoryId,
                'name' => $product['name'],
                'slug' => $slug,
                'description' => $this->generateDescription(
                    $product['name']
                ),
                'price' => $product['price'],
                'sale_price' => $product['sale_price'],
                'stock' => $product['stock'],

                // DIRECT IMAGE URL
                'image' => $product['image'],

                'is_active' => true,
                'is_featured' => $product['featured'],
                'deleted_at' => null,
                'updated_at' => now(),
            ];

            $existing = DB::table('products')
                ->where('slug', $slug)
                ->first();

            if ($existing) {

                DB::table('products')
                    ->where('id', $existing->id)
                    ->update($data);

            } else {

                $data['created_at'] = now();

                DB::table('products')
                    ->insert($data);
            }

            $productCount++;
        }

        /*
        |--------------------------------------------------------------------------
        | Finished
        |--------------------------------------------------------------------------
        */

        $this->command->newLine();

        $this->command->info(
            "🎉 {$productCount} products ready!"
        );

        $this->command->info(
            '🎨 8 categories + 30 products + online images added.'
        );

        $this->command->info(
            '✨ Premium ecommerce catalog is ready.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Product Description
    |--------------------------------------------------------------------------
    */

    private function generateDescription(string $name): string
    {
        return "Discover the {$name}, designed for modern lifestyles with a premium finish, reliable quality and an elegant everyday experience. A carefully selected product for customers who value style, performance and quality.";
    }
}
