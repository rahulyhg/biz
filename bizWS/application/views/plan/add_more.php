<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('common/include'); ?>
    <!-- Drag Section -->
    <!--<link href='<?php echo base_url() ?>assets/dragable/dragula.css' rel='stylesheet' type='text/css' />-->
    <!--<link href='<?php echo base_url() ?>assets/dragable/example.css' rel='stylesheet' type='text/css' />-->
    <link href="<?php echo base_url(); ?>assets/css/plan.css" rel="stylesheet">

    <body>

        <div id="bizjumper-main-content">

            <!-- Navigation -->
            <?php $this->load->view('common/header'); ?>

            <div class="main_container plan_main">

                <div class="container-fluid">
                    <?php $this->load->view('plan/planmenu'); ?>
                    <div class="col-md-10 col-sm-9 col-xs-9">

                        <div class="row ">


                            <div class="well" style="min-height:120px;">
                                <div class="text-left col-md-6 col-xs-6 col-sm-6">
                                    <h2><b>Chapter Setup</b></h2>

                                </div>

                                <div class="text-right col-md-6 col-xs-6 col-sm-6">
                                    <a href="#" class="cross"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="down-sec add_more">

                                <form class="form-inline chapter_title" role="form">
                                    <div class="form-group">
                                        <label for="title">Chapter Title: </label>
                                        <input type="text" class="form-control" readonly id="chapter_title" name="chapter_title" value="<?php echo urldecode($chapter_name); ?>" data-id="<?php echo $parent_id; ?>">
                                    </div>

                                </form>

                                <div class="well add_summ">

                                    <p class="">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>

                                </div>

                                <button class="btn btn-warning btn-lg" data-target="#EditModal" data-toggle="modal" type="button">Add a Milestone</button>
                                <div class='parent'>
                                    <div class=" drag-wrapper">

                                        <h5><b>Currently included in this chapter</b></h5>
                                        <div  class="col-md-12 col-xs-12 row topic_title" id="topic_title">
                                            <div>
                                                <?php foreach ($topic_menu as $row) { ?>
                                                    <div class="form-group">
                                                        <div class="input-group col-md-6 col-xs-6">
                                                            <span class="input-group-addon " id="start-date"><span class="glyphicon glyphicon-list-alt"></span></span>
                                                            <input type="text" <?php echo ($row->status == '0') ? "readonly" : ""; ?> class="form-control"  value="<?php echo $row->name; ?>" aria-describedby="start-date" placeholder="Enter Your Topic Name">
                                                        </div>
                                                        <div class="input-group col-md-5 col-xs-5">
                                                            <a class="table_edit edit_chapter"  data-target="#EditModal" data-toggle="modal" onclick="edittitle(<?php echo $row->id; ?>, '<?php echo $row->name; ?>')"><em class="fa fa-pencil"></em></a>
                                                            <a class="table_delet" data-target="#DeletModal" data-toggle="modal" href="#DeletModal" onclick="hide(<?php echo $row->id; ?>)"><em class="fa fa-trash"></em></a>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div> 
                                        </div>

                                        <h5 class="dropabale-heading"><b>Other section available to add</b></h5>
                                        <div id='right-lovehandles' class="col-md-12 col-xs-12 drag-panel drag-container" >




                                        </div> 


                                    </div>
                                </div> 

                            </div>


                        </div>





                        <div class="row threed_btn">


                            <!-- Indicates a successful or positive action -->
                            <button type="button" class="btn btn-warning btn-lg btn3d pull-right"><span class="glyphicon glyphicon-cloud"></span> Continue</button>
                        </div>


                    </div>



                </div>





            </div>





            <!-- Footer -->
            <?php $this->load->view('common/footer'); ?>


        </div>
        <!-- /.container -->



    </div>
    <!-- /bizjumper-main-content -->


    <script src="<?php echo base_url() ?>assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

    <!-- Custom JavaScript -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/biz_jumper.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jump_menu.js"></script>

    <script type="text/javascript" src="https://cdn.bootcss.com/summernote/0.8.1/summernote.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/plan.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url() ?>assets/js/demo.all.js"></script>-->

    <!-- Drag Section -->

<!--    <script src='<?php echo base_url() ?>assets/dragable/dragula.js'></script>
    <script src='<?php echo base_url() ?>assets/dragable/example.min.js'></script> -->
    <!-- jQuery -->
    <div data-backdrop="static" data-keyboard="false" role="dialog" id="EditModal" class="modal custom fade" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Edit Here</h4>
                </div>
                <form role="form" name="topic_name" class="topic_name">
                    <div align="center" class="modal-body">
                        <div style="width:80%; margin-top:5%;" class="form-group">
                            <input type="text" placeholder="Enter Assets name" id="text" class="form-control" name="topic_name">
                            <input type="hidden" name="id" value=""/>
                            <input type="hidden" name="type" value="add"/>
                            <input type="hidden" name="cid" value="<?php echo $this->uri->segment(3); ?>"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" type="submit">Save Changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>
