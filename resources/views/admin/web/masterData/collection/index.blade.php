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
                                        <select class="custom-select mr-sm-2" name="volume" required>
                                            <option selected>Semua Edisi</option>
                                            @for($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}">Edisi {{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-3 text-right mt-3 mt-sm-0">
                                <button class="btn btn-danger w-100 btn-admin-add-collection"> Tambah Collection </button>
                            </div>
                        </div>

                        <div class="table-overflow" id="adminCollectionPage">
                            <table id="adminCollectionDataTable" class="table table-striped table-bordered dataTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="15%" class="text-center">Edisi</th>
                                        <th width="70%" class="no-sort text-center no-search">Image</th>
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
        @include('admin.web.masterData.collection.modal-edit-collection')
        @include('admin.web.masterData.collection.modal-add-collection')
        @include('admin.web.masterData.collection.preview')
    </div> <!-- container-fluid -->
@endsection
