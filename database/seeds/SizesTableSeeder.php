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
        for ($i=1; $i < 4; $i++) { 
            switch ($i) {
                case 1: {
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
                    break;
                }
                case 2: {
                    Size::create([
                        'category_id' => $i,
                        'text' => 'Kecil'
                    ]);
                    Size::create([
                        'category_id' => $i,
                        'text' => 'Besar'
                    ]);
                    break;
                }
                default: {
                    for ($j=41; $j < 45; $j++) { 
                        Size::create([
                            'category_id' => $i,
                            'text' => $j
                        ]);
                    }
                    break;
                }
            }
        }
    }
}
