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
                                        <th>Nama Kategori</th>
                                        <th class="no-search no-sort">Size</th>
                                        <th width="15%" class="no-sort no-search text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>
                                            <span>
                                                <button type="button" class="btn btn-outline-warning btn-admin-edit-size btn-icon" data-id="" data-name="" data-size="">
                                                     <i aria-hidden="true" class="mdi mdi-pencil"></i>
                                                </button>
                                            </span>
                                            
                                            <span>
                                                <button type="button" class="btn btn-outline-danger btn-admin-delete-size btn-icon">
                                                     <i aria-hidden="true" class="mdi mdi-delete"></i>
                                                </button>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
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
