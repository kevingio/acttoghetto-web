@extends('layouts.master')

@section('title')
    Acttoghetto Lookbook {{ $collection[0]->volume }}
@endsection

@section('content')
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m"
    style="background-image: url('https://images.unsplash.com/photo-1501236570302-906143a7c9f8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1000&q=80');">
    <h2 class="l-text2 t-center">
        Acttoghetto Lookbook {{ $collection[0]->volume }}
    </h2>
</section>

<!-- Banner -->
<section class="banner bgwhite p-t-40 p-b-40">

    <!-- Row 1 - Block -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 p-0">
                <div class="block1 hov-img-zoom pos-relative m-b-30 max-h-img-fluid">
                    <img class="max-h-img-fluid" src="{{ asset($collection[0]->path) }}" alt="IMG-BANNER">
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach($collection as $key => $collection)
            <div class="col-sm-12 {{ in_array($key, [3,4,5]) ? 'col-md-4' : 'col-md-6' }} hov-img-zoom pos-relative m-b-30">
                <img class="{{ in_array($key, [3,4,5]) ? 'col-sm-12 col-md-4 max-h-img-sm' : 'col-sm-12 col-md-6 max-h-img-md' }}" src="https://images.unsplash.com/photo-1486308510493-aa64833637bc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=700&q=60"
                    alt="IMG-BANNER">
            </div>
            @endforeach
        </div>
    </div>

    @if(sizeof($collection) > 8)
    <!-- Row 5 - Block -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 p-0">
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <img class="max-h-img-fluid" src="{{ asset($collection[8]->path) }}" alt="IMG-BANNER">
                </div>
            </div>
        </div>
    </div>
    @endif
</section>
@endsection
