<?php
$result = $account->row();
$email = $result->email;
?>
<div class="user-dashboard">
    <h1>Update Email</h1>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 gutter">
            <div class="sales">
                <!-- <h2>mahen.babu1990@gmail.com</h2> -->
                <p>Your Current Email is: <b><?php echo $email; ?></b></p>
                <p></p>
                <form id="change_email">
                    <div class="form-group">
                        <label for="newemail">New Email:</label>
                        <input type="email" name="email" class="form-control" id="new_email" placeholder="Enter Your new email address here">
                    </div>
                    <div class="form-group">
                        <label for="newemail">Confirm New Email:</label>
                        <input type="email" name="new_email" class="form-control" id="confirm_email" placeholder="Confirm Your new email address here">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form> 
                <div class="form-group last">
                    <div class="col-sm-12 mail-error" style="display: none;">
                        <div class="alert alert-danger text-center error_msg" role="alert"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>