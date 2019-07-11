<!-- Modal -->
<div id="modalUpload" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <form action="{{ route('transaction.store') }}" method="POST" enctype="multipart/form-data" id="form-upload-proof">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h6 class="modal-title font-weight-bold">Upload Bukti Pembayaran</h6>
                    <button type="button" class="close">&times;</button>
                </div>
                <div class="modal-body row">
                    <div class="col-sm-12">
                        <input type='file' id="imageUpload" name="proof" accept=".png, .jpg, .jpeg" required/>
                        <label for="imageUpload"></label>
                    </div>
                    <div class="col-sm-12">
                        <img id="previewImage" class="pt-3 w-100" src="https://dummyimage.com/200x100/ffffff/fff" alt="your image" />
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-upload mr-2"></i> Upload</button>
                </div>
            </form>
        </div>

    </div>
</div>
