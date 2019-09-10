@extends('admin.layouts.master')

@section('title')
    Tambah Produk
@endsection

@section('content')

<div class="container-fluid pt-4" id="addProductPage">
    <form action="{{ route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-sm-12">
                <div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
                    <a href="{{ url('/admin/product') }}" class="s-text16">
                        Products
                    </a>

                    <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>

                    <span class="s-text17">
                        Tambah Produk
                    </span>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 mt-3">
                <div class="form-group">
                    <label for="addNameProduct">Nama Produk</label>
                    <input type="text" class="form-control" name="name" autocomplete="off" aria-describedby="emailHelp" placeholder="Nama Produk" required>
                </div>

            </div>

            <div class="col-12 col-md-3 mt-3">
                <div class="form-group">
                    <label for="addCategoryProduct">Kategori Produk</label>
                    <select class="form-control select-category" name="category_id" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-12 col-md-3 mt-3">
                <div class="form-group">
                    <label for="addPriceProduct">Harga Produk</label>
                    <input type="text" class="form-control" name="price" autocomplete="off" placeholder="Harga Produk" required>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="addQtyProduct">Jumlah Produk</label>
                    <input type="text" class="form-control" name="qty" autocomplete="off" placeholder="Jumlah Produk" required>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="addNumberProduct">SKU</label>
                    <input type="text" class="form-control" name="sku" autocomplete="off" placeholder="SKU" required>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="editSizeProduct">Size Produk</label>
                    <select class="form-control select-size" name="size_id" required>
                        @foreach($sizes as $size)
                            <option value="{{ $size->id }}">{{ $size->text }}</option>
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
                                    <input type="file" class="custom-file-input" id="customFile2" name="image[0]" accept=".png, .jpg, .jpeg" required>
                                    <label class="custom-file-label" for="customFile2">Choose file</label>
                                </div>
                            </td>
                            <td class="text-center pb-3 pt-3">
                                <img src="" class="image-preview-custom-product preview-image" alt="" for>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div>
                                    <p class="m-0 mt-3">Sub Image 2</p>
                                </div>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="customFile3" name="image[1]" accept=".png, .jpg, .jpeg" required>
                                    <label class="custom-file-label" for="customFile3">Choose file</label>
                                </div>
                            </td>
                            <td class="text-center pb-3 pt-3">
                                <img src="" class="image-preview-custom-product preview-image"alt="">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div>
                                    <p class="m-0 mt-3">Sub Image 3</p>
                                </div>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="customFile4" name="image[2]" accept=".png, .jpg, .jpeg" required>
                                    <label class="custom-file-label" for="customFile4">Choose file</label>
                                </div>
                            </td>
                            <td class="text-center pb-3 pt-3">
                                <img src="" class="image-preview-custom-product preview-image" alt="">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-sm-12 text-right pb-3">
                <button type="button" class="btn btn-back mr-3">
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
