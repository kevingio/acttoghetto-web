@extends('admin.layouts.master')

@section('title')
    Products
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-sm-12 col-md-4 col-lg-3 mt-4">
                <div class="wrapper-form-input mb-4">
                    <form action="{{ url('/admin/product') }}" method="get" autocomplete="off">
                        <input class="size-input rounded pl-4 pr-5" type="text" name="search" value="" placeholder="Search Products...">
                        @foreach(request()->except('search') as $key => $item)
                            <input type="hidden" name="{{ $key }}" value="{{ $item }}" readonly>
                        @endforeach
                        <button type="submit" class="style-icon-input">
                            <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-2 mt-4">
                <div class="mb-3 mb-sm-0">
                    <button type="button" class="btn btn-danger btn-block btn-admin-add-product" onclick="window.location.href = '/admin/product/create'" >
                        Add Product
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($products as $product)
            <div class="col-sm-12 col-md-6 col-lg-3">
                <a href="/admin/product/{{ $product->id }}">
                    <div class="block2">
                        <div class="block2-img overflow-hidden position-relative">
                            <img src="{{ $product->images[0]->thumbnail }}" class="w-100" alt="IMG-PRODUCT">
                        </div>

                        <div class="block2-txt pt-2">
                            <span class="h6 d-block pb-2">
                                {{ $product->name }}
                            </span>

                            <span class="d-block pb-2 h6">
                                {{ $product->category->name }}
                            </span>

                            <span class="d-block pb-2 h6">
                                Rp {{ number_format($product->price,0,',','.') }}
                            </span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            <div class="col-sm-12 text-center my-3">
                {{ $products->links('vendor.pagination.simple') }}
            </div>
            
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
@endsection
