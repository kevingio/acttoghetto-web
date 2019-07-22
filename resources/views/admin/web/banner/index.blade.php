@extends('admin.layouts.master')

@section('title')
    Banner Promo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-10 mt-3">
                <h5>Banner Promosi</h5>
            </div>
            <div class="col-sm-12 col-md-2 mt-3">
                <button class="btn btn-danger btn-admin-add-banner"> Tambah Banner </button>
            </div>
            <div class="col-sm-12 mt-3" id="adminBannerPage">
                <table class="table table-bordered w-100">
                    <thead>
                        <tr>
                            <th class="text-center font-weight-bold" style="width: 80%;">Image Preview</th> 
                            <th class="text-left font-weight-bold" style="width: 20%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="mt-3">
                        <tr>
                            <td class="text-center pb-3 pt-3">
                                <a href="#" class="pop">
                                    <img src="https://picsum.photos/200/300" class="image-preview-banner preview-image" alt="" for>
                                </a>
                            </td>
                            <td class=" text-center">
                                <button type="button" class="btn btn-outline-warning btn-admin-edit-banner btn-icon">
                                    <i aria-hidden="true" class="mdi mdi-pencil"></i>
                                </button>

                                <button type="button" class="btn btn-outline-danger btn-admin-delete-banner btn-icon">
                                    <i aria-hidden="true" class="mdi mdi-delete"></i>
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- end row -->
        @include('admin.web.banner.preview')
        @include('admin.web.banner.modal-add-banner')
        @include('admin.web.banner.modal-edit-banner')
    </div> <!-- container-fluid -->
@endsection
