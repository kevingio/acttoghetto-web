<!-- Modal -->
<div id="adminModalPreviewTransactions" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <form id="form-preview-transaction">

                <div class="modal-header d-block">
                    <h6 class="modal-title font-weight-bold d-block">Transaksi <span class="preview-transactions-number"></span></h6>
                    <p class="d-block m-0">Pembeli : <span class="user-name"></span></p>
                    <p class="d-block m-0">Penerima : <span class="receiver-name"></span></p>
                    <p class="d-block m-0">Nomor Telp : <span class="receiver-number"></span></p>
                    <p class="d-block m-0">Alamat Tujuan : <span class="receiver-address"></span></p>
                </div>
                <div class="modal-body row">
                    <div id="transactionProofSection" class="col-sm-12" style="display: none;">
                        <img id="previewImage" class="pb-3 w-100" src="https://dummyimage.com/200x100/ffffff/fff" alt="your image" />
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <p>Status Pemesanan : <span class="status-order font-weight-bold text-uppercase"></span></p>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <p>Status Pembayaran : <span class="status-paid font-weight-bold"></span></p>
                    </div>

                    <div class="col-sm-12">
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th class="text-left font-weight-bold" style="width: 30%;">Nama barang</th> 
                                    <th class="text-right font-weight-bold" style="width: 15%;">Size</th> 
                                    <th class="text-right font-weight-bold" style="width: 15%;">Jumlah</th> 
                                    <th class="text-right font-weight-bold" style="width: 20%;">Harga Produk</th>
                                    <th class="text-right font-weight-bold" style="width: 20%;">Total</th>
                                </tr>
                            </thead> 
                            <tbody class="tabel-body-modal-preview">
                            </tbody> 
                            <tfoot>
                                <tr style="height: 20px;"></tr> 
                                <tr class="text-right subheading text-success">
                                    <td colspan="4">Grand Total</td> 
                                    <td class="grand-total-products"></td>
                                </tr> 
                            </tfoot>
                        </table>
                    </div>

                    <div class="col-sm-12 wrapper-img-proof-transactions">
                        <p class="mb-3">Bukti Pembayaran</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-save-change-transaction-admin">Tutup</button>
                </div>
            </form>
        </div>

    </div>
</div>
