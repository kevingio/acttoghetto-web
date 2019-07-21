@extends('admin.layouts.master')

@section('title')
    Tambah Produk
@endsection

@section('content')

<div class="container-fluid pt-4" id="addProductPage">
    <form action="{{ route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-sm-12 col-md-6 mt-3">
                <div class="form-group">
                    <label for="addNameProduct">Nama Produk</label>
                    <input type="text" class="form-control" id="addNameProduct" aria-describedby="emailHelp" placeholder="Nama Produk" required>
                </div>

            </div>

            <div class="col-sm-12 col-md-3 mt-3">
                <div class="form-group">
                    <label for="addBrandProduct">Brand Produk</label>
                    <select class="form-control" required>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-12 col-md-3 mt-3">
                <div class="form-group">
                    <label for="addCategoryProduct">Kategori Produk</label>
                    <select class="form-control" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="addPriceProduct">Harga Produk</label>
                    <input type="text" class="form-control" id="addPriceProduct" placeholder="Harga Produk" required>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="addQtyProduct">Jumlah Produk</label>
                    <input type="text" class="form-control" id="addPriceProduct" placeholder="Jumlah Produk" required>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="addNumberProduct">SKU</label>
                    <input type="text" class="form-control" id="addNumberProduct" placeholder="SKU" required>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="editSizeProduct">Size Produk</label>
                    <select class="form-control select-size" name="size_id">
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
                                    <input type="file" class="custom-file-input" id="customFile2" name="filename[2]" accept=".png, .jpg, .jpeg" required>
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
                                    <input type="file" class="custom-file-input" id="customFile3" name="filename[3]" accept=".png, .jpg, .jpeg" required>
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
                                    <input type="file" class="custom-file-input" id="customFile4" name="filename[4]" accept=".png, .jpg, .jpeg" required>
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

            <div class="col-sm-12 col-md-3 offset-md-9">
                <button type="submit" class="btn btn-primary w-100"><i class="fas fa-save mr-2"></i>Simpan</button>
            </div>
        </div>
    </form>
</div>

@endsection
