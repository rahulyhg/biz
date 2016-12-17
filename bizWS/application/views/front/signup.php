<div class="container-fluid custom_height">
    <div class="row">
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading signup"><strong class="">SIGN UP</strong>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="post" action="<?php echo "{$this->site_url}signup" ?>">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <?php if ($this->session->flashdata('error')) { ?>
                                    <div class="alert alert-danger" role="alert"><?= $this->session->flashdata('error'); ?></div>
                                <?php } ?>
                            </div>
                            <?php
                            if ($this->session->flashdata('already_reg')) {
                                $cls = 'display: block';
                            } else {
                                $cls = 'display: none';
                            }
                            ?>
                            <div class="col-sm-12 mail-error" style="<?php echo $cls; ?>">
                                <div class="alert alert-danger text-center error_msg" role="alert"><?= $this->session->flashdata('already_reg'); ?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="col-sm-3 control-label">First Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="firstname" id="fname" placeholder="First Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-3 control-label">Last Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="secondname" id="sname" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email"  class="form-control email" name="email"  id="inputEmail3" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" min="6" class="form-control password" id="inputPassword3" placeholder="Password" required data-rule-password="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Confirm Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="confirmpassword" min="6" class="form-control confpass" id="inputPassword3" placeholder="Confirm Password" required data-rule-password="true" data-rule-equalTo="#inputPassword3">
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button id="btn-signup" type="submit" class="btn btn-warning signup"><i class="icon-hand-right"></i> &nbsp SIGN UP</button>
                                <!--   <button type="reset" class="btn btn-default btn-sm">Reset</button> -->
                            </div>
                        </div>

                    </form>
                </div>
                <div class="panel-footer">Already Registered? <a href="<?php echo base_url() ?>login" class="">SIGN IN </a>
                </div>
            </div>
        </div>
    </div>
</div>