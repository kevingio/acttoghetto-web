<!-- Modal -->
<div id="adminModalPassword" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <form action="{{ url('/admin/change-password') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h6 class="modal-title font-weight-bold">Password</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="currentPassword">Current Password</label>
                            <input type="password" class="form-control" name="oldPassword" autocomplete="off" placeholder="Current Password">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="newPassword">New Password</label>
                            <input type="password" class="form-control" name="newPassword" autocomplete="off" placeholder="New Password">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="retypePassword">Retype Pssword</label>
                            <input type="password" class="form-control" name="rePassword" autocomplete="off" placeholder="Retype Pssword">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-admin-modal-cancel-password" data-dismiss="modal"><i class="fas fa-times mr-2"></i> Cancel</button>
                    <button type="submit" class="btn btn-danger btn-admin-modal-save-password"><i class="fas fa-save mr-2"></i> Save</button>
                </div>
            </form>
        </div>

    </div>
</div>
