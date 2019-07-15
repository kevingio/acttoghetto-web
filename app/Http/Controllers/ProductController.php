<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    function __construct(Product $product, Brand $brand, Category $category) {
        $this->product = $product;
        $this->brand = $brand;
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
        $products = $this->product->with(['category.sizes', 'brand', 'images']);
        if(!empty($request->brand) && $request->brand != 'all') {
            $products = $products->whereHas('brand', function ($query) use ($request) {
                $query->where('name', $request->brand);
            });
        }
        if(!empty($request->gender) && $request->gender != 'all') {
            $products = $products->whereHas('brand', function ($query) use ($request) {
                $query->where('type', $request->gender);
            });
        }
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
        }

        $products = $products->paginate(9);
        $products->appends(request()->input())->links();
        $brands = $this->brand->orderBy('name')->get(['name']);
        $categories = $this->category->groupBy('name')->orderBy('name')->get(['name']);
        return view('web.product.index', compact('brands', 'categories', 'products'));
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
        $product = $product->with(['category.sizes', 'brand'])->find($product->id);
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
