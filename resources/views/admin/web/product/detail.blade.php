@extends('admin.layouts.master')

@section('title')
    {{ $product->name }}
@endsection

@section('content')
<div class="container-fluid pt-4" id="adminProductDetailPage">
    <div class="row">
        <div class="col-sm-12">
            <div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
                <a href="{{ route('home') }}" class="s-text16">
                    Home
                    <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
                </a>

                <a href="{{ url('/product?gender=') . urlencode(strtolower($product->brand->type)) }}" class="s-text16">
                    {{ ucwords($product->brand->type) }}
                    <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
                </a>

                <a href="{{ url('/product?category=') . urlencode(strtolower($product->category->name)) }}" class="s-text16">
                    {{ $product->category->name }}
                    <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
                </a>

                <span class="s-text17">
                    {{ $product->name }}
                </span>
            </div>
        </div>
        
        <div class="col-sm-12 col-md-2 mt-3">
            <ul class="list-style-none">
                <li class="mb-3">
                    <img src="{{ $product->images[0]->path }}" class="w-100 image-detail-preview" alt="{{ $product->images[0]->path }}">
                </li>

                <li class="mb-3">
                    <img src="{{ $product->images[1]->path }}" class="w-100 image-detail-preview" alt="{{ $product->images[1]->path }}">
                </li>

                <li class="mb-3">
                    <img src="{{ $product->images[2]->path }}" class="w-100 image-detail-preview" alt="{{ $product->images[2]->path }}">
                </li>
            </ul>

        </div>

        <div class="col-sm-12 col-md-5 mt-3">
            <img src="{{ $product->images[0]->path }}" class="w-100 main-image-detail-preview" alt="main-image">
        </div>

        <div class="col-sm-12 col-md-5 mt-3">
            <h3>{{ $product->name }}</h3>
            <h5>{{ $product->brand->name }}</h5>
            <p class="text-danger h6">Rp {{ number_format($product->price,0,',','.') }}</p>
            <p>Size Available :
                @foreach($product->category->sizes as $item)
                <span>{{ $item->text }}</span>
                @if($loop->remaining != 0)
                    ,
                @endif
                @endforeach
            </p>
            <p>QTY : <span>{{ $product->qty }}</span></p>
            <p>Kategori : <span>{{ $product->category->name }} </span></p>
            <p>SKU : <span>{{ $product->sku }}</span></p>
            <p>{{ $product->description }}</p>

            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <button type="button" onclick="window.location.href = '/admin/product/{{ $product->id }}/edit?type={{ $product->brand->type }}'" class="btn btn-warning w-100">Edit</button>  
                </div>
                <div class="col-sm-12 col-md-6">
                    <button class="btn btn-danger btn-admin-delete-product w-100" data-id="{{ $product->id }}" gender="{{ $product->brand->type }}">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
