<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('includes/meta_css'); ?>
        <link href="<?php echo base_url() ?>assets/css/popup.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/forecast.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/table.css" rel="stylesheet">
        
    </head>
    <body>
        <?php $this->load->view('includes/header'); ?>
        <div id="bizjumper-main-content">
            <div class="main_container">
                <div class="container-fluid">
                    <?php $this->load->view('includes/menu'); ?>
                    <div class="col-md-10 col-sm-9 col-xs-9 setup-right-panel">                              
                        <div class="setup_heading">
                            <h3><b><?php echo $pageTitle; ?></b></h3>
                        </div>
                        <div class="setup_info">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <p><?php echo $static_content; ?></p>
                            </div>
                        </div>
                        <?php $this->load->view($mainContent); ?>
                    </div>
                </div>
            </div>
            <?php $this->load->view('includes/footer'); ?>
        </div>
        <!-- /bizjumper-main-content -->
        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

        <script>
            // not needed, just an example of listening to events triggered by the plugin
            $('body').on('duplicate.error', function (ev) {
                console.log('refused to add/remove', this);
                $(ev.target).addClass('error');
                setTimeout(function () {
                    $(ev.target).removeClass('error');
                }, 1500);
            });

            $('.custom').modal({backdrop: 'static', keyboard: false})
        </script>
        <?php $this->load->view('forecast/' . $js); ?>
        <script type="text/javascript">
            $(document).ready(function () {
                $(document).on('keydown', '.onlyNumbers', function (e) {
                    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                            (e.keyCode == 65 && e.ctrlkey === true) ||
                            (e.keyCode >= 35 && e.keyCode <= 39)) {
                        return;
                    }
                    if ((e.shiftkey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
                });
                //generic add more
                $('.trEditMore').click(function () {
                    $(this).parents('tr').find('.trNameTag').hide();
                    $(this).parents('tr').find('.trNameInput').show();
                });

                $(document).on('click', '.redirect', function () {
                    $('body').prepend('<div class="popup_back"></div>');
                    $('.popup_cont').fadeIn();
                    return false;
                });
                $('.popup_close').click(function () {
                    $('.popup_back').fadeOut(function () {
                        $(this).remove();
                    });
                    $('.popup_cont').fadeOut();
                });
                $(document).on('focus', '.onlyNumbers', function () {
                    var ele = $(this);
                    if (ele.val() == '0.00') {
                        ele.val('');
                    }
                });
                $(document).on('focusout', '.onlyNumbers', function () {
                    $(this).trigger('change');
                });
            });
            //number formats
            function numberFormat(ele) {
                var val = ele.val().replace(/,/g, "");
                var price = parseFloat(val).toFixed(2);
                price = (price == 'NaN') ? '0.00' : price;
//                prices = commaSeparateNumber(price);
                ele.val(price);
                return price;
            }

        </script>

        <!-- Custom JavaScript -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/biz_jumper.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jump_menu.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.duplicate.min.js"></script>

        <!--   Modal Section -->

        <!-- Modal -->
        <div class="modal custom fade" id="myModal" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Assets</h4>
                    </div>
                    <div class="modal-body" align="center">
                        <form role="form">
                            <div class="form-group" style="width:80%; margin-top:5%;">
                                <input type="text" class="form-control" id="text" placeholder="Enter Assets name">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>





        <!--Edit Modal -->
        <div class="modal custom fade" id="EditModal" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Here</h4>
                    </div>
                    <div class="modal-body" align="center">
                        <form role="form">
                            <div class="form-group" style="width:80%; margin-top:5%;">
                                <input type="text" class="form-control" id="text" placeholder="Enter Assets name">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>



        <!--Delet Modal -->
        <div class="modal custom fade" id="DeletModal" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header danger">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Delete Assets</h4>
                    </div>
                    <div class="modal-body" align="center">
                        <form role="form">
                            <h4>Are You Sure Want To Delete This Item</h4>

                            <a href="#" class="btn btn-success">Yes</a> <a href="#" class="btn btn-danger"> No</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>



    </body>
</html>