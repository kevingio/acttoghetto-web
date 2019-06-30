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
        $brands = [
            [
                'name' => 'Adidas'
            ],
            [
                'name' => 'Nike'
            ],
            [
                'name' => 'Gucci'
            ],
            [
                'name' => 'Prada'
            ]
        ];
        foreach ($brands as $key => $brand) {
            Brand::create($brand);
        }
    }
}
