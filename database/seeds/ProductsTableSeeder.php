<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 50; $i++) {
            Product::create([
                'category_id' => rand(1,3),
                'brand_id' => rand(1,4),
                'name' => $faker->name,
                'price' => rand(10000, 30000),
                'qty' => rand(3,10),
                'description' => $faker->paragraph
            ]);
        }
    }
}
