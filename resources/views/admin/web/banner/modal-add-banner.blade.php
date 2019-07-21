<!-- Modal -->
<div id="adminModalAddBanner" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <form id="form-add-banner">
                <div class="modal-header">
                    <h6 class="modal-title font-weight-bold">Add Banner</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="nameAddBanner">Nama Banner</label>
                            <input type="text" class="form-control" name="name" autocomplete="off" placeholder="Nama Banner">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <label>Jenis Banner</label>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" value="man" checked>
                            <label class="form-check-label" for="radioAddTypeBannerMan">
                                Man
                            </label>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" value="woman">
                            <label class="form-check-label" for="radioAddTypeBannerWoman">
                                Woman
                            </label>
                        </div>
                    </div>

                    <div class="col-sm-12 mt-3">
                        <input type="file" name="image" accept=".png, .jpg, .jpeg" style="border: 0" required/>
                        <label for="addImageBannerUpload"></label>
                    </div>

                    <div class="col-sm-12 wrapper-preview">
                        <img id="previewAddImageBannerAdmin" class="pt-3 w-100" src="https://dummyimage.com/200x100/ffffff/fff" alt="your image" />
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-admin-save-change-banner"><i class="fas fa-save mr-2"></i> Tambah</button>
                </div>
            </form>
        </div>

    </div>
</div>
