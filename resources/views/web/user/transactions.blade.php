@extends('layouts.master')

@section('title')
    Transaction
@endsection
@section('content')
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url('https://images.unsplash.com/photo-1556740714-a8395b3bf30f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80'); background-position: center">
        <h2 class="l-text2 t-center">
            My Transactions
        </h2>
    </section>

    <section class="cart bgwhite p-t-70 p-b-100" id="my-transactions-page">
        <div class="container">
            <div class="table-overflow">
                <table id="transactionDatatable" class="table table-striped table-bordered dataTable" style="width:100%">
                    <thead>
                        <tr>
                            <th width="20%">Nomor Transaksi</th>
                            <th width="20%">Total Transaksi</th>
                            <th class="no-sort">Tanggal</th>
                            <th width="15%" class="no-sort">Status</th>
                            <th width="20%" class="no-sort text-center">Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </section>
    @include('web.user.modal-upload')
@endsection
