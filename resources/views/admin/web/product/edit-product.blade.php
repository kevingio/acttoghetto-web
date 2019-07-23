@extends('admin.layouts.master')

@section('title')
    Ubah Produk
@endsection

@section('content')

<div class="container-fluid pt-4" id="editProductPage">
    <form action="{{ route('admin.product.update', [$product->id])}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PATCH')
        <div class="row">
            <div class="col-sm-12">
                <div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
                    <a href="{{ url('/admin/product?type=') . urlencode(strtolower($product->brand->type)) }}" class="s-text16">
                        {{ ucwords($product->brand->type) }}
                        <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
                    </a>
            
                    <a href="/admin/product/{{ $product->id }}?type={{ $product->brand->type }}" class="s-text16">
                        {{ $product->name }}
                        <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
                    </a>

                    <span class="s-text17">
                        Edit Produk
                    </span>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 mt-3">
                <div class="form-group">
                    <label for="editNameProduct">Nama Produk</label>
                    <input type="text" class="form-control" name="name" aria-describedby="emailHelp" value="{{ $product->name }}" placeholder="Nama Produk">
                </div>

            </div>

            <div class="col-sm-12 col-md-3 mt-3">
                <div class="form-group">
                    <label for="editBrandProduct">Brand Produk</label>
                    <select class="form-control" name="brand_id">
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" @if($brand->id == $product->brand_id) selected @endif>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-12 col-md-3 mt-3">
                <div class="form-group">
                    <label for="editCategoryProduct">Kategori Produk</label>
                    <select class="form-control select-category" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="editPriceProduct">Harga Produk</label>
                    <input type="text" class="form-control" name="price" value="{{ $product->price }}" placeholder="Harga Produk">
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="editQtyProduct">Jumlah Produk</label>
                    <input type="text" class="form-control" name="qty" value="{{ $product->qty }}" placeholder="Jumlah Produk">
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="editNumberProduct">SKU</label>
                    <input type="text" class="form-control" name="sku" value="{{ $product->sku }}" placeholder="SKU">
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="editSizeProduct">Size Produk</label>
                    <select class="form-control select-size" name="size_id">
                        @foreach($sizes as $size)
                            <option value="{{ $size->id }}" @if($size->id == $product->size_id) selected @endif>{{ $size->text }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-12 mt-3">
                <table class="w-100">
                    <thead>
                        <tr>
                            <th class="text-left font-weight-bold" style="width: 50%;">Actions</th>
                            <th class="text-center font-weight-bold" style="width: 50%;">Image Preview</th>
                        </tr>
                    </thead>
                    <tbody class="mt-3">
                        <tr>
                            <td>
                                <div>
                                    <p class="m-0 mt-3">Main Image</p>
                                </div>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="customFile1" name="image[0]" accept=".png, .jpg, .jpeg">
                                    <label class="custom-file-label" for="customFile1">Choose file</label>
                                </div>
                            </td>
                            <td class="text-center pb-3 pt-3">
                                <img src="{{ $product->images[0]->path }}" class="image-preview-custom-product preview-image" alt="" for>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div>
                                    <p class="m-0 mt-3">Image 2</p>
                                </div>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="customFile2" name="image[1]" accept=".png, .jpg, .jpeg">
                                    <label class="custom-file-label" for="customFile2">Choose file</label>
                                </div>
                            </td>
                            <td class="text-center pb-3 pt-3">
                                <img src="{{ $product->images[1]->path }}" class="image-preview-custom-product preview-image"alt="">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div>
                                    <p class="m-0 mt-3">Image 3</p>
                                </div>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="customFile3" name="image[2]" accept=".png, .jpg, .jpeg">
                                    <label class="custom-file-label" for="customFile3">Choose file</label>
                                </div>
                            </td>
                            <td class="text-center pb-3 pt-3">
                                <img src="{{ $product->images[2]->path }}" class="image-preview-custom-product preview-image" alt="">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-sm-12 col-md-3 offset-md-9">
                <button type="button" class="btn btn-back mr-3" data-id="{{ $product->id }}" data-type="{{ $product->brand->type }}">
                    <i class="fas fa-times mr-2"></i> 
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save mr-2"></i>
                    Simpan
                </button>
            </div>
        </div>
    </form>
</div>

@endsection
