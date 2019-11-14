<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    function __construct(Product $product, Category $category) {
        $this->product = $product;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = $this->product->with(['category.sizes', 'images']);
        if(!empty($request->category) && $request->category != 'all') {
            $products = $products->whereHas('category', function ($query) use ($request) {
                $query->where('name', $request->category);
            });
        }
        if(!empty($request->search)) {
            $products = $products->where('name', 'like', "%{$request->search}%");
        }
        if(!empty($request->sort) && in_array(strtolower($request->sort), ['asc', 'desc'])) {
            $products = $products->orderBy('price', strtolower($request->sort));
        } else {
            $products = $products->orderBy('price', 'asc');
        }

        $products = $products->paginate(9);
        foreach($products as $product) {
            $product->before_discount = $product->price * 100/89;
        }
        $products->appends(request()->input())->links();
        $categories = $this->category->groupBy('name')->orderBy('name')->get(['name']);
        return view('web.product.index', compact('categories', 'products'));
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
        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  String $productName
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product = $product->with(['category.sizes'])->find($product->id);
        $product->before_discount = $product->price * 100/89;
        return view('web.product.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        abort(404);
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
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        abort(404);
    }
}
