<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Biz Jumper</title>
        <?php $this->load->view('common/include'); ?>
        <!--<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
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

            <div id="menu-container" class="full-width ">
                <ul class="nav nav-tabs menu-tabs">
                    <li class="active"><a href="<?php echo base_url() ?>dashboard" class="pitch_pitch">My Company</a></li>
                </ul>
            </div>

            <div class="main_container">
                <div class="container custom_table" style="min-height: 605px;">
                    <div class="col-md-10 col-xs-12 col-sm-12 col-md-offset-1">
                        <div id="table_2" style="margin-top: 8% !important;">
                            <div class="add_a_com">
                                <a class="btn btn-md btn-warning add_comp" > <i class="fa fa-plus-circle"></i> &nbsp;Add a Company</a>
                            </div>  
                            <table id="example" class="table table-striped table-bordered bootstrap-datatable datatable " cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>My Companies</th>
                                        <th>Created date</th>
                                        <th class="no-sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($company->num_rows() > 0) {
                                        $data = $company->result_object();
                                        $count = 1;
                                        foreach ($data as $row) {
                                            $date = $row->created;
                                            $dt = new DateTime($date);

                                            $created = $dt->format('Y-m-d');
                                            ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><a href="<?php echo base_url(); ?>pitch/company/<?= $row->company_id; ?>"><?php echo $row->name; ?></a></td>
                                                <td><?php echo $created; ?></td>
                                                <td class="action">
                                                    <a href="<?php echo base_url(); ?>pitch/company/<?= $row->company_id; ?>"  class="table_edit_01" title="Click here to edit"><span class="glyphicon glyphicon-expand"></span></a>
                                                    <a href="#DeletModal" data-toggle="modal" data-target="#DeletModal" onclick="deletecompany('<?= $row->company_id; ?>')" class="table_delet_01 DeletModal" title="Click here to delete your company"><em class="fa fa-trash"></em></a>

                                                </td>
                                            </tr>
                                            <?php
                                            $count++;
                                        }
                                    } else {
                                        ?>
                                        <tr><td id="ext-gen1019" class="dataTables_empty" valign="top" colspan="4">No data available in table</td></tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer style="margin-top:5%;">
                <div class="row-fluid tc ">
                    <div class="terms">
                        <p>©2016, FAUSTINO SOLUTIONS LLP | All rights reserved </p>
                    </div>
                </div>
                <!-- /.row -->
            </footer>
        </div>
        <?php $this->load->view('popup/upgrade_popup'); ?>
        <?php $this->load->view('popup/leads_check'); ?>





        <!-- jQuery -->
        <script src="<?php echo base_url() ?>assets/js/jquery.js"></script>


        <script type="text/javascript" src=" https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src=" https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <!-- <script type="text/javascript" src=" https://cdn.datatables.net/1.10.12/js/dataTables.numericComma.js"></script> -->
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

        <!-- Custom JavaScript -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/main.js"></script>
        <!--Delet Modal -->
        <div class="modal custom fade" id="DeletModal" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header danger">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Delete</h4>
                    </div>
                    <div class="modal-body" align="center">
                        <form role="form">
                            <h4>Are you sure you want to delete this item ?</h4>

                            <a href="#" class="btn btn-warning delete">Yes</a>
                            <a href="#" class="btn btn-danger" role="button" data-dismiss="modal" > No</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>

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

                                                $(document).ready(function () {
                                                    $('#example').DataTable();
                                                });

</script>