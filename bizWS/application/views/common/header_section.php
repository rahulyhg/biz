<div class="top-right-header col-md-6 col-xs-6">
    <ul class="nav navbar-nav navbar-right abc">
        <li class="dropdown profile name">
            <a href="#" class="dropdown-toggle profile-name"  data-toggle="dropdown">
                <i class="fa fa-user" aria-hidden="true"></i>&nbsp;
                <strong><?php echo $this->session->userdata('fname'); ?> <?php echo $this->session->userdata('lname'); ?></strong>&nbsp;
                <i class="fa fa-arrow-down" aria-hidden="true"></i>
            </a>
            <ul class="dropdown-menu login-drop">
                <li>
                    <div class="navbar-login">
                        <div class="row">
                            <div class="col-lg-4">
                                <p class="text-center">
                                    <span class="fa fa-user icon-size" style="font-size:85px;"></span>
                                </p>
                            </div>
                            <div class="col-lg-8">
                                <p class="text-left"><strong><?php echo $this->session->userdata('fname'); ?> <?php echo $this->session->userdata('lname'); ?></strong></p>
                                <p class="text-left small"><?php echo $this->session->userdata('email'); ?></p>
<!--                                                    <p class="text-left prof">
                                    <a href="#" class="btn btn-warning btn-block btn-sm ">Profile</a>
                                </p>-->
                            </div>
                        </div>
                    </div>
                </li>
                <li class="divider navbar-login-session-bg"></li>
                <li><a href="<?php echo base_url() ?>settings/overview">Account Settings</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url() ?>settings/subscription">Upgrade your Subscription</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url() ?>logout">Sign Out</a></li>
            </ul>
        </li>
    </ul>
</div>
