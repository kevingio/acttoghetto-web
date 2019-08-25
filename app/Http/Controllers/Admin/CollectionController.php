<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Collection;
use Illuminate\Support\Facades\Storage;
use Image;

class CollectionController extends Controller
{

    function __construct(Collection $collection) {
        $this->collection = $collection;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.web.masterData.collection.index');
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
        $count = $this->collection->where('volume', $data['volume'])->count();
        if($count < 10) {
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = str_random(28) . '.jpg';
                $path = 'public/collections/' . $filename;
                $file = Image::make($image->getRealPath())->encode('jpg',75);
                Storage::put($path, (string) $file);
                $data['path'] = Storage::url($path);
                $data['size'] = $file->filesize();
            }
            $this->collection->create($data);
            return response()->json([
                'status' => 'data created'
            ], 201);
        } else {
            return response()->json([
                'message' => 'sudah melewati kuota'
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, Collection $collection)
    {
        $data = $request->all();
        if($request->hasFile('image')) {
            if(!strpos($collection->path, 'http')) {
                Storage::delete(str_replace('storage', 'public', $collection->path));
            }

            $image = $request->file('image');
            $filename = str_random(28) . '.jpg';
            $path = 'public/brands/' . $filename;
            $file = Image::make($image->getRealPath())->encode('jpg',75);
            Storage::put($path, (string) $file);
            $data['path'] = Storage::url($path);
        }
        $collection->update($data);
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
    public function destroy($id)
    {
        $collection = $this->collection->find($id);
        if(!strpos($collection->path, 'http')) {
            Storage::delete(str_replace('storage', 'public', $collection->path));
        }
        $collection->delete();
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
                return $this->collection->datatableForAdmin($request->volume);
                break;
        }
    }
}
