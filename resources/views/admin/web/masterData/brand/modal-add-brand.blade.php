<!-- Modal -->
<div id="adminModalAddBrand" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data" id="form-add-brand">
               
                <div class="modal-header">
                    <h6 class="modal-title font-weight-bold">Add Brand</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="nameAddBrand">Nama Brand</label>
                            <input type="text" class="form-control" id="nameAddBrand" placeholder="Nama Brand">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <label>Jenis Brand</label>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="radioAddTypeBrandMan" value="option1" checked>
                            <label class="form-check-label" for="radioAddTypeBrandMan">
                                Man
                            </label>
                        </div>
                    </div>
                    
                    <div class="col-sm-12">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="radioAddTypeBrandWoman" value="option2">
                            <label class="form-check-label" for="radioAddTypeBrandWoman">
                                Woman
                            </label>
                        </div>
                    </div>

                    <div class="col-sm-12 mt-3">
                        <input type='file' id="addImageBrandUpload" name="proof" accept=".png, .jpg, .jpeg" required/>
                        <label for="addImageBrandUpload"></label>
                    </div>

                    <div class="col-sm-12">
                        <img id="previewAddImageBrandAdmin" class="pt-3 w-100" src="https://dummyimage.com/200x100/ffffff/fff" alt="your image" />
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-admin-save-change-brand"><i class="fas fa-save mr-2"></i> Tambah</button>
                </div>
            </form>
        </div>

    </div>
</div>
