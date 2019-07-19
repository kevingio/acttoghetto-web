@extends('admin.layouts.master')

@section('title')
    Products
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-2 mt-3">
            <ul class="list-style-none">
                <li class="mb-3">
                    <img src=" https://picsum.photos/id/44/240/320" class="w-100" alt="">
                </li>

                <li class="mb-3">
                    <img src=" https://picsum.photos/id/44/240/320" class="w-100" alt="">
                </li>

                <li class="mb-3">
                    <img src=" https://picsum.photos/id/44/240/320" class="w-100" alt="">
                </li>
            </ul>
            
        </div>

        <div class="col-sm-12 col-md-5 mt-3">
            <img src=" https://picsum.photos/id/44/240/320" class="w-100" alt="">
        </div>

        <div class="col-sm-12 col-md-5 mt-3">
            <h3>{{ $product->name }}</h3>
            <h5>{{ $product->brand->name }}</h5>
            <p>Rp {{ number_format($product->price,0,',','.') }}</p>
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
        
            <div>
                <button type="button" onclick="window.location.href = '/admin/product/{{ $product->id }}/edit?type={{ $product->brand->type }}'" class="btn btn-warning w-100">Edit</button>
                <button class="btn btn-danger w-100 mt-3">Delete</button>
            </div>
        </div>
    </div>
</div>

@endsection