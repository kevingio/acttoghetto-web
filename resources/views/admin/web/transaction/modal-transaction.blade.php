<!-- Modal -->
<div id="adminModalTransactions" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <form id="form-edit-status-transaction">

                <div class="modal-header">
                    <h6 class="modal-title font-weight-bold">Update Status Transaksi <span id="transactionNumber"></span></h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body row">
                    <div class="col-sm-12 col-md-6">
                        <label>Status Pemesanan</label>
                        <select class="form-control" name="status">
                            <option value="diproses">DIPROSES</option>
                            <option value="dikirim">DIKIRIM</option>
                            <option value="selesai">SELESAI</option>
                        </select>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <label>Status Pembayaran</label>
                        <select class="form-control" name="is_paid">
                            <option value="0">BELUM</option>
                            <option value="1">SUDAH</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-save-change-transaction-admin"><i class="fas fa-save mr-2"></i> Simpan</button>
                </div>
            </form>
        </div>

    </div>
</div>
