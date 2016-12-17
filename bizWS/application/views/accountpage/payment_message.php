<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Biz Jumper</title>
        <?php $this->load->view('common/include'); ?>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
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
                        <a class=" main-logo" href="<?php echo base_url() ?>dashboard"><img src="<?php echo base_url() ?>assets/image/logo_pitch.png"></a>
                    </div>
                    <?php $this->load->view('common/header_section'); ?>

                </div>
            </div>

            <div class="main_container">
                <div class="container custom_table">
                    <div class="col-md-10 col-xs-12 col-sm-12 col-md-offset-1">
                        <div id="table_2" style="margin-top: 8% !important;min-height: 242px">
                            <div class="panel panel-default text-center" style="margin-top: 15% !important;">
                                <?php if ($this->session->flashdata('payment_error')) { ?>
                                    <div class="panel-body" ><?php echo $this->session->flashdata('payment_error'); ?></div>  
                                <?php } elseif ($this->session->flashdata('payment_success')) { ?>
                                    <div class="panel-body" ><?php echo $this->session->flashdata('payment_success'); ?></div>  
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer style="margin-top:5%;">
                <div class="row-fluid tc ">
                    <div class="terms">
                        <p>©2016, bizjumper.com | All rights reserved | <a href="#">Terms & conditions</a></p>
                    </div>
                </div>
                <!-- /.row -->
            </footer>
        </div>






        <!-- jQuery -->
        <script src="<?php echo base_url() ?>assets/js/jquery.js"></script>



        <script type="text/javascript" src=" https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <!-- <script type="text/javascript" src=" https://cdn.datatables.net/1.10.12/js/dataTables.numericComma.js"></script> -->
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

        <!-- Custom JavaScript -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/main.js"></script>


    </body>
</html>
<script>
            $(function () {
                window.prettyPrint && prettyPrint()
                $(document).on('click', '.yamm .dropdown-menu', function (e) {
                    e.stopPropagation()
                })
            })

            $('.dropdown.keep-open').on({
                "shown.bs.dropdown": function () {
                    this.closable = false;
                },
                "click": function () {
                    this.closable = true;
                },
                "hide.bs.dropdown": function () {
                    return this.closable;
                }
            });

</script>