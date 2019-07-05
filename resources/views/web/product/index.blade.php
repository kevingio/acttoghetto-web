@extends('layouts.master') 

@section('title') 
    Products 
@endsection 
@section('content')
<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url('{{ URL::asset('assets/images/heading-pages-02.jpg') }}');">
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
                            <input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">

                            <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                                <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>

                        <!--  -->
                        <form action="" method="">                 
                            <ul class="p-b-54">
                                <li class="p-t-4">
                                    <h4 class="m-text14 p-b-7">
                                        Gender
                                    </h4>  
                                </li>

                                <li class="p-t-4">
                                    <div class="custom-controls-stacked d-block ">
                                        <label class="custom-control material-checkbox">
                                            <input type="checkbox" class="material-control-input">
                                            <span class="material-control-indicator"></span>
                                            <span class="material-control-description">All</span>
                                        </label>
                                    </div>
                                </li>

                                <li class="p-t-4">
                                    <div class="custom-controls-stacked d-block ">
                                        <label class="custom-control material-checkbox">
                                            <input type="checkbox" class="material-control-input">
                                            <span class="material-control-indicator"></span>
                                            <span class="material-control-description">Men</span>
                                        </label>
                                    </div>
                                </li>

                                <li class="p-t-4">
                                    <div class="custom-controls-stacked d-block ">
                                        <label class="custom-control material-checkbox">
                                            <input type="checkbox" class="material-control-input">
                                            <span class="material-control-indicator"></span>
                                            <span class="material-control-description">Woman</span>
                                        </label>
                                    </div>
                                </li>

                                <li class="p-t-4">
                                    <hr class="mb-3">
                                </li>

                                <li class="p-t-4">
                                    <h4 class="m-text14 p-b-7">
                                        Categories
                                    </h4>  
                                </li>

                                <li class="p-t-4">
                                    <div class="custom-controls-stacked d-block ">
                                        <label class="custom-control material-checkbox">
                                            <input type="checkbox" class="material-control-input">
                                            <span class="material-control-indicator"></span>
                                            <span class="material-control-description">All</span>
                                        </label>
                                    </div>
                                </li>

                                <li class="p-t-4">
                                    <div class="custom-controls-stacked d-block ">
                                        <label class="custom-control material-checkbox">
                                            <input type="checkbox" class="material-control-input">
                                            <span class="material-control-indicator"></span>
                                            <span class="material-control-description">Shoes</span>
                                        </label>
                                    </div>
                                </li>

                                <li class="p-t-4">
                                    <div class="text-right">
                                        <button class="btn btn-success">Filter</button>
                                    </div>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>

                <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                    <!--  -->
                    <div class="flex-sb-m flex-w p-b-35">
                        <div class="flex-w">
                            <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                                <form action="">
                                    <input type="hidden" readonly>
                                    <select class="selection-2" name="sorting">
                                    <option>Price: low to high</option>
                                    <option>Price: high to low</option>
                                </select>
                                </form>
                            </div>
                        </div>

                        <span class="s-text8 p-t-5 p-b-5">
                            Showing 1–12 of 16 results
                        </span>
                    </div>

                    <!-- Product -->
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                            <!-- Block2 -->
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
                                        Herschel supply co 25l
                                    </a>

                                    <span class="block2-price m-text6 p-r-5">
                                        $75.00
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination flex-m flex-w p-t-26">
                        <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
                        <a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection