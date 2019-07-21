<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Image;

class ProductController extends Controller
{
    function __construct(Product $product, ProductImage $productImage, Brand $brand, Category $category, Size $size) {
        $this->product = $product;
        $this->productImage = $productImage;
        $this->brand = $brand;
        $this->category = $category;
        $this->size = $size;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = $this->product->with(['category.sizes', 'brand', 'images']);
        if(!empty($request->gender) && $request->gender != 'all') {
            $products = $products->whereHas('brand', function ($query) use ($request) {
                $query->where('type', $request->gender);
            });
        }
        if(!empty($request->search)) {
            $products = $products->where('name', 'like', "%{$request->search}%");
        }

        $products = $products->paginate(8);
        $products->appends(request()->input())->links();
        $brands = $this->brand->orderBy('name')->get(['name']);
        $categories = $this->category->groupBy('name')->orderBy('name')->get(['name']);
        return view('admin.web.product.index', compact('products', 'categories', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(empty($request->type)) {
            return redirect()->back();
        }
        $brands = $this->brand->where('type', $request->type)->get();
        $categories = $this->category->where('type', $request->type)->get();
        $sizes = $this->size->get();
        return view('admin.web.product.add-product', compact('brands', 'categories', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product->with(['category.sizes' , 'brand', 'images'])->find($id);

        return view('admin.web.product.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->with(['category.sizes' , 'brand', 'images'])->find($id);
        $brands = $this->brand->where('type', $product->brand->type)->get();
        $categories = $this->category->where('type', $product->category->type)->get();
        $sizes = $this->size->where('category_id', $product->size->category_id)->get();
        return view('admin.web.product.edit-product', compact('product', 'brands', 'categories', 'sizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $product = $this->product->find($id);
        if($request->hasFile('image')) {
            $oldImages = $this->productImage->where('product_id', $id)->get();
            $images = $request->file('image');
            foreach ($images as $key => $image) {
                if(!strpos($oldImages[$key]->path, 'http')) {
                    Storage::delete(str_replace('storage', 'public', $oldImages[$key]->path));
                }
                $filename = str_random(28) . '.jpg';
                $path = 'public/products/' . $filename;
                $file = Image::make($image->getRealPath())->encode('jpg',75);
                $size = $file->filesize();
                Storage::put($path, (string) $file);

                $imageUrl = Storage::url($path);
                $this->productImage->find($oldImages[$key]->id)->update([
                    'path' => $imageUrl,
                    'thumbnail' => $imageUrl,
                    'size' => $size
                ]);

            }
        }
        $product->update($data);
        return redirect()->route('admin.product.show', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
