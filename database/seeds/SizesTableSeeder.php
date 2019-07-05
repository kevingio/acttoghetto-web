<?php

use Illuminate\Database\Seeder;
use App\Models\Size;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 13; $i++) { 
            if($i == 5) {
                for ($j=41; $j < 45; $j++) { 
                    Size::create([
                        'category_id' => $i,
                        'text' => $j
                    ]);
                }
            }
            else if($i == 6) {
                for ($j=36; $j < 41; $j++) { 
                    Size::create([
                        'category_id' => $i,
                        'text' => $j
                    ]);
                }
            }
            else if(in_array($i, [3,4,11,12])) {
                Size::create([
                    'category_id' => $i,
                    'text' => 'Kecil'
                ]);
                Size::create([
                    'category_id' => $i,
                    'text' => 'Besar'
                ]);
            } else {
                Size::create([
                    'category_id' => $i,
                    'text' => 'S'
                ]);
                Size::create([
                    'category_id' => $i,
                    'text' => 'M'
                ]);
                Size::create([
                    'category_id' => $i,
                    'text' => 'L'
                ]);
                Size::create([
                    'category_id' => $i,
                    'text' => 'XL'
                ]);
                Size::create([
                    'category_id' => $i,
                    'text' => 'XXL'
                ]);
                Size::create([
                    'category_id' => $i,
                    'text' => 'XXXL'
                ]);
            }
        }
    }
}
