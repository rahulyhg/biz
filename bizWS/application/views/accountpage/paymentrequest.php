<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Subscription page for the new users.">
        <meta name="Keywords" content="business plan software, bizjumper, bussiness plan, bussiness software, business pitch, startups, business plan tools">
        <meta name="author" content="BizJumper">
        <link rel="icon" href="<?php echo base_url(); ?>assets/image/icon.png" type="image/x-icon">
        <title>| BizJumper</title>
        <?php $this->load->view('common/include'); ?>
        <link href="<?php echo base_url() ?>assets/css/popup.css" rel="stylesheet">
        <script>
            var base_url = '<?php echo site_url(); ?>';
            var str = window.location.pathname;
            var parameter = str.split('/').pop();
        </script>
    </head>
    <body>

        <div id="bizjumper-main-content">
            <!-- Navigation -->
            <div class="top-header fixed-top">
                <div class="container-fluid">
                    <div class="top-header-logo col-md-6 col-xs-6">
                        <a class=" main-logo" href="<?php echo base_url() ?>dashboard"><img style="width:35%" src="<?php echo base_url() ?>assets/image/logo_pitch.png"></a>
                    </div>
                    <?php $this->load->view('common/header_section'); ?>

                </div>
            </div>

            <div id="menu-container" class="full-width ">
                <ul class="nav nav-tabs menu-tabs">
                    <li class="active">
                        <a href="<?php echo base_url() ?>dashboard" style="cursor: pointer;">My Company</a></li>
                </ul>
            </div>
            <div class="main-page text-center payment_gateway" style="min-height: 700px;">
                <iframe src="<?php echo $iframe_url ?>" id="paymentFrame" width="482" height="650" frameborder="0" scrolling="No" ></iframe>
            </div>

            <!-- Footer -->
            <footer>
                <div class="row-fluid tc ">
                    <div class="terms">
                        <p>©2016, bizjumper.com | All rights reserved | <a href="#">Terms & conditions</a></p>
                    </div>
                </div>
                <!-- /.row -->
            </footer>
            <?php $this->load->view('popup/company_popup'); ?>
        </div>

        <!-- /.container -->
    </div>
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!--Custom JavaScript-->
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
</body>
</html>
