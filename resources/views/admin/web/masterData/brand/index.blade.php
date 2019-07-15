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
                                        <th>Jenis Brand</th>
                                        <th width="20%">Image</th>
                                        <th width="15%" class="no-sort text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>
                                            <img src="https://picsum.photos/id/372/800/800" class="w-100" alt="">
                                        </td>
                                        <td>
                                            <span>
                                                <button type="button" class="btn btn-outline-warning btn-admin-edit-brand btn-icon" data-id="" data-img="https://picsum.photos/id/372/800/800">
                                                     <i aria-hidden="true" class="mdi mdi-pencil"></i>
                                                </button>
                                            </span>
                                            
                                            <span>
                                                <button type="button" class="btn btn-outline-danger btn-admin-delete-brand btn-icon">
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
        @include('admin.web.masterData.brand.modal-edit-brand')
        @include('admin.web.masterData.brand.modal-add-brand')
    </div> <!-- container-fluid -->
@endsection
