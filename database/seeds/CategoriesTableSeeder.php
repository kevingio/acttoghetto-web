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
        $categories = ['Kaos', 'Gelang', 'Sepatu', 'Celana', 'Kemeja', 'Kalung'];
        foreach ($categories as $key => $category) {
            Category::create([
                'name' => $category,
                'type' => 'man'
            ]);
            Category::create([
                'name' => $category,
                'type' => 'woman'
            ]);
        }
    }
}
