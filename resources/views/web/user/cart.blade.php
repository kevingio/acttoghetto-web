@extends('layouts.master')

@section('page-title')
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
    <div class="container">
        <!-- Cart item -->
        <div class="container-table-cart pos-relative">
            <div class="wrap-table-shopping-cart bgwhite">
                <table class="table-shopping-cart">
                    <tr class="table-head">
                        <th class="column-1"></th>
                        <th class="column-2">Product</th>
                        <th class="column-4">Price</th>
                        <th class="column-1">Quantity</th>
                        <th class="column-4">Total</th>
                        <th class="column-1">Delete</th>
                    </tr>

                   
                    <tr class="table-row">
                        <td class="column-1">
                            <div class="b-rad-4 o-f-hidden">
                                <img src="" alt="IMG-PRODUCT">
                            </div>
                        </td>
                        <td class="column-2"></td>
                        <td class="column-3">,-</td>
                        <td class="column-4"></td>
                        <td class="column-5">,-</td>
                        <td class="column-1">
                            <a href=""><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    
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
                            <input class="border-input" type="text" name="name" autocomplete="off" value="" required>
                        </div>

                        <div class="col-12 col-md-2">
                            <label for="">Nomor Telp</label>
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <input class="border-input" type="text" name="name" autocomplete="off" value="" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-2">
                            <label for="">Alamat</label>
                        </div>
                        <div class="col-12 col-md-10">
                            <textarea class="border-input" rows="5" id="comment" value="" required></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm text-right">
            <button class="bg1 bo-rad-23 hov1 s-text1 trans-0-4 p-2" onclick="">
                    Update Cart
            </button>
        </div>

        <!-- Total -->
        <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
            <h5 class="m-text20 p-b-24">
                Cart Totals
            </h5>

            <!--  -->
            <div class="flex-w flex-sb-m p-b-12">
                <span class="s-text18 w-size19 w-full-sm">
                    Subtotal:
                </span>

                <span class="m-text21 w-size20 w-full-sm">
                   ,-
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
            <div class="flex-w flex-sb-m p-t-26 p-b-30">
                <span class="m-text22 w-size19 w-full-sm">
                    Total:
                </span>

                <span class="m-text21 w-size20 w-full-sm">
                    ,-
                </span>
            </div>

            <div class="size15 trans-0-4">
                <!-- Button -->
                <a class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" href="#">
                    Proceed to Checkout
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
