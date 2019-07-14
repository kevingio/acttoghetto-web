@extends('admin.layouts.master')

@section('title') 
    Rekap Transactions
@endsection

@section('content')
    <div class="container-fluid">

        @include('admin.layouts.parts.card')

        <div class="row">
            <div class="col-xl-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <h4 class="mt-0 header-title">Rekap Transaksi</h4>
                            </div>
                        </div>

                        <div class="table-overflow" id="rekap-transactions-page">
                            <table id="rekapTransactionDataTable" class="table table-striped table-bordered dataTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="25%">Nomor Transaksi</th>
                                        <th width="15%">Total Transaksi</th>
                                        <th width="15%" class="no-sort">Tanggal</th>
                                        <th width="10%" class="no-sort">Status</th>
                                        <th width="10%" class="no-sort text-center">Pembayaran</th>
                                        <th width="10%" class="no-sort text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>A54745HGTYJ</td>
                                        <td>500</td>
                                        <td>2011/04/25</td>
                                        <td>pending</td>
                                        <td>pending</td>
                                        <td class="text-center">
                                            <button id="adminButtonModalTransactions" class="btn btn-outline-danger btn-admin-transactions btn-icon" data-id=""> 
                                                <i aria-hidden="true" class="mdi mdi-pencil"></i>
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

    </div> <!-- container-fluid -->
    @include('admin.web.transactions.modal-transactions')
@endsection