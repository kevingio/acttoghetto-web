<?php

use Illuminate\Database\Seeder;
use App\Models\ProductImage;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductImage::truncate();
        for ($i=1; $i <= 500; $i++) {
            for ($j=0; $j < 3; $j++) {
                $random = rand(1,40);
                ProductImage::create([
                    'product_id' => $i,
                    'path' => 'https://picsum.photos/id/' . $random . '/720/960',
                    'thumbnail' => 'https://picsum.photos/id/' . $random . '/240/320',
                    'size' => 0
                ]);
            }
        }
    }
}
