@extends('admin.layouts.master')

@section('title')
    Ubah Produk
@endsection

@section('content')

<div class="container" id="editProductPage">
    <form>
        <div class="row">
            <div class="col-sm-12 col-md-6 mt-3">
                <div class="form-group">
                    <label for="editNameProduct">Nama Produk</label>
                    <input type="text" class="form-control" id="editNameProduct" aria-describedby="emailHelp" value="{{ $product->name }}" placeholder="Nama Produk" required>
                </div>
                
            </div>

            <div class="col-sm-12 col-md-3 mt-3">
                <div class="form-group">
                    <label for="editBrandProduct">Brand Produk</label>
                    <select class="form-control" name="brand_id" required>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" @if($brand->id == $product->brand_id) selected @endif>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-12 col-md-3 mt-3">
                <div class="form-group">
                    <label for="editCategoryProduct">Kategori Produk</label>
                    <select class="form-control" name="category_id" required>
                        @foreach($categorys as $category)
                            <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="editPriceProduct">Harga Produk</label>
                    <input type="text" class="form-control" id="editPriceProduct" value="{{ $product->price }}" placeholder="Harga Produk" required>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="editQtyProduct">Jumlah Produk</label>
                    <input type="text" class="form-control" id="editPriceProduct" value="{{ $product->qty }}" placeholder="Jumlah Produk" required>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="editNumberProduct">SKU</label>
                    <input type="text" class="form-control" id="editNumberProduct" value="{{ $product->sku }}" placeholder="SKU" required>
                </div>
            </div>
            
            <div class="col-12 col-md-3 mt-3">
                <div class="form-group">
                    <label for="editSizeProduct">Size Produk</label>
                    <select class="form-control" name="size_id" required>
                        <option value="">1</option>
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
                                <img src="" class="image-preview-custom-edit-product preview-image" alt="" for>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div>
                                    <p class="m-0 mt-3">Image 2</p>
                                </div>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="customFile3" name="filename[3]" accept=".png, .jpg, .jpeg" required>
                                    <label class="custom-file-label" for="customFile3">Choose file</label>
                                </div>
                            </td>
                            <td class="text-center pb-3 pt-3">
                                <img src="" class="image-preview-custom-edit-product preview-image"alt="">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <div>
                                    <p class="m-0 mt-3">Image 3</p>
                                </div>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="customFile4" name="filename[4]" accept=".png, .jpg, .jpeg" required>
                                    <label class="custom-file-label" for="customFile4">Choose file</label>
                                </div>
                            </td>
                            <td class="text-center pb-3 pt-3">
                                <img src="" class="image-preview-custom-edit-product preview-image" alt="">
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