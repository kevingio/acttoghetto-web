<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Image;
use DB;

class ProductController extends Controller
{
    function __construct(Product $product, ProductImage $productImage, Category $category, Size $size) {
        $this->product = $product;
        $this->productImage = $productImage;
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
        $products = $this->product->with(['category.sizes', 'images'])->latest();
        if(!empty($request->search)) {
            $products = $products->where('name', 'like', "%{$request->search}%");
        }

        $products = $products->paginate(8);
        $products->appends(request()->input())->links();
        $categories = $this->category->groupBy('name')->orderBy('name')->get(['name']);
        return view('admin.web.product.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = $this->category->get();
        $sizes = $this->size->where('category_id', $categories[0]->id)->get();
        return view('admin.web.product.add-product', compact('categories', 'sizes'));
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
        $product = $this->product;
        DB::transaction(function () use ($data, $request, $product) {
            $product = $product->create($data);
            if($request->hasFile('image')) {
                $images = $request->file('image');
                foreach ($images as $key => $image) {
                    $filename = str_random(28) . '.jpg';
                    $path = 'public/products/' . $filename;
                    $file = Image::make($image->getRealPath())->encode('jpg',75);
                    $size = $file->filesize();
                    Storage::put($path, (string) $file);

                    $imageUrl = Storage::url($path);
                    $this->productImage->create([
                        'product_id' => $product->id,
                        'path' => $imageUrl,
                        'thumbnail' => $imageUrl,
                        'size' => $size
                    ]);

                }
            }
        }, 3);
        return redirect()->route('admin.product.show', [$product->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product->with(['category.sizes' , 'images'])->find($id);
        if(!$product) {
            return redirect()->back();
        }
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
        $product = $this->product->with(['category.sizes', 'images'])->find($id);
        $categories = $this->category->get();
        $sizes = $this->size->where('category_id', $product->size->category_id)->get();
        return view('admin.web.product.edit-product', compact('product', 'categories', 'sizes'));
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
        DB::transaction(function() use ($id, $data, $request) {
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
        }, 3);
        return redirect()->route('admin.product.show', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'status' => 'deleted'
        ], 200);
    }
}
