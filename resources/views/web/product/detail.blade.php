@extends('layouts.master') 

@section('title') 
    {{ $product->name }} 
@endsection 
@section('content')
<!-- breadcrumb -->
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

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						<div class="item-slick3" data-thumb="{{ URL::asset('assets/images/thumb-item-01.jpg') }}">
							<div class="wrap-pic-w">
								<img src="{{ URL::asset('assets/images/product-detail-01.jpg') }}" alt="IMG-PRODUCT">
							</div>
						</div>

						<div class="item-slick3" data-thumb="{{ URL::asset('assets/images/thumb-item-02.jpg') }}">
							<div class="wrap-pic-w">
								<img src="{{ URL::asset('assets/images/product-detail-02.jpg') }}" alt="IMG-PRODUCT">
							</div>
						</div>

						<div class="item-slick3" data-thumb="{{ URL::asset('assets/images/thumb-item-03.jpg') }}">
							<div class="wrap-pic-w">
								<img src="{{ URL::asset('assets/images/product-detail-03.jpg') }}" alt="IMG-PRODUCT">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					{{ $product->name }}
				</h4>

				<span class="text-danger m-text17">
					Rp {{ number_format($product->price,0,',','.') }}
				</span>

				<p class="s-text8 p-t-10">
					{{ $product->description }}
				</p>

				<!--  -->
				<div class="p-t-33 p-b-60">
					<div class="flex-m flex-w p-b-10">
						<div class="s-text15 w-size15 t-center">
							Size
						</div>

						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-2" name="size">
								<option>Choose an option</option>
								@foreach($product->category->sizes as $size)
								<option value="{{ $size->text }}">{{ $size->text }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product" type="number" name="num-product" value="1">

								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->
								<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
									Add to Cart
								</button>
							</div>
						</div>
					</div>
				</div>

				<div class="p-b-45">
					<span class="s-text8 m-r-35">SKU: {{ $product->sku }}</span>
				</div>

			</div>
		</div>
	</div>

@endsection