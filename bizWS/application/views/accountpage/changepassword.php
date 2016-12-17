<div class="user-dashboard">
    <h1>Update Password</h1>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 gutter">
            <div class="sales">
                <p></p>
                <form id="pass_change">
                    <div class="form-group">
                        <label for="new-pass">New Password:</label>
                        <input type="password" name="new_pass" class="form-control" id="new_e" placeholder="Enter Your new password here" required>
                    </div>
                    <div class="form-group">
                        <label for="con-pass">Confirm New Password:</label>
                        <input type="password" name="new_conf_pass" class="form-control" id="confirm_pass" placeholder="Confirm Your new password here" required>
                    </div>
                    <div class="form-group last">
                        <div class="col-sm-12 mail-error" style="display: none;">
                            <div class="alert alert-danger text-center error_msg" role="alert"></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>  
            </div>
        </div>
    </div>
</div>