@extends('layouts.master')

@section('title')
    Transaction
@endsection
@section('content')
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url('{{ asset('assets/images/bg-my-transactions.jpeg') }}'); background-position: center">
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
                            <th width="20% no-search">Total Transaksi</th>
                            <th class="no-sort no-search">Tanggal</th>
                            <th width="15%" class="no-sort no-search">Status</th>
                            <th width="20%" class="no-sort no-search text-center">Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </section>
    @include('web.user.modal-upload')
@endsection
