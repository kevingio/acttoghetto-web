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

            <div class="col-xl-12 mt-4">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-9">
                                <h4 class="mt-0 header-title">Banner Promosi</h4>
                            </div>
                            <div class="col-sm-3 text-right">
                                <button class="btn btn-danger w-100 btn-admin-add-banner" data-id=""> Tambah Banner </button>
                            </div>
                        </div>

                        <div class="table-overflow" id="adminBannerPage">
                            <table id="adminBannerDataTable" class="table table-striped table-bordered dataTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="no-sort" width="15%">Title</th>
                                        <th class="no-sort" width="15%">Sub Title</th>
                                        <th class="no-sort  no-search">Image</th>
                                        <th class="no-sort text-center" width="15%" class="no-sort text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
        @include('admin.web.banner.preview')
        @include('admin.web.banner.modal-add-banner')
        @include('admin.web.banner.modal-edit-banner')
    </div> <!-- container-fluid -->
@endsection
