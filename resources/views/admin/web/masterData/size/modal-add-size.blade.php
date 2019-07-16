<!-- Modal -->
<div id="adminModalAddSize" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <form id="form-add-size">
                <div class="modal-header">
                    <h6 class="modal-title font-weight-bold">Tambah Size</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="nameEditSize">Nama Kategori</label>
                            <select class="form-control" name="category_id" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name . ' - ' . ucwords($category->type) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="size">Size</label>
                            <input type="text" class="form-control" name="text" autocomplete="off" placeholder="Size" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-save-add-size-admin"><i class="fas fa-save mr-2"></i> Tambah</button>
                </div>
            </form>
        </div>

    </div>
</div>
