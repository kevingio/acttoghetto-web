<!-- Modal -->
<div id="adminModalAddCategory" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data" id="form-add-category">
               
                <div class="modal-header">
                    <h6 class="modal-title font-weight-bold">Tambah Kategori</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="nameEditCategory">Nama Kategori</label>
                            <input type="text" class="form-control" id="nameAddCategory" placeholder="Nama Kategori">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <label>Jenis Kategori</label>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="radioTypeAddCategoryMan" value="option1" checked>
                            <label class="form-check-label" for="radioTypeCategoryMan">
                                Man
                            </label>
                        </div>
                    </div>
                    
                    <div class="col-sm-12">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="radioTypeAddCategoryWoman" value="option2">
                            <label class="form-check-label" for="radioTypeCategoryWoman">
                                Woman
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-save-add-category-admin"><i class="fas fa-save mr-2"></i> Simpan</button>
                </div>
            </form>
        </div>

    </div>
</div>
