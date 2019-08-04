<!-- Modal -->
<div id="adminModalAddCollection" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <form id="form-add-collection">
                <div class="modal-header">
                    <h6 class="modal-title font-weight-bold">Add Collection</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body row">
                    <div class="col-sm-12">
                        <label class="mr-sm-2">Edisi</label>
                        <select class="custom-select mr-sm-2" name="volume">
                            @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">Edisi {{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-sm-12 mt-3">
                        <input type="file" name="image" accept=".png, .jpg, .jpeg" style="border: 0" required/>
                        <label for="editImageCollectionUpload"></label>
                    </div>

                    <div class="col-sm-12">
                        <img id="previewAddImageCollectionAdmin" class="pt-3 w-100" src="https://dummyimage.com/200x100/ffffff/fff" alt="your image" />
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-admin-save-add-collection"><i class="fas fa-save mr-2"></i> Tambah</button>
                </div>
            </form>
        </div>

    </div>
</div>
