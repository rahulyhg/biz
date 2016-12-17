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
                <div class="container publish_contain " style="min-height: 600px !important;">
                    <div class="col-md-6 col-xs-6 col-sm-6">
                        <h3><b>Download your pitch as a presentation format</b> </h3>
                        <p>If you have a presentation you may include your pitch in the form of a slide show. This will enable you to make an impression with your investors; You can use the slide show for making a splash at an event as well. Your talk can be spruced up with the help of slides that look great as well as some amazing market charts and team views or landscapes that help bring your points home. </p>
                        <p>You can quite easily produce a power point file by clicking Export to Power Point. It is also possible to upload to any slide sharing service of your choice. </p>
                        <?php
                        $sub_type = $this->session->userdata('subs_type');
                        $type = ($sub_type != '1') ? 'exportppt()' : 'subscription()';
                        ?>
                        <button type="button" class="btn btn-warning btn-md btn_publish" onclick="exportppt()">Export To PPT</button>
                    </div>
                    <div class="col-md-6 col-xs-6 col-sm-6">
                        <img class="img img-responsive publish_image" src="<?php echo base_url(); ?>assets/image/download.png">
                    </div>
                </div>


                <!-- Footer -->
                <footer style="margin-top: 2%">
                    <div class="row-fluid tc ">
                        <div class="terms">
                            <p><?php echo RIGHTS; ?></p>
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
<!--<script src="<?php echo base_url() ?>assets/js/jquery.js"></script>-->
<script type="text/javascript">
                            var parameter = '<?php echo $comp_id; ?>';
</script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<!-- Custom JavaScript -->
<!--<script type="text/javascript" src="<?php echo base_url() ?>assets/js/biz_jumper.js"></script>-->
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
