<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    function __construct(Product $product) {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = $this->product->with(['category', 'brand']);
        if(!empty($request->brand)) {
            $products = $products->whereHas('brand', function ($query) use ($request) {
                $query->where('name', $request->brand);
            });
        }
        if(!empty($request->category)) {
            $products = $products->whereHas('category', function ($query) use ($request) {
                $query->where('name', $request->category);
            });
        }
        if(!empty($request->q)) {
            $products = $products->where('name', 'like', "%{$request->q}%");
        }
        if(!empty($request->sort) && in_array(strtolower($request->sort), ['asc', 'desc'])) {
            $products = $products->orderBy('price', strtolower($request->sort));
        } else if(empty($request->sort)) {
            $products = $products->latest();
        }
        // return $products->get();
        return view('web.product.index');
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
        $this->product->create($data);
        return 'sukses';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->all();
        $product->update($data);
        return 'sukses';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return 'sukses';
    }
}
