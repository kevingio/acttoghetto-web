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
        if(!empty($request->search)) {
            $products = $products->where('name', 'like', "%{$request->search}%");
        }
        if(!empty($request->sort) && in_array(strtolower($request->sort), ['asc', 'desc'])) {
            $products = $products->orderBy('price', strtolower($request->sort));
        } else if(empty($request->sort)) {
            $products = $products->latest();
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
