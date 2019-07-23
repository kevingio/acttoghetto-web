@extends('admin.layouts.master')

@section('title')
    Rekap Transaksi
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row pt-4">
            <div class="col-xl-4 col-md-6">
                <div class="card mini-stat bg-danger">
                    <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-cart float-right"></i>
                        </div>
                        <div class="text-white">
                            <h6 class="text-uppercase mb-3">Transaksi</h6>
                            <h4 class="mb-3">{{ $card['transaction'] }}</h4>
                            <i class="mdi mdi-refresh"></i> <span class="ml-2">Updated {{ date('F Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card mini-stat bg-danger">
                    <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-cube-outline float-right"></i>
                        </div>
                        <div class="text-white">
                            <h6 class="text-uppercase mb-3">Barang Terjual</h6>
                            <h4 class="mb-3">{{ $card['product_sold'] }} pcs</h4>
                            <i class="mdi mdi-refresh"></i> <span class="ml-2">Updated {{ date('F Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12">
                <div class="card mini-stat bg-danger">
                    <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-currency-usd float-right"></i>
                        </div>
                        <div class="text-white">
                            <h6 class="text-uppercase mb-3">Omset</h6>
                            <h4 class="mb-3">{{ $card['omzet'] }}</h4>
                            <i class="mdi mdi-refresh"></i> <span class="ml-2">Updated {{ date('F Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <h4 class="mt-0 header-title">Rekap Transaksi</h4>
                            </div>
                        </div>

                        <div class="table-overflow" id="transaction-recap-page">
                            <table id="transactionRecapDatatable" class="table table-striped table-bordered dataTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="15%">Nomor Transaksi</th>
                                        <th width="15%">Total Transaksi</th>
                                        <th class="no-sort">Tanggal</th>
                                        <th width="10%" class="no-sort">Status</th>
                                        <th width="15%" class="no-sort text-center">Pembayaran</th>
                                        <th width="10%" class="no-sort text-center">Action</th>
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

    </div> <!-- container-fluid -->
    @include('admin.web.transaction.modal-transaction')
    @include('admin.web.transaction.modal-preview-transaction')
@endsection
