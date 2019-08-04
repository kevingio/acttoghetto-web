<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Image;

class BannerController extends Controller
{
    function __construct(Banner $banner) {
        $this->banner = $banner;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.web.banner.index');
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
            $filename = str_random(28) . '.jpg';
            $path = 'public/banners/' . $filename;
            $file = Image::make($image->getRealPath())->encode('jpg',75);
            Storage::put($path, (string) $file);
            $data['image'] = Storage::url($path);
        }
        $this->banner->create($data);
        return response()->json([
            'status' => 'data created'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return $banner;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $data = $request->all();
        if($request->hasFile('image')) {
            if(!strpos($banner->image, 'http')) {
                Storage::delete(str_replace('storage', 'public', $banner->image));
            }

            $image = $request->file('image');
            $filename = str_random(28) . '.jpg';
            $path = 'public/banners/' . $filename;
            $file = Image::make($image->getRealPath())->encode('jpg',75);
            Storage::put($path, (string) $file);
            $data['image'] = Storage::url($path);
        }
        $banner->update($data);
        return response()->json([
            'status' => 'data edited'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        if(!strpos($banner->image, 'http')) {
            Storage::delete(str_replace('storage', 'public', $banner->image));
        }
        $banner->delete();
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
                return $this->banner->datatableForAdmin();
                break;
        }
    }
}
