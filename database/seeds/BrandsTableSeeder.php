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
                'name' => 'Gucci',
                'image' => 'https://cdn11.bigcommerce.com/s-sq9zkarfah/products/84526/images/181341/Gucci-Logo-Decal-Sticker__30826.1511149149.500.750.jpg?c=2'
            ],
            [
                'name' => 'Adidas',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOFslnEnrWwFvCy5pJYiRcez2k2hmaAAE2bYzqpUcupyhjcx7R'
            ],
            [
                'name' => 'Prada',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSACRQd938R2pGFsGpA4YBWsi9dDphX0oWSo9Dv0KzNmun_R1kr'
            ],
            [
                'name' => 'Balenciaga',
                'image' => 'https://www.paragon.com.sg/media/1/stores/b/balenciaga_feature.jpg'
            ],
            [
                'name' => 'Versace',
                'image' => 'https://upload.wikimedia.org/wikipedia/en/7/75/Versace_logo.png'
            ],
            [
                'name' => 'Supreme',
                'image' => 'https://icon2.kisspng.com/20180401/adw/kisspng-t-shirt-hoodie-supreme-clothing-top-supreme-5ac106f2e41594.4492481215225996669342.jpg'
            ],
            [
                'name' => 'Luis Vuitton',
                'image' => 'https://smallimg.pngkey.com/png/small/46-464211_louis-vuitton-logo.png'
            ],
            [
                'name' => 'ZARA',
                'image' => 'https://seeklogo.net/wp-content/uploads/2014/10/zara-logo-preview.png'
            ]
        ];
        foreach ($brands as $key => $brand) {
            Brand::create([
                'name' => $brand['name'],
                'image' => $brand['image'],
                'type' => $key % 2 == 1 ? 'man' : 'woman'
            ]);
        }
    }
}
