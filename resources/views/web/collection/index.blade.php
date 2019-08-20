@extends('layouts.master')

@section('title')
Collection
@endsection

@section('content')
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m"
    style="background-image: url('https://images.unsplash.com/photo-1501236570302-906143a7c9f8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1000&q=80');">
    <h2 class="l-text2 t-center">
        Acttoghetto Collections
    </h2>
</section>

<!-- Banner -->
<section class="banner bgwhite p-t-40 p-b-40">
    <div class="container">
        <div class="row">
            @foreach($collections->chunk(3) as $collection)
            <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                @foreach($collection as $item)
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <img src="{{ $item->path }}" alt="IMG-{{ $item->id }}">
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Banner -->
<section class="banner bgwhite p-t-40 p-b-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 p-0">
                <!-- block1 -->
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <img src="{{URL::asset('/assets/images/ACT1 Lookbook 3-1-2.jpg')}}" alt="IMG-BANNER">
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 hov-img-zoom pos-relative m-b-30">
                <img src="https://images.unsplash.com/photo-1486308510493-aa64833637bc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=700&q=60"
                    alt="IMG-BANNER">
            </div>
            <div class="col-sm-12 col-md-6 hov-img-zoom pos-relative m-b-30">
                <img src="https://images.unsplash.com/photo-1486308510493-aa64833637bc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=700&q=60"
                    alt="IMG-BANNER">
            </div>
            <div class="col-sm-12 col-md-4 hov-img-zoom pos-relative m-b-30">
                <img src="https://images.unsplash.com/photo-1486308510493-aa64833637bc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=700&q=60"
                    alt="IMG-BANNER">
            </div>
            <div class="col-sm-12 col-md-4 hov-img-zoom pos-relative m-b-30">
                <img src="https://images.unsplash.com/photo-1486308510493-aa64833637bc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=700&q=60"
                    alt="IMG-BANNER">
            </div>
            <div class="col-sm-12 col-md-4 hov-img-zoom pos-relative m-b-30">
                <img src="https://images.unsplash.com/photo-1486308510493-aa64833637bc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=700&q=60"
                    alt="IMG-BANNER">
            </div>
            <div class="col-sm-12 col-md-6 hov-img-zoom pos-relative m-b-30">
                <img src="https://images.unsplash.com/photo-1486308510493-aa64833637bc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=700&q=60"
                    alt="IMG-BANNER">
            </div>
            <div class="col-sm-12 col-md-6 hov-img-zoom pos-relative m-b-30">
                <img src="https://images.unsplash.com/photo-1486308510493-aa64833637bc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=700&q=60"
                    alt="IMG-BANNER">
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 p-0">
                <!-- block1 -->
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <img src="{{URL::asset('/assets/images/ACT1 Lookbook 3-1-2.jpg')}}" alt="IMG-BANNER">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection