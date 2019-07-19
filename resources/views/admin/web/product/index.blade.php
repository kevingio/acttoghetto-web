@extends('admin.layouts.master')

@section('title')
    Products
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row justify-content-between">
            <div class="col-sm-12 col-md-4 col-lg-3 mt-4">
                <div class="wrapper-form-input mb-4">
                    <form action="" method="get" autocomplete="off">
                        <input class="size-input rounded pl-4 pr-5" type="text" name="search" value="" placeholder="Search Products...">
                        
                        <input type="hidden" name="" value="" readonly>
                        
                        <button type="submit" class="style-icon-input">
                            <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-2 mt-4">
                <div class="">
                    <button type="button" class="btn btn-danger btn-block btn-admin-add-product" data-id="" data-img="https://picsum.photos/id/372/800/800">
                        Add Item      
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3">
                
                <div class="block2">
                    <div class="block2-img overflow-hidden position-relative">
                        <img src="https://dummyimage.com/200x300/000/fff" class="w-100" alt="IMG-PRODUCT">

                        <div class="block2-overlay trans-0-4">
                            <div>
                                <div class="block2-btn-addcart w-size1 trans-0-4">
                                    <button type="button" class="btn rounded-pill mb-2 btn-admin-edit-product text-white" data-id="" data-img="https://picsum.photos/id/372/800/800">
                                        EDIT      
                                    </button>
                                    <button type="button" class="btn rounded-pill mb-2 btn-admin-delete-product text-white" data-id="" data-img="https://picsum.photos/id/372/800/800">
                                        DELETE      
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="block2-txt pt-2">
                        <a href="#" class="d-block pb-2">
                            name
                        </a>
                        <span class="d-block pb-2">
                            brand
                        </span>

                        <span class="d-block pb-2">
                            price
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
@endsection
