<!-- Modal -->
<div id="adminModalEditBanner" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <form id="form-edit-banner">
                <div class="modal-header">
                    <h6 class="modal-title font-weight-bold">Edit Banner</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="titleEditBanner">Title</label>
                            <input type="text" class="form-control" name="title" autocomplete="off" placeholder="Title">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="subTitleEditBanner">Sub Title</label>
                            <input type="text" class="form-control" name="subtitle" autocomplete="off" placeholder="SubTitle">
                        </div>
                    </div>

                    <div class="col-sm-12 mt-3">
                        <input type="file" name="image" accept=".png, .jpg, .jpeg" style="border: 0"/>
                        <label for="editImageBannerUpload"></label>
                    </div>

                    <div class="col-sm-12 wrapper-preview">
                        <img id="previewEditImageBannerAdmin" class="pt-3 w-100" src="https://dummyimage.com/200x100/ffffff/fff" alt="your image" />
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-admin-save-change-banner"><i class="fas fa-save mr-2"></i> Simpan</button>
                </div>
            </form>
        </div>

    </div>
</div>
