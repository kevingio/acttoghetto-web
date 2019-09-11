<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        $categories = ['Kaos', 'Gelang', 'Sepatu'];
        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
