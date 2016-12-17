<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('includes/meta_css'); ?>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    </head>
    <body>
        <?php $this->load->view('includes/header'); ?>
        <div id="bizjumper-main-content">
            <div class="main_container plan_main">
                <div class="container-fluid">
                    <?php $this->load->view('plan/menu'); ?>
                    <div class="col-md-10 col-sm-9 col-xs-9 resize" style="padding: 30px 5%;">
                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                        <?php } ?>
                        <?php if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                        <?php } ?>
                        <?php $this->load->view($mainContent); ?>
                    </div>
                </div>
            </div>
            <?php $this->load->view('includes/footer'); ?>
        </div>
        <div class="modal fade" id="problemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog" style="width:65%">
                <div class="modal-content">
                    <form method="post" id="summaryForm">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close"  data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">
                                <b></b> 
                            </h4>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <!--<div class="dummy_text">-->
                                <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>-->
                            <!--</div>-->
                            <div class="form-group">
                                <div id="app_5"> 
                                    <input type="hidden" name="menuid" id="popMenuId" />
                                    <textarea id="popSummary" name="summary" class="form-control form-control-lg" style="height:400px;"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <!--                            <button type="button" class="btn btn-default"  data-dismiss="modal">
                                                            Close
                                                        </button>-->
                            <button type="submit" class="btn btn-warning"> Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Milestone  Modal -->
        <div class="modal fade" id="milestone" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header milestone_header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h3 class="modal-title text-center" id="lineModalLabel">Add Milestone</h3>
                    </div>
                    <div class="modal-body">
                        <!-- content goes here -->
                        <form class="milestone_det">
                            <input type="hidden" name="type" value="add" />
                            <div class="form-group">
                                <label for="exampleInputEmail1">Milestone Name</label>
                                <input type="text" class="form-control" id="cpt_name" placeholder="Target Milestones" name="name" required >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Milestone Date</label>
                                <div class='input-group date' id='datePicker'>
                                    <input type='text' class="form-control" name="date"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar" ></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea class="form-control mil_desc" rows="2"  id="about_cpt" class="desc" name="description"></textarea>
                                <span class="charsLeft"></span> characters left.
                            </div>
                            <input type="hidden" name="milestone_id" value="" />
                            <input type="hidden" name="group" value="2" />
                            <!--<button type="button" class="btn btn-warning " data-dismiss="modal"  role="button">Close</button>-->
                            <button type="submit" class="btn btn-warning ">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php $comp_id = $this->session->userdata('companyid'); ?>
        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/datepicker.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/datepicker3.css" />
        <script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.limit-1.2.source.js"></script>

        <script>
            $(document).ready(function () {
                $('.mil_desc').limit('200', '.charsLeft');
                $('#datePicker')
                        .datepicker({
                            startDate: '-0m',
                            format: 'MM d,yy'
                        });
            });
        </script>
        <script src="<?php echo base_url(); ?>assets/js/nicedit_1.js" type="text/javascript"></script>
        <script type="text/javascript">bkLib.onDomLoaded(function () {
                nicEditors.editors.push(
                        new nicEditor().panelInstance(
                        document.getElementById('popSummary')
                        )
                        );
            });</script>
        <script>
            var companyid = '<?php echo $comp_id; ?>';
            var parameter = '<?php echo $comp_id; ?>';
            var baseUrl = '<?php echo base_url(); ?>';
            var base_url = '<?php echo base_url(); ?>';
            var updateClass = ['fa-spinner', 'fa-pencil', 'fa-times', 'fa-check'];
            var updatedClass = ['fa-spinner', 'fa-pencil', 'fa-check', 'fa-times'];
            var updatedClassVal = [0, 1, 3, 2];
            $(document).ready(function () {
                $('.popupOn').click(function () {
                    var menuid = $(this).data('summary');
                    var menuname = $(this).data('title');
                    $('.modal-title b').text(menuname);
                    nicEditors.findEditor("popSummary").setContent($('.summary' + menuid).html());
                    $('#popMenuId').val(menuid);
                    $('#summaryForm button[type=submit]').text('Submit');
                    $('#problemModal').modal();
                    return false;
                });
                $('#summaryForm').submit(function () {
                    var submitBtn = $('#summaryForm button[type=submit]');
                    var nicE = new nicEditors.findEditor('popSummary');
                    var summary = encodeURIComponent($.trim(nicE.getContent()));
                    var menuid = $('input[name="menuid"]').val();
                    $.ajax({
                        url: baseUrl + 'Plan/ajax?action=summary&companyid=' + companyid,
                        method: 'post',
                        data: 'summary=' + summary + '&menuid=' + menuid,
                        dataType: 'json',
                        contentType: 'application/x-www-form-urlencoded',
                        beforeSend: function () {
                            submitBtn.text('loading');
                        },
                        success: function (data) {
                            submitBtn.text(data.message);
                            if (data.message == 'Success') {
                                var menuid = $('#popMenuId').val();
                                $('.summary' + menuid).html(data.summary.replace(/\n/g, "<br>"));
                                $('.popsummary' + menuid).text(data.summary);
                                $('#problemModal').modal('hide');
                            }
                        }
                    });
                    return false;
                })
                $('#addForm').submit(function () {
                    var submitBtn = $('.addBtn');
                    $.ajax({
                        url: baseUrl + 'Plan/ajax?action=add&companyid=' + companyid,
                        method: 'post',
                        data: $('#addForm').serialize(),
                        dataType: 'json',
                        beforeSend: function () {
                            submitBtn.children('em').removeClass('fa-plus').addClass('fa-spinner');
                        },
                        success: function (data) {
                            var cls = 'danger';
                            var msg = 'Unable to update the selected link. Try again.'
                            if (data.status == 1) {
                                var cls = 'success';
                                var msg = data.message;
                                var id = data.addedid;
                                var newTitle = $('input[name=add]').val();
                                updateMenu(data.menu, data.menuParent);
                                $('input[name=add]').val('');
                                var html = '<tr id="trupdateForm' + id + '">\
                                    <td class="col-sm-12">\
                                        <form class="updateForms" method="post" id="updateForm' + id + '">\
                                            <div align="center" class="col-sm-10">\
                                                <div class="form-group">\
                                                    <input type="text" required="" placeholder="Enter Your Text" aria-describedby="emailHelp" id="textfield" class="form-control form-control-lg" value="' + newTitle + '" name="title">\
                                                    <input type="hidden" value="' + id + '" name="menuid">\
                                                </div>\
                                            </div>\
                                            <div class="col-sm-2">\
                                                <button style="background-color: transparent;" value="1" name="submit" type="submit" class="table_edit"><em class="fa fa-pencil"></em></button>\
                                                <button style="background-color: transparent;" value="2" name="submit" type="submit" class="table_edit"><em class="fa fa-times"></em></button>\
                                            </div>\
                                        </form>\
                                    </td>\
                                </tr>';
                                $('#updateTable table tbody').append(html);
                            }
                            submitBtn.children('em').removeClass('fa-spinner').addClass('fa-plus');
                            $('#addTable')
                                    .prepend('<div class="alert alert-' + cls + '" id="statusMessage">' + msg + '</div>')
                                    .children(':first').delay(5000).fadeOut(100);
                        }
                    });
                    return false;
                });
                $('.editInnerTitle').click(function () {
                    var id = $(this).data('id');
                    $('#innerTitleDiv' + id).hide();
                    $('#innerTitleForm' + id).show();
                    return false;
                });
                $('.updateInnerTitle').click(function () {
                    var id = $(this).data('id');
                    var submitBtn = $(this);
                    $.ajax({
                        url: baseUrl + 'Plan/ajax?action=update&submit=1&companyid=' + companyid,
                        method: 'post',
                        data: {
                            title: $('input[name="innerTitle' + id + '"]').val(),
                            menuid: $('input[name="innerMenuid' + id + '"]').val(),
                        },
                        dataType: 'json',
                        beforeSend: function () {
                            submitBtn.children('i').removeClass('fa-refresh').addClass('fa-spinner');
                        },
                        success: function (data) {
                            var cls = 'danger';
                            var msg = 'Unable to update the selected link. Try again.'
                            if (data.status == 1) {
                                cls = 'success';
                                msg = data.message;
                                var value = $('input[name="innerTitle' + id + '"]').val().trim();
                                $('#innerTitleDiv' + id).text(value);
                                $('input[name="innerTitle' + id + '"]').val(value);
                                $('#innerTitleForm' + id).hide();
                                $('#innerTitleDiv' + id).show();
                            }
                            submitBtn.children('i').removeClass('fa-spinner').addClass('fa-refresh');
                            $('#innerTitleDiv' + id)
                                    .prepend('<div class="alert alert-' + cls + '" id="statusMessage">' + msg + '</div>')
                                    .children(':first').delay(5000).fadeOut(100);
                        }
                    });
                    return false;
                });
                $(document).on('submit', '.updateForms', function () {
                    var formId = $(this).attr('id');
                    var submit = ($("button[type=submit]:focus").length == 0) ? 1 : $("button[type=submit]:focus").val();
                    var submitBtn = $('#tr' + formId + ' button[type="submit"][value="' + submit + '"]');
                    $.ajax({
                        url: baseUrl + 'Plan/ajax?action=update&submit=' + submit + '&companyid=' + companyid,
                        method: 'post',
                        data: $('#' + formId).serialize(),
                        dataType: 'json',
                        beforeSend: function () {
                            submitBtn.children('em').removeClass(updateClass[submit]).addClass(updateClass[0]);
                        },
                        success: function (data) {
                            var cls = 'danger';
                            var msg = 'Unable to update the selected link. Try again.'
                            if (data.status == 1) {
                                var cls = 'success';
                                var msg = data.message;
                                updateMenu(data.menu, data.menuParent);
                                submitBtn.val(updatedClassVal[submit]).children('em').removeClass(updateClass[0]).addClass(updatedClass[submit]);
                            } else {
                                submitBtn.children('em').removeClass(updateClass[0]).addClass(updateClass[submit]);
                            }
                            $('#updateTable')
                                    .prepend('<div class="alert alert-' + cls + '" id="statusMessage">' + msg + '</div>')
                                    .children(':first').delay(5000).fadeOut(100);
                        }
                    });
                    return false;
                });
                function updateMenu(menuData, menuParent) {
                    $('#accordion').empty();
                    var collapse;
                    var html = '';
                    if (typeof menuData[0] !== 'undefined') {
                        $.each(menuData[0], function (cKey, cName) {
                            collapse = (cKey == menuParent) ? 'in' : '';
                            html += '<div class="panel panel-default">\
                    <div class="panel-heading panel-left">\
                        <h4 class="panel-title">\
                            <a href="#collapse' + cKey + '" data-parent="#accordion" data-toggle="collapse">' + cName + '</a>\
                        </h4>\
                    </div>';
                            html += '<div class="panel-collapse collapse ' + collapse + '" id="collapse' + cKey + '">\
                            <div class="panel-body">\
                                <table class="table plan-acc">\
                                    <tbody>';
                            if (typeof menuData[cKey] !== 'undefined') {
                                $.each(menuData[cKey], function (sKey, sName) {
                                    html += '<tr>\
                                            <td>\
                                                <a href="' + baseUrl + 'Plan/subcategory/' + companyid + '/' + sKey + '">' + sName + '</a>\
                                            </td>\
                                        </tr>';
                                });
                            }
                            html += '<tr>\
                                    <td>\
                                        <a href="' + baseUrl + 'Plan/addmore/' + companyid + '/' + cKey + '">Add More...</a>\
                                    </td>\
                                </tr>';
                            html += '</tbody>\n\
                                </table>\
                            </div>\
                        </div>';
                            html += '</div>';
                        });
                    }
//                    html += '<div class="panel panel-default">\
//                <div class="panel-heading panel-left">\
//                    <h4 class="panel-title">\
//                        <a href="' + baseUrl + 'Plan/addmore/" >Add More...</a>\
//                    </h4>\
//                </div>\
//            </div>';
                    $('#accordion').append(html);
                }
            });
        </script>
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <!-- Custom JavaScript -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/biz_jumper.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jump_menu.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script>
<!--        <script type="text/javascript" src="https://cdn.bootcss.com/summernote/0.8.1/summernote.js"></script>-->
        <!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/demo.all.js"></script>-->

    </body>
</html>
