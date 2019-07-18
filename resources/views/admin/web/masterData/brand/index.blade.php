@extends('admin.layouts.master')

@section('title')
    Brand
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 mt-4">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-9">
                                <h4 class="mt-0 header-title">Brand</h4>
                            </div>
                            <div class="col-sm-3 text-right">
                                <button class="btn btn-danger w-100 btn-admin-add-brand" data-id=""> Tambah Brand </button>
                            </div>
                        </div>

                        <div class="table-overflow" id="adminBrandPage">
                            <table id="adminBrandDataTable" class="table table-striped table-bordered dataTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Brand</th>
                                        <th class="no-sort">Jenis Brand</th>
                                        <th width="20%" class="no-sort no-search">Image</th>
                                        <th width="15%" class="no-sort text-center">Action</th>
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
        @include('admin.web.masterData.brand.modal-edit-brand')
        @include('admin.web.masterData.brand.modal-add-brand')
    </div> <!-- container-fluid -->
@endsection
