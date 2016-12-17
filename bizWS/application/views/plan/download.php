<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('common/include'); ?>
    <link href="<?php echo base_url() ?>assets/css/pitch_view.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/popup.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <body>
        <div id="bizjumper-main-content">
            <!-- Navigation -->
            <?php $this->load->view('common/header'); ?>
            <div class="main_container publich_main">
                <div class="container publish_contain " style="min-height: 600px;">
                    <div class="col-md-6 col-xs-6 col-sm-6">
                        <h3><b>Download your plan as a PDF format</b> </h3>
                        <p>Set fire to the market once prepared with the business plan by presenting in the most efficient way . And this can be done by exporting your business plan to PDF format  so as to make your plan impressive and worth eye catching to get the attention of the investors and other target segment as well.</p>
                        <form id="pdf"  method="post">
                            <button type="button" class="btn btn-warning btn-md btn_publish" onclick="exportpdf()">Export To PDF</button>
                        </form>
                    </div>
                    <div class="col-md-6 col-xs-6 col-sm-6">
                        <img class="img img-responsive publish_image" src="<?php echo base_url(); ?>assets/image/download.png">
                    </div>
                </div>


                <!-- Footer -->
                <footer style="margin-top: 5%;">
                    <div class="row-fluid tc ">
                        <div class="terms">
                            <p>©2016, bizjumper.com | All rights reserved | <a href="#">Terms & conditions</a></p>
                        </div>
                    </div>
                    <!-- /.row -->
                </footer>
                <?php $this->load->view('popup/upgrade_popup'); ?>
            </div>
            <!-- /.container -->
        </div>

    </body>
</html>
<?php $comp_id = $this->session->userdata('companyid'); ?>
<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
<script type="text/javascript">
                                var parameter = '<?php echo $comp_id; ?>';
</script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<!-- Custom JavaScript -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/biz_jumper.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/main.js"></script>
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
