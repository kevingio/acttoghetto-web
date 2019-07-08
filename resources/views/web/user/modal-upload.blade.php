<!-- Modal -->
<div id="modalUpload" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title font-weight-bold">Upload Bukti Pembayaran</h6>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body row">
            <div class="col-sm-12">
                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                <label for="imageUpload"></label>
            </div>
            <div class="col-sm-12">
                <img id="previewImage" class="pt-3 w-100" src="https://dummyimage.com/200x100/ffffff/fff" alt="your image" />
            </div>
            
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-upload"></i> Upload</button>
        </div>
        </div>

    </div>
</div>
