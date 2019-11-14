@extends('layouts.master')

@section('title')
    Products
@endsection
@section('content')
<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url('{{ asset('assets/images/bg-product-page.jpeg') }}');">
		<h2 class="l-text2 t-center">
			Product
		</h2>
		<p class="m-text13 t-center">
			Acttoghetto Collections
		</p>
	</section>


	<!-- Content page -->
    <section class="bgwhite p-t-55 p-b-65" id="my-products-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                    <div class="leftbar p-r-20 p-r-0-sm">

                        <div class="search-product pos-relative bo4 of-hidden mb-4">
                            <form action="{{ route('product.index') }}" method="get">
                                <input class="s-text7 size6 p-l-23 p-r-50" type="text" autocomplete="off" name="search" value="{{ !empty(request()->search) ? request()->search : '' }}" placeholder="Search Products...">
                                @foreach(request()->except('search') as $key => $item)
                                    <input type="hidden" name="{{ $key }}" value="{{ $item }}" readonly>
                                @endforeach
                                <button type="submit" class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                                    <i class="fs-12 fa fa-search hov-text-black" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>

                        @include('web.product.sidemenu')
                    </div>
                </div>

                <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                    <!--  -->
                    <div class="flex-sb-m flex-w p-b-35">
                        @if($products->count() > 0)
                        <div class="flex-w">
                            <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                                <form action="{{ route('product.index') }}" method="get">
                                    @foreach(request()->except('sort') as $key => $item)
                                        <input type="hidden" name="{{ $key }}" value="{{ $item }}" readonly>
                                    @endforeach
                                    <select class="selection-2" name="sort" onchange="this.form.submit()">
                                        <option value="asc" @if(request()->sort == 'asc') selected @endif>Price: low to high</option>
                                        <option value="desc" @if(request()->sort == 'desc') selected @endif>Price: high to low</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        @endif

                        <span class="s-text8 p-t-5 p-b-5">
                            @if($products->count() > 0)
                                Showing {{ (($products->currentPage() - 1) * $products->perPage()) + 1 }}–{{ (($products->currentPage() - 1) * $products->perPage()) + $products->count() }} of {{ $products->total() }} results
                            @else
                                No results
                            @endif
                        </span>
                    </div>

                    <!-- Product -->
                    <div class="row">
                        @foreach($products as $key => $product)

                            <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                                <div class="block2">
                                    <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                        <img src="{{ count($product->images) > 0 ? asset($product->images[0]->thumbnail) : 'https://picsum.photos/id/' . rand(1,100) . '/240/320' }}" alt="Image-{{ $key + 1 }}">

                                        <div class="block2-overlay trans-0-4">
                                            <div class="block2-btn-addcart w-size1 trans-0-4" data-id="{{ $product->id }}" data-price="{{ $product->price }}" size="{{ $product->category->sizes[0]->text }}" sizeOption="{{ json_encode($product->category->sizes) }}">
                                                <!-- Button -->
                                                <button class="flex-c-m size1 btn-black bo-rad-23 hov1 s-text1 trans-0-4 btn-add hov-bg-white-outline-off" >
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="block2-txt p-t-20">
                                        <a href="{{ route('product.show',[$product->id]) }}" class="block2-name dis-block s-text3 p-b-5">
                                            {{ $product->name }}
                                        </a>
                                        
                                        <div style="display: flex; align-items: center;">
                                            <span class="block2-price p-r-5" style="text-decoration: line-through;">
                                                Rp {{ number_format($product->before_discount,0,',','.') }}
                                            </span>
                                            <small class="badge badge-danger text-white ml-2">11% off</small>
                                        </div>

                                        <p class="text-danger block2-price p-r-5">
                                            Rp {{ number_format($product->price,0,',','.') }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                    
                    {{ $products->links('vendor.pagination.simple') }}
                </div>
            </div>
        </div>
    </section>
@endsection
