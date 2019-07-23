<!-- Modal -->
<div id="adminModalEditBrand" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <form id="form-edit-brand">
                <div class="modal-header">
                    <h6 class="modal-title font-weight-bold">Edit Brand</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="nameAddBrand">Nama Brand</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama Brand" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <label>Jenis Brand</label>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" value="man" checked>
                            <label class="form-check-label" for="radioAddTypeBrandMan">
                                Man
                            </label>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" value="woman">
                            <label class="form-check-label" for="radioAddTypeBrandWoman">
                                Woman
                            </label>
                        </div>
                    </div>

                    <div class="col-sm-12 mt-3">
                        <input type="file" name="image" accept=".png, .jpg, .jpeg" style="border: 0" />
                        <label for="addImageBrandUpload"></label>
                    </div>

                    <div class="col-sm-12">
                        <img id="previewEditImageBrandAdmin" class="pt-3 w-100" src="https://dummyimage.com/200x100/ffffff/fff" alt="your image" />
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-admin-save-change-brand"><i class="fas fa-save mr-2"></i> Simpan</button>
                </div>
            </form>
        </div>

    </div>
</div>
