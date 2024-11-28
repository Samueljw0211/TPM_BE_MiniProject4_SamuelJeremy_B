<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([categorySeeder::class]);

        $categories = [1, 2]; // Assume '1' is 'Halal' and '2' is 'NonHalal' in the categories table.

        $menus = [
            ['menu' => 'Chicken Curry', 'desc' => 'Spicy and flavorful', 'price' => 12.99],
            ['menu' => 'Vegetable Soup', 'desc' => 'Healthy choice', 'price' => 7.99],
            ['menu' => 'Beef Steak', 'desc' => 'Juicy grilled steak', 'price' => 19.99],
            ['menu' => 'Fried Rice', 'desc' => 'Classic dish', 'price' => 8.99],
            ['menu' => 'Pasta Alfredo', 'desc' => 'Creamy pasta', 'price' => 11.49],
            ['menu' => 'Sushi Platter', 'desc' => 'Fresh and delicious', 'price' => 14.99],
            ['menu' => 'Burger Deluxe', 'desc' => 'Loaded with toppings', 'price' => 9.99],
            ['menu' => 'Grilled Salmon', 'desc' => 'Tender and savory', 'price' => 17.99],
            ['menu' => 'Caesar Salad', 'desc' => 'Crisp and fresh', 'price' => 6.99],
            ['menu' => 'Tom Yum Soup', 'desc' => 'Thai spicy soup', 'price' => 9.49],
            ['menu' => 'Pad Thai', 'desc' => 'Stir-fried noodles', 'price' => 10.99],
            ['menu' => 'Margherita Pizza', 'desc' => 'Classic Italian', 'price' => 13.99],
            ['menu' => 'Barbecue Ribs', 'desc' => 'Smoky and tender', 'price' => 20.99],
            ['menu' => 'Ice Cream Sundae', 'desc' => 'Sweet and creamy', 'price' => 5.99],
            ['menu' => 'French Fries', 'desc' => 'Crispy and golden', 'price' => 3.99],
            ['menu' => 'Chicken Sandwich', 'desc' => 'Perfect for lunch', 'price' => 7.49],
            ['menu' => 'Fish Tacos', 'desc' => 'Fresh and tangy', 'price' => 8.49],
            ['menu' => 'Apple Pie', 'desc' => 'Warm and flaky', 'price' => 4.99],
            ['menu' => 'Chocolate Cake', 'desc' => 'Rich and moist', 'price' => 6.99],
            ['menu' => 'Grilled Veggies', 'desc' => 'Healthy and tasty', 'price' => 5.49],
        ];

        foreach ($menus as $menu) {
            DB::table('menus')->insert([
                'menuName' => $menu['menu'],
                'menuDesc' => $menu['desc'],
                'menuDateAdded' => Carbon::now()->subDays(rand(0, 365))->toDateString(),
                'menuPrice' => $menu['price'],
                'category_id' => $categories[array_rand(array: $categories)], // Randomly assigns category ID
            ]);
        }

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
