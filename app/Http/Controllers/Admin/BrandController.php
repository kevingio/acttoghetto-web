<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Image;

class BrandController extends Controller
{

    function __construct(Brand $brand) {
        $this->brand = $brand;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = $this->brand->all();
        return $brands;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
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
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = str_random(28) . '.png';
            $path = 'public/brands/' . $filename;
            $file = Image::make($image->getRealPath())->encode('png',75);
            Storage::put($path, (string) $file);
            $data['image'] = Storage::url($path);
        }
        $this->brand->create($data);
        return response()->json([
            'status' => 'data created'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return $brand;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $data = $request->all();
        if($request->hasFile('image')) {
            if(!strpos($brand->image, 'http')) {
                Storage::delete(str_replace('storage', 'public', $brand->image));
            }

            $image = $request->file('image');
            $filename = str_random(28) . '.png';
            $path = 'public/brands/' . $filename;
            $file = Image::make($image->getRealPath())->encode('png',75);
            Storage::put($path, (string) $file);
            $data['image'] = Storage::url($path);
        }
        $brand->update($data);
        return response()->json([
            'status' => 'data edited'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        if(!strpos($brand->image, 'http')) {
            Storage::delete(str_replace('storage', 'public', $brand->image));
        }
        $brand->delete();
        return response()->json([
            'status' => 'deleted',
        ], 200);
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
                return $this->brand->datatableForAdmin();
                break;
        }
    }
}
