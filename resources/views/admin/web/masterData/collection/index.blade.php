@extends('admin.layouts.master')

@section('title')
    Collection
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 mt-4">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-9">
                                <h4 class="mt-0 header-title">Collection</h4>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <select class="custom-select mr-sm-2" name="">
                                        <option selected>Semua Edisi</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-sm-3 text-right">
                                <button class="btn btn-danger w-100 btn-admin-add-collection" data-id=""> Tambah Collection </button>
                            </div>
                        </div>

                        <div class="table-overflow" id="adminCollectionPage">
                            <table id="adminCollectionDataTable" class="table table-striped table-bordered dataTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="15%">Edisi</th>
                                        <th width="70%" class="no-sort no-search">Image</th>
                                        <th width="15%" class="no-sort text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>
                                            <img class="w-100" src="https://images.unsplash.com/photo-1486308510493-aa64833637bc?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=700&amp;q=60" alt="IMG-BENNER">
                                        </td>
                                        <td class=" text-center">
                                            <button type="button" class="btn btn-outline-warning btn-admin-edit-collection btn-icon" data-img="" gender="" name="" data-id="">
                                                <i aria-hidden="true" class="mdi mdi-pencil"></i>
                                            </button>

                                            <button type="button" class="btn btn-outline-danger btn-admin-delete-collection btn-icon" data-id="">
                                                <i aria-hidden="true" class="mdi mdi-delete"></i>
                                            </button>
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
        @include('admin.web.masterData.collection.modal-edit-collection')
        @include('admin.web.masterData.collection.modal-add-collection')
    </div> <!-- container-fluid -->
@endsection
