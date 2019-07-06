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

    <section class="cart bgwhite p-t-70 p-b-100">
        <div class="container">
            <table id="tableTransactions" class="table table-striped table-bordered dataTable" style="width:100%">
        <thead>
            <tr>
                <th>Nomor Transaksi</th>
                <th class="w-15">Nominal</th>
                <th class="w-15"> Tanggal</th>
                <th class="w-10">Status</th>
                <th class="w-10">Detail</th>
                <th class="w-20">Bukti Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td class="text-center">
                    
                    <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#modalUpload">Upload</button>
                </td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td class="text-center">
                    
                    <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#modalUpload">Upload</button>
                </td>
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009/01/12</td>
                <td class="text-center">
                    <button type="button" class="btn btn-danger btn-lg d-none" data-toggle="modal" data-target="#modalUpload">Upload</button>
                    <p>Sudah Upload</p>
                </td>
            </tr>
        </tbody>
    </table>
        </div>
    </section>
    @include('web.user.modalupload')
@endsection