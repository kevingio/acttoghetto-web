@extends('layouts.master')

@section('title')
    Home
@endsection
@section('content')

<section class="slide1">
    <div class="wrap-slick1">
        <div class="slick1">
            <div class="item-slick1 item1-slick1" style="background-image: url('{{ URL::asset('assets/images/master-slide-02.jpg') }}');">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                    <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
                        Women Collection 2018
                    </span>

                    <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
                        New arrivals
                    </h2>

                    <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                        <!-- Button -->
                        <a href="/sale" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>

            <div class="item-slick1 item2-slick1" style="background-image: url('{{ URL::asset('assets/images/master-slide-03.jpg') }}');">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                    <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
                        Women Collection 2018
                    </span>

                    <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
                        New arrivals
                    </h2>

                    <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
                        <!-- Button -->
                        <a href="/sale" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>

            <div class="item-slick1 item3-slick1" style="background-image: url('{{ URL::asset('assets/images/master-slide-04.jpg') }}');">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                    <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
                        Women Collection 2018
                    </span>

                    <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
                        New arrivals
                    </h2>

                    <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
                        <!-- Button -->
                        <a href="/sale" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Banner -->
<section class="banner bgwhite p-t-40 p-b-40">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                <!-- block1 -->
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <img src="{{ URL::asset('assets/images/banner-02.jpg') }}" alt="IMG-BENNER">
                </div>

                <!-- block1 -->
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <img src="{{ URL::asset('assets/images/banner-05.jpg') }}" alt="IMG-BENNER">
                </div>
            </div>

            <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                <!-- block1 -->
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <img src="{{ URL::asset('assets/images/banner-03.jpg') }}" alt="IMG-BENNER">
                </div>

                <!-- block1 -->
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <img src="{{ URL::asset('assets/images/banner-07.jpg') }}" alt="IMG-BENNER">
                </div>
            </div>

            <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                <!-- block1 -->
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <img src="{{ URL::asset('assets/images/banner-04.jpg') }}" alt="IMG-BENNER">
                </div>

                <!-- block2 -->
                <div class="block2 wrap-pic-w pos-relative m-b-30">
                    <img src="{{ URL::asset('assets/images/icons/bg-01.j') }}pg" alt="IMG">

                    <div class="block2-content sizefull ab-t-l flex-col-c-m">
                        <h4 class="m-text4 t-center w-size3 p-b-8">
                            Grab it Fast !!
                        </h4>

                        <p class="t-center w-size4">
                            Be the frist to know about the latest fashion news and get exclu-sive offers
                        </p>

                        <div class="w-size2 p-t-25">
                            <!-- Button -->
                            <a href="/sale" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
                                Shop
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="slide1-promo">
    <div class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="500">
                <img class="d-block w-100" src="{{ asset('assets/images/master-slide-05.jpg') }}" alt="1">
                <div class="carousel-caption">
                    <h3>1 Chicago</h3>
                    <p>Thank you, Chicago!</p>
                </div>
            </div>
            <div class="carousel-item" data-interval="500">
                <img class="d-block w-100" src="{{ asset('assets/images/master-slide-06.jpg') }}" alt="2">
                <div class="carousel-caption">
                    <h3>2 Chicago</h3>
                    <p>Thank you, Chicago!</p>
                </div>
            </div>
            <div class="carousel-item" >
                <img class="d-block w-100" src="{{ asset('assets/images/master-slide-07.jpg') }}" alt="3">
                <div class="carousel-caption">
                    <h3>3 Chicago</h3>
                    <p>Thank you, Chicago!</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our product -->
<section class="bgwhite p-t-45 p-b-58">
    <div class="container">
        <div class="sec-title p-b-22">
            <h3 class="m-text5 t-center">
                Our Products
            </h3>
        </div>

        <!-- Tab01 -->
        <div class="tab01">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#man-products" role="tab">Man</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#woman-products" role="tab">Woman</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content p-t-35">
                <!-- - -->
                <div class="tab-pane fade show active" id="man-products" role="tabpanel">
                    <div class="row">
                        @foreach($brandsForMan as $brand)
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                    <img src="{{ empty($brand->image) ? asset('assets/images/item-02.jpg') : $brand->image  }}" alt="IMG-PRODUCT">

                                    <div class="block2-overlay trans-0-4">
                                        <div class="block2-btn-addcart w-size1 trans-0-4">
                                            <!-- Button -->
                                            <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                See More
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="block2-txt p-t-20">
                                    <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5 text-center">
                                        {{ $brand->name }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

                <!-- - -->
                <div class="tab-pane fade" id="woman-products" role="tabpanel">
                    <div class="row">
                        @foreach($brandsForWoman as $brand)
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                    <img src="{{ empty($brand->image) ? asset('assets/images/item-02.jpg') : $brand->image  }}" alt="IMG-PRODUCT">

                                    <div class="block2-overlay trans-0-4">
                                        <div class="block2-btn-addcart w-size1 trans-0-4">
                                            <!-- Button -->
                                            <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                See More
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="block2-txt p-t-20">
                                    <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5 text-center">
                                        {{ $brand->name }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Shipping -->
<section class="shipping bgwhite p-t-62 p-b-46">
    <div class="sec-title p-b-52 p-l-15 p-r-15">
        <h3 class="m-text5 t-center">
            OUR SERVICE
        </h3>
    </div>
    <div class="flex-w p-l-15 p-r-15">
        <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
            <h4 class="m-text12 t-center">
                Shipping
            </h4>

            <span class="s-text11 t-center">
                Free shipping worlwide
            </span>
        </div>

        <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
            <h4 class="m-text12 t-center">
                30 Days Return
            </h4>

            <span class="s-text11 t-center">
                Simply return it within 30 days for an exchange.
            </span>
        </div>

        <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
            <h4 class="m-text12 t-center">
                Store Opening
            </h4>

            <span class="s-text11 t-center">
                Shop open 24x7 hours
            </span>
        </div>
    </div>
</section>
@endsection
