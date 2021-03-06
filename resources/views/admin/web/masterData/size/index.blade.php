@extends('admin.layouts.master')

@section('title')
    Size
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 mt-4">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-9">
                                <h4 class="mt-0 header-title">Size</h4>
                            </div>
                            <div class="col-sm-3 text-right">
                                <button class="btn btn-danger w-100 btn-admin-add-size" data-id=""> Tambah Size </button>
                            </div>
                        </div>

                        <div class="table-overflow" id="adminSizePage">
                            <table id="adminSizeDataTable" class="table table-striped table-bordered dataTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="no-sort">Size</th>
                                        <th class="no-sort">Nama Kategori</th>
                                        <th width="15%" class="no-sort no-search text-center">Action</th>
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
        @include('admin.web.masterData.size.modal-edit-size')
        @include('admin.web.masterData.size.modal-add-size')
    </div> <!-- container-fluid -->
@endsection
