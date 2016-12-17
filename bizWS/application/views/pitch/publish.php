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
                        <h3><b>Publish your pitch as a infographic page</b> </h3>
                        <p>If you wish to receive a feedback on your pitch all you need to do is to click the button placed below in order to have it published as a secret web page. A link will also be given to you so that your pitch may be shared with all your friends and advisors. In case you wish to you can also stop the publishing at a time of your choice. </p>
                        <h4>Get instant feedback from the reviewer</h4>
                        <p>It is possible for you to obtain feedback from those that you know if they have the secret link. They will be able to see your pitch without having to login. Although we will not share the secret link with anyone, you can share with whoever you like. </p>
                        <?php
                        $data = $publish->row();
                        $company_id = isset($data->company_id) ? $data->company_id : '';
                        $publish_id = isset($data->publish_id) ? $data->publish_id : '';
                        $flag = isset($data->flag) ? $data->flag : '';
                        if ($flag == '1') {
                            $url = base_url() . 'template/pitch/' . $company_id . '/' . $publish_id;
                            $cls = 'display:block';
                            $content = 'Stop Publishing My Pitch';
                        } else {
                            $url = '';
                            $cls = 'display:none';
                            $content = 'Publish My Pitch';
                        }
                        $sub_type = $this->session->userdata('subs_type');
                        $type = ($sub_type != '1') ? 'publish()' : 'subscription()';
                        ?>
                        <input type="hidden" name="c_id"  />
                        <input type="text" name="link" class="form-control" value="<?php echo $url; ?>" style="<?php echo $cls; ?>"/><br>
                        <!--//<?php if ($flag == '1') { ?><span class="link"><a href="<?php echo $url; ?>" class="pub_link" target="_blank">View your Pitch</a></span><?php } ?><br>-->
                        <button class="btn btn-warning btn-sm btn_publish" onclick="publish()"> <?php echo $content ?> </button>
                    </div>
                    <div class="col-md-6 col-xs-6 col-sm-6 ">

                        <img class="img img-responsive publish_image" src="<?php echo base_url(); ?>assets/image/publish_image.png">

                    </div>
                </div>
                <!-- Footer -->
                <footer style="margin-top:5%;">
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
<script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script type="text/javascript">
                            var parameter = '<?php echo $comp_id; ?>';
</script>
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