<?php

use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::truncate();
        Banner::create([
            'title' => 'Diskon Lebaran',
            'subtitle' => 'All item 50% off',
            'image' => 'https://picsum.photos/id/4/1680/250'
        ]);
        Banner::create([
            'title' => 'Diskon Natal',
            'subtitle' => 'All item 50% off',
            'image' => 'https://picsum.photos/id/4/1680/250'
        ]);
        Banner::create([
            'title' => 'Payday',
            'subtitle' => 'All item 50% off',
            'image' => 'https://picsum.photos/id/4/1680/250'
        ]);
    }
}
