<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Subscription page for the new users.">
        <meta name="Keywords" content="business plan software, bizjumper, business plan, business software, business pitch, startups, business plan tools">
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
            <div class="main-page">
                <!-- Page Content -->
                <div class="container-fluid">
                    <div class="row company-head">
                        <h2 class="text-center cctxt"> Create a New Company</h2>
                    </div>
                </div>

                <div class="container-fluid">
                    <form class="create_company" id="create_company" method="post" enctype="multipart/form-data">
                        <div class="col-md-2 col-lg-2 hidden-xs hidden-sm"></div>
                        <div class="main-form col-md-8 col-lg-8 col-sm-12 col-xs-12">
                            <table class="table com_table ">
                                <tbody>
                                    <tr>
                                        <td class="text-left">
                                            <h4>Company Name</h4>
                                        </td>
                                        <td class="right">
                                            <div class="form-group com">
                                                <input type="text" id="inputcompanyname" name="company" class="form-control" placeholder="Enter your company name" required autofocus />
                                                <label for="name">(Your company name will appear in your business pitch and business plan)</label>
                                            </div>
                                        </td>
                                    </tr>
<!--                                    <tr>
                                        <td class="left">
                                            <h4>Bussiness Stage</h4>
                                        </td>
                                        <td class="right">
                                            <div class="form-group com ">
                                                <div class="com-radio">
                                                    <table class="inner_radio">
                                                        <tbody>
                                                            <tr>
                                                                <td><input id="optionsRadios1" type="radio" value="1" name="b_type" checked /></td>
                                                                <td><p> New Business</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input id="optionsRadios1" type="radio" value="2" name="b_type" /></td>
                                                                <td><p>Established (one or more years)</p></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <label for="name">(This will help us to make adjustments to your business plan outline)</label>
                                            </div>
                                        </td>
                                    </tr>-->
                                    <tr>
                                        <td class="text-left">
                                            <h4>Start Year </h4>
                                        </td>
                                        <td class="right">
                                            <div class="form-group com ">

                                                <select class="form-control year" name="forecast_year">
                                                    <?php
                                                    $year = date("Y");
                                                    for ($i = '4'; $i > 0; $i--) {
                                                        $yr = $year++;
                                                        ?>
                                                        <option value="<?= $yr; ?>"><?= $yr; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            </br>
                                            <label for="name">(Give the start year to execute your business plan. This cannot be changed later.)</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">
                                            <h4>Financial Forecast for</h4>
                                        </td>
                                        <td class="right">
                                            <div class="form-group com ">
                                                <div class="com-radio">
                                                    <table class="inner_radio">
                                                        <tbody>
                                                            <tr>
                                                                <td><input id="optionsRadios2" type="radio" value="3" name="f_length" checked></td>
                                                                <td><p> 3 Years</p></td>
                                                            </tr>
<!--                                                            <tr>
                                                                <td><input id="optionsRadios2" type="radio" value="5" name="f_length" checked></td>
                                                                <td><p> 5 Years</p></td>
                                                            </tr>-->
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
<!--                                    <tr>
                                        <td class="text-left">
                                            <h4>Bussiness Stage</h4>
                                        </td>
                                        <td class="right">
                                            <div class="form-group com ">
                                                <div class="com-radio">
                                                    <table class="inner_radio">
                                                        <tbody>
                                                            <tr>
                                                                <td><input id="optionsRadios2" type="radio" value="1" name="b_stage" checked></td>
                                                                <td><p> 1 Year of monthly details</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input id="optionsRadios2" type="radio" value="2" name="b_stage" checked></td>
                                                                <td><p> 2 Year of monthly details</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input id="optionsRadios2" type="radio" value="3" name="b_stage" checked></td>
                                                                <td><p> 3 Year of monthly details</p></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <label for="name">(How many of those years do you want to use monthly vs. annual detail?)</label>
                                            </div>
                                        </td>
                                    </tr>-->
                                    <tr>
                                        <td class="text-left">
                                            <h4>Preferred Currency</h4>
                                        </td>
                                        <td class="right">
                                            <div class="form-group com ">
                                                <select class="form-control" name="currency">
                                                    <option value="1">Rupee</option>
                                                    <option value="2">Dollar</option>
                                                    <option value="3">Yen</option>
                                                    <option value="4">Pound</option>
                                                </select>
                                            </div>
                                            <label for="name">(Which currency symbol would you like to have in your financials?)</label>
                                            </div>
                                        </td>
                                    </tr>
<!--                                    <tr>
                                        <td class="left">
                                            <h4>Business Logo</h4>
                                        </td>
                                        <td class="right">
                                            <input id="exampleInputFile" type="file" name="logo"/>
                                        </td>
                                    </tr>-->
                                </tbody>
                            </table>
                            <div class=" button-group">
                                <a class=" col-md-12 col-xs-12 col-sm-12">
                                    <button type="submit" class="btn btn-lg btn-warning check_company">Create Company</button><span class="btn-space"></span> 
                                   <!--<a class="btn btn-warning btn-lg"><i class="glyphicon glyphicon-eye-open"></i> Create Company </a><span class="btn-space"></span>-->
                                    <!--<button type="submit" class="btn btn-lg btn-secondary" >Cancel</button>--> 
                                   <!--<a class="btn btn-danger btn-lg" href="#" "><i class="glyphicon glyphicon-eye-open"></i> Cancel</a>-->
                                </a>
                            </div>
                            <div class="form-group last">
                                <div class="col-sm-12 mail-error" style="display: none;">
                                    <div class="alert alert-danger text-center error_msg" role="alert"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 col-lg-2 hidden-xs hidden-sm"></div>
                    </form>
                </div>
            </div>
            <!-- Creat Company Modal -->
            <!--            <div class="modal fade" id="warning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header modal-header-warning">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="text-center"><i class="glyphicon glyphicon-thumbs-up"></i> Please Choose Your Option</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="text-center">Hello. Some text here.</h5>
                                        <table class="table table-striped" id="tblGrid">
                                            <tbody>
                                                <tr>
                                                    <td class="img_1"><a class="pitch_redirect"><img src="<?php echo base_url(); ?>assets/image/logo.png" class="img-responsive" alt="Cinque Terre"></a></td>
                                                    <td class="img_2"><a class="plan_redirect"><img src="<?php echo base_url(); ?>assets/image/logo.png" class="img-responsive" alt="Cinque Terre"></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> /.modal-content 
                            </div> /.modal-dialog 
                        </div> /.modal -->

            <div class="modal fade" id="warning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-warning">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#fff;">X</button>
                            <h4 class="text-center" style="color:#fff;"> Select one of the options below</h4>
                        </div>
                        <div class="modal-body">
                            <table class="table modal-table" id="tblGrid">
                                <tbody>
                                    <tr class=" go_to_table">
                                        <td class="img_1 col-xs-6 text-center">

                                            <a class="pitch_redirect"><img src="<?php echo base_url(); ?>assets/image/default/pitch.png" class="img img-responsive" alt="Pitch" ></a>

                                        </td>
                                        <td class="img_2 col-xs-6 text-center">

                                            <a class="plan_redirect"><img src="<?php echo base_url(); ?>assets/image/default/plan.png" class="img img-responsive" alt="Plan"></a>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center modal-btn-sec">
                                            <a  class="btn btn-warning btn-md pitch_redirect"><i class="fa fa-check-square"></i>&nbsp;Create a Business Pitch! </a>
                                        </td>
                                        <td class="text-center modal-btn-sec">
                                            <a class="btn btn-warning btn-md plan_redirect"><i class="fa fa-check-square"></i>&nbsp;Create a Business Plan! </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

            <!-- Modal --> 
            <!-- Footer -->
            <footer style="margin-top: 20%;">
                <div class="row-fluid tc ">
                    <div class="terms">
                        <p>©2016, FAUSTINO SOLUTIONS LLP | All rights reserved </p>
                    </div>
                </div>
                <!-- /.row -->
            </footer>
            <?php $this->load->view('popup/company_popup'); ?>
            <?php $this->load->view('popup/leads_check'); ?>
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
