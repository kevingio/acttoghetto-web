@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')
<section class="slide1">
    <div class="wrap-slick1">
        <div class="slick1">
            <div class="item-slick1 item1-slick1" style="background-image: url('assets/images/banner/ACT_Lookbook_2_compressed.jpg');">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                    <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">

                    </span>

                    <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
                        New arrivals
                    </h2>

                    <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                        <!-- Button -->
                        <a href="{{ route('product.index') }}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite btn-white trans-0-4">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>

            <div class="item-slick1 item2-slick1" style="background-image: url('assets/images/banner/ACT_Lookbook_3_compressed.jpg');">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                    <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">

                    </span>

                    <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
                        Man Collection
                    </h2>

                    <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
                        <!-- Button -->
                        <a href="{{ route('product.index') }}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite btn-white trans-0-4">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>

            <div class="item-slick1 item3-slick1" style="background-image: url('assets/images/banner/ACT_Lookbook_1_compressed.jpg');">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                    <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">

                    </span>

                    <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
                        Woman Collection
                    </h2>

                    <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
                        <!-- Button -->
                        <a href="{{ route('product.index') }}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite btn-white trans-0-4">
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
                    <img src="{{ URL::asset('assets/images/feed/ACT1_FEED_STHN-10.jpg') }}" alt="IMG-BENNER">
                </div>

                <!-- block1 -->
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <img src="{{ URL::asset('assets/images/feed/ACT1_FEED_GAKSO-4.jpg') }}" alt="IMG-BENNER">
                </div>

                <!-- block1 -->
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <img src="{{ URL::asset('assets/images/feed/ACT1_FEED_STHN-12.jpg') }}" alt="IMG-BENNER">
                </div>
            </div>

            <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                <!-- block1 -->
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <img src="{{ URL::asset('assets/images/feed/ACT1_FEED_STHN-13s-compressed.jpg') }}" alt="IMG-BENNER">
                </div>

                <!-- block1 -->
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <img src="{{ URL::asset('assets/images/feed/ACT1_FEED_GAKSO-10-compressed.jpg') }}" alt="IMG-BENNER">
                </div>

                <!-- block1 -->
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <img src="{{ URL::asset('assets/images/feed/ACT1_FEED_GAKSO-3.jpg') }}" alt="IMG-BENNER">
                </div>
            </div>

            <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                <!-- block1 -->
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <img src="{{ URL::asset('assets/images/feed/ACT1_FEED_STHN-14-compressed.jpg') }}" alt="IMG-BENNER">
                </div>

                <!-- block1 -->
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <img src="{{ URL::asset('assets/images/feed/ACT1_FEED_STHN-4-compressed.jpg') }}" alt="IMG-BENNER">
                </div>

                <!-- block2 -->
                <div class="block2 wrap-pic-w pos-relative m-b-30">
                    <img src="{{ URL::asset('assets/images/feed/COMMENCE.png') }}" alt="IMG">

                    <div class="block2-content sizefull ab-t-l d-flex justify-content-center align-items-end">
                        <div class="w-size2 p-t-25 mb-5">
                            <!-- Button -->
                        <a href="{{ route('product.index') }}" class="flex-c-m size2 bgwhite bo-rad-23 btn-white s-text2 trans-0-4">
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
    <div class="carousel slide" data-ride="">
        <div class="carousel-inner">
            @foreach($banners as $banner)
            <div class="carousel-item @if($loop->first) active @endif" data-interval="300">
                <img class="d-block w-100" src="{{ asset($banner->image) }}" alt="{{ $banner->id }}">
                <div class="carousel-caption w-100">
                    <p class="font-weight-bold w-100 title-banner-promo">{{ $banner->title }}</p>
                    <p class="w-100 subtitle-banner-promo">{{ $banner->subtitle }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


@endsection
