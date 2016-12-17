<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('common/include'); ?>
    <link href="<?php echo base_url() ?>assets/css/subscription.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/popup.css" rel="stylesheet">
    <style type="text/css">

        .menu-content {
            height: 45px;
            border-bottom: 1px solid #2EA194;
            padding-left: 3% !important;
            padding-top: 5px !important;
        }
    </style>
    <body>

        <div id="bizjumper-main-content">
            <!-- Navigation -->
            <div class="top-header fixed-top">
                <div class="container-fluid">
                    <div class="top-header-logo col-md-6 col-xs-6">
                        <a class=" main-logo" href="<?php echo base_url(); ?>dashboard"><img src="<?php echo base_url(); ?>assets/image/logo_pitch.png"></a>
                    </div>
                    <?php $this->load->view('common/header_section'); ?>
                </div>
            </div>

            <div id="menu-container" class="full-width ">
                <ul class="nav nav-tabs menu-tabs">
                    <li class="active"><a href="<?php echo base_url(); ?>dashboard" style="cursor: pointer;">My Company</a></li>
                </ul>
            </div>

            <div class="main_container" style="min-height: 550px">
                <!-- Page Content -->
                <div class="container-fluid subscription">
                    <div class="home">
                        <div class="container-fluid display-table">
                            <div class="row display-table-row">
                                <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                                    <div class="sub_logo">
                                        <p class=""><b>Account Navigation</b></p>
                                    </div>
                                    <div class="navi">
                                        <ul>
                                            <li class="<?php echo ($Menu == 'overview') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>settings/overview"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Account Overview</span></a></li>
                                            <li class="<?php echo ($Menu == 'password') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>settings/change_password"><i class="fa fa-key" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Change Password</span></a></li>
                                            <li class="<?php echo ($Menu == 'subscription') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>settings/subscription"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Manage Subscription</span></a></li>
                                            <li class="<?php echo ($Menu == 'email') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>settings/change_email"><i class="fa fa-envelope" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Change Email</span></a></li>
                                            <li class="<?php echo ($Menu == 'delete') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>settings/delete_account"><i class="fa fa-trash" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Delete My Account</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-10 col-sm-11 display-table-cell v-align">
                                    <?php $this->load->view($mainContent); ?>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer>
            <div class="row-fluid tc ">
                <div class="terms">
                    <p><?php echo RIGHTS;?></p>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.container -->
</div>
<!-- /bizjumper-main-content -->
<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<!-- Custom JavaScript -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/biz_jumper.js"></script>
<script type="text/javascript" src="https://cdn.bootcss.com/summernote/0.8.1/summernote.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/demo.all.js"></script>-->


</body>

</html>
