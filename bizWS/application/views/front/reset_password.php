<div class="container-fluid custom_height" >
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading login">
                    <strong class="">Password Recovery</strong>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="reset_password">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Enter Email</label>
                            <div class="col-sm-8">
                                <input type="email" name="pass_email" class="form-control pass_email" id="inputEmail3" placeholder="Email" required="">
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-warning btn-md">&nbsp; &nbsp;&nbsp; Submit&nbsp; &nbsp; &nbsp;</button>
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-12 mail-error" style="display: none;">
                                <div class="alert alert-danger text-center error_msg" role="alert"></div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="panel-footer">Not Registered? <a href="<?php echo base_url() ?>signup" class="">SIGN UP </a>
                </div>
            </div>
        </div>
    </div>
</div><!-- /row -->