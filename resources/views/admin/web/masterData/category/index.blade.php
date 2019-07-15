@extends('admin.layouts.master')

@section('title')
    Master Data Category
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 mt-4">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-9">
                                <h4 class="mt-0 header-title">Category</h4>
                            </div>
                            <div class="col-sm-3 text-right">
                                <button class="btn btn-danger w-100 btn-admin-add-category" data-id=""> Tambah Kategori </button>
                            </div>
                        </div>

                        <div class="table-overflow" id="adminCategoryPage">
                            <table id="adminCategoryDataTable" class="table table-striped table-bordered dataTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Kategori</th>
                                        <th>Jenis Kategori</th>
                                        <th width="15%" class="no-sort text-center">Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>
                                            <span>
                                                <button type="button" class="btn btn-outline-warning btn-admin-edit-category btn-icon" data-id="">
                                                     <i aria-hidden="true" class="mdi mdi-pencil"></i>
                                                </button>
                                            </span>
                                            
                                            <span>
                                                <button type="button" class="btn btn-outline-danger btn-admin-delete-category btn-icon">
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
        @include('admin.web.masterData.category.modal-category')
        @include('admin.web.masterData.category.modal-add-category')
    </div> <!-- container-fluid -->
@endsection
