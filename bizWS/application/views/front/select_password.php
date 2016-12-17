<div class="container-fluid" style="min-height: 600px !important;">
    <div class="row">
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading login">
                    <strong class="">Password Recovery</strong>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="changepassword" method="post" action="<?php echo base_url(); ?>change_password">
                        <input type="hidden" value="<?php echo $this->input->get('email'); ?>" name="email" class="form-control ress_pass" id="inputEmail3" >
                        <input type="hidden" value="<?php echo $this->input->get('memberId'); ?>" name="id" class="form-control ress_pass" id="inputEmail3">
                        <input type="hidden" value="<?php echo $this->input->get('authkey'); ?>" name="key" class="form-control ress_pass" id="inputEmail3" >
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Enter Password</label>
                            <div class="col-sm-8">
                                <input type="password" name="password" class="form-control ress_pass" id="inputEmail3" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Confirm Password</label>
                            <div class="col-sm-8">
                                <input type="password" name="confirm_pass" class="form-control confirm_res_pass" id="inputEmail3" placeholder="Confirm Password" required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-warning btn-md reset_pass">&nbsp; &nbsp;&nbsp; Submit&nbsp; &nbsp; &nbsp;</button>
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-12 mail-error" style="display: none;">
                                <div class="alert alert-danger text-center error_msg" role="alert"></div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                </div>
            </div>
        </div>
    </div>
</div><!-- /row -->