<?php

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::truncate();
        $brands = ['Adidas', 'Nike', 'Gucci', 'Prada', 'Balenciaga', 'Versace'];
        foreach ($brands as $key => $brand) {
            Brand::create([
                'name' => $brand,
                'type' => 'man'
            ]);
            Brand::create([
                'name' => $brand,
                'type' => 'woman'
            ]);
        }
    }
}
