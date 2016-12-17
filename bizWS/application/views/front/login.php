<div class="container-fluid custom_height">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading login"> <strong class="">SIGN IN</strong>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="post" action="<?php echo site_url()."login" ?>">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email" required="" value="<?php echo ($this->input->cookie('remember_me', true) != '') ? $this->input->cookie('remember_me', true) : ''; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password" required="" value="<?php echo ($this->input->cookie('password', true) != '') ? $this->input->cookie('password', true) : ''; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <div class="checkbox">
                                    <label class="">
                                        <input type="checkbox" class="remember" name="remember" value="1" <?php echo ($this->input->cookie('remember_me', true) != '') ? 'checked="checked"' : ''; ?>>Remember me</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-warning btn-sm">SIGN IN</button>
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-12">
                                <?php if ($this->session->flashdata('error')) { ?>
                                    <div class="alert alert-danger" role="alert"><?= $this->session->flashdata('error'); ?></div>
                                <?php } elseif ($this->session->flashdata('activate')) { ?>
                                    <div class="alert alert-success" role="alert"><?= $this->session->flashdata('activate'); ?></div>  
                                <?php } elseif ($this->session->flashdata('msg')) { ?>
                                    <div class="alert alert-danger" role="alert"><?= $this->session->flashdata('msg'); ?></div>  
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group alternate-loginfb">
                        </div>
                    </form>
                </div>
                <div class="panel-footer">Not Registered? 
                    <a href="<?php echo site_url() ?>signup" class="">SIGN UP</a>
                    <a href="<?php echo site_url() ?>login/request_password" style="float:right;">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>
</div><!-- /row -->