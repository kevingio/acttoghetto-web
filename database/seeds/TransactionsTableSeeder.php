<?php

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Product;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::truncate();
        TransactionDetail::truncate();
        for ($i=1; $i <= 8; $i++) { 
            $product = Product::with('category.sizes')->find(rand(1,500));
            $sizeIds = $product->category->sizes;
            $transaction = Transaction::create([
                'number' => 'ACT00000'.$i,
                'user_id' => 3,
                'is_paid' => rand(0,1),
                'total' => $product->price * 3,
                'shipping_address' => 'Jl. Palagan tentara pelajar km 7 No. 17, Ngaglik, Sleman, Yogyakarta'
            ]);
            TransactionDetail::create([
                'product_id' => $product->id,
                'qty' => 3,
                'price' => $product->price,
                'size_id' => $sizeIds[rand(0, count($sizeIds) - 1)]->id
            ]);
        }
    }
}
