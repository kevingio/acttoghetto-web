<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
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
        for ($i=0; $i < 500; $i++) {
            $category = Category::find(rand(1,12));
            $brand = Brand::find(rand(1,8));
            Product::create([
                'category_id' => $category->id,
                'brand_id' => $brand->id,
                'sku' => 'ACHT-' . ($i + 1),
                'name' => $category->name . ' ' . $brand->name . ' ' . $faker->name,
                'price' => rand(10000, 30000),
                'size_id' => rand(1,51),
                'qty' => rand(3,10),
                'description' => $faker->paragraph
            ]);
        }
    }
}
