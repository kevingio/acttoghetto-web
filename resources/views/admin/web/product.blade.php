@extends('admin.layouts.master')

@section('title')
    Products
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <h4 class="mt-0 header-title">Products</h4>
                            </div>
                            <div class="col-sm-2 text-right">
                                <button class="btn btn-danger w-100"> Edit </button>
                            </div>
                        </div>

                        <div class="table-overflow" id="products-page">
                            <table id="productsDataTable" class="table table-striped table-bordered dataTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="20%">Nomor Transaksi</th>
                                        <th width="20%">Total Transaksi</th>
                                        <th class="no-sort">Tanggal</th>
                                        <th width="15%" class="no-sort">Status</th>
                                        <th width="20%" class="no-sort text-center">Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>63</td>
                                        <td>2011/07/25</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
@endsection
