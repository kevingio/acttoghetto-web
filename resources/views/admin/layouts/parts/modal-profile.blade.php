<!-- Modal -->
<div id="adminModalProfile" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <form id="form-profile">
                <div class="modal-header">
                    <h6 class="modal-title font-weight-bold">Profile</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="nameAdmin">Nama</label>
                            <input type="text" class="form-control" name="name" autocomplete="off" placeholder="Nama">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="emailAdmin">Email</label>
                            <input type="email" class="form-control" name="email" autocomplete="off" placeholder="Email">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-admin-modal-cancel-profile" data-dismiss="modal"><i class="fas fa-times mr-2"></i> Cancel</button>
                    <button type="submit" class="btn btn-danger btn-admin-modal-save-profile"><i class="fas fa-save mr-2"></i> Save</button>
                </div>
            </form>
        </div>

    </div>
</div>
