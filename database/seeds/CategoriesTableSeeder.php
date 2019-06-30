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
        $categories = [
            [
                'name' => 'Kaos'
            ],
            [
                'name' => 'Kalung'
            ],
            [
                'name' => 'Cincin'
            ]
        ];
        foreach ($categories as $key => $category) {
            Category::create($category);
        }
    }
}
