<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;

class TransactionController extends Controller
{
    function __construct(Transaction $transaction, TransactionDetail $transactionDetail, Product $product) {
        $this->transaction = $transaction;
        $this->transactionDetail = $transactionDetail;
        $this->product = $product;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.user.transactions');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        DB::transaction(function() use ($data) {
            $transaction = $this->transaction->create([
                'number' => $this->transaction->generateTransactionNumber(),
                'receiver' => $data['receiver'],
                'user_id'=> auth()->id(),
                'total' => $data['total'],
                'shipping_address' => $data['address'],
                'phone_number' => $data['contact']
            ]);
            foreach ($data['products'] as $key => $product) {
                $this->transactionDetail->create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $product['id'],
                    'qty' => $product['qty'],
                    'price' => $product['rawPrice'],
                    'size_id' => $this->product->getSizeId($product['id'], $product['size'])
                ]);
            }
        }, 3);

        return response()->json([
            'status' => 'data created'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    /**
     * Handle all AJAX request
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function ajax(Request $request)
    {
        switch ($request->mode) {
            case 'datatable':
                return $this->transaction->datatable();
                break;
        }
    }
}
