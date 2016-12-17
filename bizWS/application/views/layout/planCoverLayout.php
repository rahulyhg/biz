<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('includes/meta_css'); ?>
    </head>
    <body>
        <?php $this->load->view('includes/header'); ?>
        <div id="bizjumper-main-content">
            <?php $this->load->view($mainContent); ?>
            <?php $this->load->view('includes/footer'); ?>
        </div>
        <div class="modal fade" id="problemModal" tabindex="-1" role="dialog" 
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" id="summaryForm">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close" 
                                    data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">
                                <b>Problem</b> 
                            </h4>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <div class="dummy_text">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            </div>
                            <div class="form-group">
                                <div id="app_5"> 
                                    <input type="hidden" name="menuid" id="popMenuId" />
                                    <textarea id="popSummary" required="" name="summary" class="form-control form-control-lg"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-warning">
                                I am done
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
        <script>
            $(document).ready(function () {
                var sloganCnt = $('#slogan').val().length;
                var messageCnt = $('#message').val().length;
                if (sloganCnt <= 120) {
                    var countval = 120 - sloganCnt;
                    $('#slogan-text').text(countval);
                }
                if ($('#message').val().length <= 120) {
                    var countval = 120 - messageCnt;
                    $('#message-text').text(countval);
                }
                $("#slogan").keyup(function (e) {
                    var count = $(this).val().length;
                    if (count <= 120) {
                        var countval = 120 - count;
                        $('#slogan-text').text(countval);
                    }
                });
                $("#message").keyup(function (e) {
                    var count = $(this).val().length;
                    if (count <= 100) {
                        var countval = 100 - count;
                        $('#message-text').text(countval);
                    }
                });
                $("#phone,#postal").keydown(function (e) {
                    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
                            (e.keyCode == 65 && e.ctrlKey === true) ||
                            (e.keyCode >= 35 && e.keyCode <= 39)) {
                        return;
                    }
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105) || (e.keyCode == 190)) {
                        e.preventDefault();
                    }
                });
            });
        </script>
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <!-- Custom JavaScript -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/biz_jumper.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jump_menu.js"></script>
    </body>
</html>
