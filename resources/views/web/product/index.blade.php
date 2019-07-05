@extends('layouts.master') 

@section('title') 
    Products 
@endsection 
@section('content')
<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url('https://images.unsplash.com/photo-1501236570302-906143a7c9f8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1000&q=80');">
		<h2 class="l-text2 t-center">
			Product
		</h2>
		<p class="m-text13 t-center">
			Acttoghetto Collections 
		</p>
	</section>


	<!-- Content page -->
    <section class="bgwhite p-t-55 p-b-65">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                    <div class="leftbar p-r-20 p-r-0-sm">

                        <div class="search-product pos-relative bo4 of-hidden mb-4">
                            <form action="{{ route('product.index') }}" method="get">
                                <input class="s-text7 size6 p-l-23 p-r-50" type="text" autocomplete="off" name="search" value="{{ !empty(request()->search) ? request()->search : '' }}" placeholder="Search Products...">
                                @foreach(request()->except('search') as $key => $value)
                                <input type="hidden" name="{{ $key }}" value="{{ $value }}" readonly>
                                @endforeach
                                <button type="submit" class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                                    <i class="fs-12 fa fa-search" aria-hidden="true"></i>
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
                                    @foreach(request()->except('sort') as $key => $value)
                                    <input type="hidden" name="{{ $key }}" value="{{ $value }}" readonly>
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
                        @foreach($products as $product)
                        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                    <img src="{{ URL::asset('assets/images/item-02.jpg') }}" alt="IMG-PRODUCT">

                                    <div class="block2-overlay trans-0-4">
                                        <div class="block2-btn-addcart w-size1 trans-0-4">
                                            <!-- Button -->
                                            <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="block2-txt p-t-20">
                                    <a href="/detail" class="block2-name dis-block s-text3 p-b-5">
                                        {{ $product->name }}
                                    </a>

                                    <span class="text-danger block2-price p-r-5">
                                        Rp {{ number_format($product->price,0,',','.') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    @if(count($products) > 0)
                    <div class="pagination flex-m flex-w p-t-26">
                        @for($i = 1; $i < $products->lastPage() + 1; $i++)
                            @if(request()->page == $i)
                            <a href="{{ $products->url($i) }}" class="item-pagination flex-c-m trans-0-4 active-pagination">{{ $i }}</a>
                            @else
                            <a href="{{ $products->url($i) }}" class="item-pagination flex-c-m trans-0-4 @if(empty(request()->page) && $i == 1) active-pagination @endif">{{ $i }}</a>
                            @endif
                        @endfor
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection