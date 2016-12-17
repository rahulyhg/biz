<?php
$result = $account->row();
$email = $result->email;
?>
<div class="user-dashboard">
    <h1>Delete User Account</h1>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 gutter">
            <div class="sales">
                <h2>Delete account: <?php echo $email; ?></h2>
                <p></p>
                <p>If you delete your account, all data and other content associated with your account will also be deleted</p>
                <form id="deleteAccount">
                    <div class="user_acc">
                        <div class="form-group" style="width:40%; float:left;">
                            <label for="conf-pass">Enter password to confirm:</label>
                            <input type="password" name="get_pass" class="form-control" id="conf_pass" placeholder="">
                        </div>
                    </div>
                    <div class="user_warning"  style="width:40%; float:left; margin-left:7%;margin-top: 3%;">
                        <button class="btn btn-danger btn-block btn-sm delete_acc">Delete and remove all business plans</button>
                    </div>
                </form> 
                <div class="col-sm-12 mail-error" style="display: none;">
                    <div class="alert alert-danger text-center error_msg" role="alert"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div aria-hidden="true" aria-labelledby="modalLabel" role="dialog" tabindex="-1" id="del_acc" class="modal del_acc" style="display: none;">

    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete</h4>
            </div>
            <div class="modal-body" align="center">
                <form role="form">
                    <h4>Are you sure you want to delete this item ?</h4>

                    <a  class="btn btn-warning remove_acc">Yes</a>
                    <a  class="btn btn-danger popup-close" role="button" data-dismiss="modal" > No</a>
                </form>
            </div>

        </div>
    </div>
</div>
