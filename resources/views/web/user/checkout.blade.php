@extends('layouts.master')

@section('title')
My Cart
@endsection

@section('content')
<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(https://images.unsplash.com/photo-1475275083424-b4ff81625b60?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1052&q=80); background-position: bottom">
    <h2 class="l-text2 t-center">
        Cart
    </h2>
</section>

<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
    <div class="container" id="checkout-section">
        <!-- Cart item -->
        <div class="container-table-cart pos-relative">
            <div class="wrap-table-shopping-cart bgwhite">
                <table class="table table-shopping-cart">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Product</th>
                            <th scope="col">Size</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody class="table-body-cart"></tbody>
                </table>
            </div>
        </div>

        <div class="p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
            <form action="" method="POST">
                <div class="form-group mb-0">
                    <div class="row">
                        <div class="col-12 col-md-2">
                            <label for="">Name</label>
                        </div>
                        <div class="col-12 col-md-5 mb-3">
                            <input class="border-input buyer-name" type="text" name="name" autocomplete="off" value="{{ auth()->user()->name }}" required>
                        </div>

                        <div class="col-12 col-md-2">
                            <label for="">Nomor Telp</label>
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <input class="border-input buyer-contact" type="text" name="contact" autocomplete="off" value="{{ auth()->user()->phone_number }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-2">
                            <label for="">Alamat</label>
                        </div>
                        <div class="col-12 col-md-10">
                            <textarea class="border-input buyer-address" rows="5" required>{{ auth()->user()->address }}</textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Total -->
        <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm wrapper-cart-totals">
            <h5 class="m-text20 p-b-24">
                Cart Totals
            </h5>

            <!--  -->
            <div class="flex-w flex-sb-m p-b-12 subtotal-cart-list-wrapper">
                <span class="s-text18 w-size19 w-full-sm">
                    Subtotal:
                </span>

                <span class="m-text21 w-size20 w-full-sm subtotal-cart-list">

                </span>
            </div>

            <!--  -->
            <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
                <span class="s-text18 w-size19 w-full-sm">
                    Shipping:
                </span>

                <div class="w-size20 w-full-sm">
                    <p class="s-text8 p-b-23">
                        Free shipping around the world
                    </p>
                </div>
            </div>

            <!--  -->
            <div class="flex-w flex-sb-m p-t-26 p-b-30 total-cart-list-wrapper">
                <span class="m-text22 w-size19 w-full-sm">
                    Total:
                </span>

                <span class="m-text21 w-size20 w-full-sm total-cart-list">

                </span>
            </div>

            <div class="wrapper-button-checkout-list-details size15 trans-0-4">
                <!-- Button -->
                <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                    Proceed to Checkout
                </button>
            </div>
        </div>
    </div>

    <div class="container" id="payment-info" style="display: none;">
        <div class="row">
            <div class="col-12 text-center">
                <h6>Terima kasih telah melakukan pemesanan. Pesanan anda telah kami terima.</h6>
                <h5 class="bolder my-3" id="transaction-number">ACT0000</h5>
                <p class="font-weight-bold">Biaya yang harus dibayarkan: </p>
                <h3 class="bolder text-danger my-3" id="transaction-total">Rp 0,-</h3>
                <p class="text-black">Metode pembayaran melalui rekening: </p>
                <img src="{{ asset('/assets/images/rekening.png') }}" class="img-fluid" alt="rekening" />
                <div class="text-center">
                    <a href="{{ route('transaction.index') }}" class="btn btn-primary mt-3">Konfirmasi Pembayaran</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
