<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php echo METADESCRIPTION; ?>">
        <meta name="Keywords" content="<?php echo METAKEYWORDS; ?>">
        <meta name="author" content="BizJumper">
        <link rel="icon" href="<?php echo base_url() ?>assets/image/icon.png" type="image/x-icon">
        <title><?php echo $keyword; ?>| <?php echo TITLE; ?></title>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url() ?>assets/css/biz_jumper.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/biz_jumper_menu.css" rel="stylesheet">
        <!-- Font Awesome Css Link -->
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
            var base_url = '<?php echo site_url(); ?>';
        </script>
    </head>
    <body>
        <div id="bizjumper-main-content">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <?php
                        $page_url = current_url();
                        $url = explode('/', $page_url);
                        $last_string = end($url);
                        $logo_url = ($last_string == 'login') ? 'https://bizjumper.com' : base_url();
                        ?>
                        <a class="navbar-brand biz_logo" href="<?php echo $logo_url; ?>"><img class="biz_brand" src="<?php echo base_url() ?>assets/image/logo_pitch.png" alt="logo" /></a>
                    </div>
                    <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <form class="reg">
                                    <a class="btn btn-warning btn-sm navbar-btn" href="<?php echo base_url() ?>login">
                                        SIGN IN
                                    </a>
                                    <a class="btn btn-warning btn-sm navbar-btn" href="<?php echo base_url() ?>signup">
                                        SIGN UP
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.container -->
            </nav>
            <div class=" login-container">
                <!-- Page Content -->
                <?php $this->load->view($maincontent); ?><!-- /row -->
                <footer style="margin-top: 6%;">
                    <div class="row-fluid tc ">
                        <div class="terms">
                            <p>©2016, FAUSTINO SOLUTIONS LLP | All rights reserved </p>
                        </div>
                    </div>
                    <!-- /.row -->
                </footer>
            </div>
        </div>
    </div>
</div>
<!-- /bizjumper-main-content -->
<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<!-- Custom JavaScript -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/custom.js"></script>
</body>
</html>