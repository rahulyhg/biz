<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('common/include'); ?>
    <link href="<?php echo base_url() ?>assets/css/popup.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/nicedit_1.js"></script> 
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/nicCount.js"></script> 
    <style type="text/css">
        .datepicker{width:20% !important;}
        .datepicker-dropdown{z-index: 10000 !important;}
    </style>
    <body>
        <div id="bizjumper-main-content">
            <!-- Navigation -->
            <?php $this->load->view('common/header'); ?>
            <div class="main_container">
                <!-- Page Content -->
                <div class="container-fluid">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <?php $this->load->view('common/pitchmenu'); ?>
                        <div class="col-md-10 col-xs-9 col-sm-9 resize">
                            <div class="tab-content">
                                <div class="tab-pane active com-right" id="a">
                                    <?php
                                    if ($company_detail->num_rows() > 0) {
                                        $company_det = $company_detail->row();
                                        $company = $company_det->name;
                                        $url = "assets/image/logo/$company_det->logo";
                                        $val = $company_det->logo;
                                        if (!empty($val) && file_exists($_SERVER['DOCUMENT_ROOT'] . "bizjumper/assets/image/logo/$val")) {
                                            $img = $val;
                                        } else {
                                            $img = '';
                                        }
                                    } else {
                                        $company = '';
                                        $img = '';
                                    }
                                    ?>
                                    <form enctype="multipart/form-data" accept-charset="utf-8"  id="company"  method="post">
                                        <div class="form-group com-name">
                                            <input name="company" type="text" class="form-control" id="com-name" placeholder="Company Name" readonly value="<?php echo (!empty($company)) ? $company : ''; ?>" required autofocus>
                                        </div>

                                        <div class="row row-centered">
                                            <div class="logo-box">
                                                <div class="box-text">
                                                    <p>Select and upload your company logo from your computer</p>
                                                    <div class="form-group box-form">
                                                        <input type="file" name="logo" class="file">
                                                        <div class="input-group col-xs-12">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>

                                                            <input type="text" name="logo1" value="<?php echo $img; ?>" class="form-control input-lg" readonly placeholder="Upload Logo">

                                                            <span class="input-group-btn">
                                                                <button class="browse btn btn-warning input-lg" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <p style="font-size:12px;">( Image file should be in png or jpg format and file size should not exceed 2MB )</p> 
                                                </div>
                                                <div class="col-sm-12 mail-error" style="display: none;">
                                                    <div class="alert alert-danger text-center error_msg" role="alert"></div>
                                                </div>
                                            </div>
                                            <h4>This is where your company's logo will be added in case you would like to have a logo. The cover page of your plan will contain the same image.</h4>
                                        </div>
                                        <div class="row button-style text-right">
                                            <button type="button" class="btn btn-warning com-btnn company">Continue</button>
                                        </div> 
                                    </form>
                                </div>

                                <?php
                                if ($headline->num_rows() > 0) {
                                    $data = $headline->row();
                                    $headline_value = $data->headline;
                                    $problem_value = $data->problem;
                                    $solution_value = $data->solution;
                                    $target_value = $data->target;
                                    $sales_value = $data->sales;
                                    $marketing_value = $data->marketing;
                                } else {
                                    $headline_value = '';
                                    $problem_value = '';
                                    $solution_value = '';
                                    $target_value = '';
                                    $sales_value = '';
                                    $marketing_value = '';
                                }
                                ?>


                                <!--Code for Headline-->
                                <div class="tab-pane logo-right" id="b">
                                    <h2><b>Elevator Pitch</b></h2>
                                    <div class="">
                                        <div class="prb-box" style="min-height: 250px !important;">
                                            <div class="prb-text">
                                                <p><b>The elevator pitch needs to be powerful and must open with an impressive description of your company. You will also need to stress upon the business opportunity offered by your company. </b></p>
                                                <p><b>The various features that will need to be impressed upon include</b></p>
                                                <ul style="color:#9999A6 !important;font-weight: bold;">
                                                    <li style="list-style-type: lower-alpha;"><p><b>To what do you attribute your success?</b></p></li>
                                                    <li style="list-style-type: lower-alpha;"><p><b>Whether your product or service is innovative?</b></p></li>
                                                    <li style="list-style-type: lower-alpha;"><p><b>What is the market you have selected ?</b></p></li>
                                                    <li style="list-style-type: lower-alpha;"><p><b>Your crack team you have selected for the purpose? There is no requirement of stuffing every detail in this space. It is more important to stress on the major features.</b></p></li>
                                                </ul>
                                            </div>  
                                            <div class="fontawesom">
                                                <img class="img img-responsive default_img" src="<?php echo base_url(); ?>assets/image/default/write.png">
                                            </div>  
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="prb-box" style="">
                                            <div class="col-md-12 col-xs-12 col-sm-12 prb-text" style="width:100%">
                                                <h4><b>Example :</b></h4>
                                                <p class="elevator_sample">An XYZ company will be a one-stop online platform for Indian families to search, plan, organize and manage any family events.</p>
                                            </div> 
                                            <button class="btn btn-warning pull-right elevator" type="button" style="margin-right: 2%;">Copy content</button>
                                        </div>
                                    </div>

                                    <div class=" prb-content">
                                        <textarea maxlength="200" class="form-control head_desc" rows="4" id="" ><?php echo $headline_value; ?></textarea>
                                        <span class="head_desc_limit"></span> characters left.

                                    </div>

                                    <div class="button-style text-right">
                                        <button class="btn btn-warning pull-left complete" type="button">Preview</button>
                                        <button type="button" class="biz_pitch btn btn-warning logo-btnn ">Continue</button>
                                    </div> 
                                </div> 

                                <!--Code for Problem-->
                                <div class="tab-pane prb-right" id="c">
                                    <h2><b>Problem Statement</b></h2>
                                    <div class="">
                                        <div class="prb-box">
                                            <div class="prb-text">
                                                <p><b>It is necessary to spell out the challenges that you wish to tackle on behalf of your clients. However, it is also important to ensure that you take on problems that are aligned to your own market. The typical problem may well be the need of your client to open a new kind of Mediterranean Restaurant in the town. But, you will have to see to it that your solution is what your client is comfortable with. </b></p>
                                            </div>  
                                            <div class="fontawesom">
                                                <img class="img img-responsive default_img" src="<?php echo base_url(); ?>assets/image/default/problem.png">
                                            </div>  
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="prb-box" style="min-height: 170px;">
                                            <div class="col-md-12 col-xs-12 col-sm-12 prb-text" style="width:100%; ">
                                                <h4><b>Example :</b></h4>
                                                <p class="problem_sample">Families who are residing in semi-urban areas are facing difficulty in arranging family events The current vendors which are available in the market have problems like high cost & Poor product quality.</p>
                                            </div> 
                                            <button class="btn btn-warning pull-right clone_problem" type="button" style="margin-right: 2%;">Copy content</button>
                                        </div>
                                    </div>

                                    <div class=" prb-content">
                                        <textarea class="form-control prob_desc" rows="4"   style="width: 100%;"><?php echo $problem_value; ?></textarea>
                                        <span class="prob_desc_limit"></span> characters left.
                                    </div>

                                    <div class=" button-style text-right">
                                        <button class="btn btn-warning pull-left complete" type="button">Preview</button>
                                        <button type="button" class="biz_pitch btn btn-warning prb-btnn ">Continue</button>
                                    </div> 
                                </div>


                                <!--Code for Solution-->
                                <div class="tab-pane sol-right" id="d">
                                    <h2><b>The Solution</b></h2>
                                    <div class="">
                                        <div class="sol-box" >
                                            <div class="sol-text">
                                                <p><b>You will have to find a solution to each of the problems faced by your customer. Here there is a need to advise your customer how your company has the perfect answer to his problems. It is not adequate to merely suggest to your client a product or a service. You will need to explain how your company has a solution that is not only ideal but it is also superior to any other solution. </b></p>
                                            </div>  
                                            <div class="fontawesom">
                                                <img class="img img-responsive default_img" src="<?php echo base_url(); ?>assets/image/default/idea.png">
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="sol-box" style="min-height: 170px;">
                                            <div class="col-md-12 col-xs-12 col-sm-12 sol-text" style="width:100%">
                                                <h4><b>Example :</b></h4>
                                                <p class="solution_sample">An XYZ company will support end-to-end events by suggesting the most auspicious event, timings, recommending suitable service provider or vendor and providing continuous support until gets executed.</p>
                                            </div>
                                            <button class="btn btn-warning pull-right clone_solution" type="button" style="margin-right: 2%;">Copy content</button>
                                        </div>
                                    </div>

                                    <div class=" sol-content_2">
                                        <form class="form-horizontal">
                                            <textarea class="form-control sol_desc"  rows="4" maxlength="200" style="width: 100%;"><?php echo $solution_value ?></textarea>
                                            <span class="sol_desc_limit"></span> characters left.
                                        </form>
                                    </div>

                                    <div class=" button-style text-right">
                                        <button class="btn btn-warning pull-left complete" type="button">Preview</button>
                                        <button type="button" class="biz_pitch btn btn-warning sol-btnn ">Continue</button>
                                    </div>
                                </div>

                                <!--Code for target-->
                                <div class="tab-pane tar-right" id="e">
                                    <h2><b>Market Opportunity</b></h2>
                                    <div class="">
                                        <div class="tar-box" style="min-height:270px !important;">
                                            <div class="tar-text">
                                                <p><b>Selecting your potential customers is your next step. You will have to concentrate on your primary market and any others that you may also need to target. It is important to have a niche clientele and not go about selling your product or service to just about everyone. Here, the line followed by Adidas is pertinent. This global company targets only one kind of customers for each of its products. A sharp focus in this respect is necessary for directing your resources.  </b></p>
                                                <p><b>The opportunity the market offers you is vital. You will have to probe the market and assess the financial scope of each segment of the market you are interested. This way you will come to know the kind of financial prospect on offer to you from the market and the kind of annual expenditure expected in your market segment. This is the best time for you to do market research and discuss with those that are knowledgeable about the industry you are in. You must also talk with your potential customers. These discussions are vital to your future growth. </b></p>
                                            </div>
                                            <div class="fontawesom">
                                                <img class="img img-responsive default_img" src="<?php echo base_url(); ?>assets/image/default/target.png">
                                            </div>    
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="tar-box" style="min-height: 170px;">
                                            <div class="col-md-12 col-xs-12 col-sm-12 tar-text" style="width:100%">
                                                <h4><b>Example :</b></h4>
                                                <p class="target_sample">During the late 1990s and early 2000 industry has spent around 20 + crores on diversified events. In upcoming years, it is expected to clock a growth rate of 25 % annually on YOY(Year-On-Year ).</p>
                                            </div>
                                            <button class="btn btn-warning pull-right clone_target" type="button" style="margin-right: 2%;">Copy content</button>
                                        </div>
                                    </div>

                                    <div class=" tar-content">
                                        <form class="form-horizontal">
                                            <textarea class="form-control tar_desc" id="tar_desc" rows="4" style="width: 100%;"><?php echo $target_value; ?></textarea>
                                            <span class="tar_desc_limit"></span> characters left.
                                        </form>
                                    </div>
                                    <div class=" button-style text-right">
                                        <button class="btn btn-warning pull-left complete" type="button">Preview</button>
                                        <button type="button" class="biz_pitch btn btn-warning tar-btnn ">Continue</button>
                                    </div>
                                </div>

                                <!--Code for Competitor-->
                                <div class="tab-pane cpt-right" id="f">
                                    <h2><b>Competitive Landscape</b></h2>
                                    <div class=" cpt-box" style="min-height:180px !important;">
                                        <div class="cpt-text">
                                            <p><b>The next step is to create a list of those that will be your competitors in the field. In the case of lack of direct competitors you will need to focus on diverse ways that your customers adopt to sort out their problems currently. If you are in the entertainment business, say the bowling alley, there are others such as the local theaters and the restaurants that are also competing with you in a way. Your approach is to assess in what way your offer is superior to that of the others. Is your offer more tempting because it is cheaper or that your location is more attractive? </b></p>
                                        </div>
                                        <div class="fontawesom">
                                            <img class="img img-responsive default_img" src="<?php echo base_url(); ?>assets/image/default/competitor.png">
                                        </div>    
                                    </div>
                                    <div class=" img-btn-box">
                                        <div class="cpt-image-btn">
                                            <button type="button" class="btn btn-warning btn-md comp_button pull-right" data-toggle="modal" data-target="#competitors" >Add Competitors</button>
                                        </div>
                                    </div>
                                    <div class="cpt-table">
                                        <div class="row">    
                                            <div class="col-md-12">
                                                <div class="panel panel-default panel-table">
                                                    <div class="panel-heading">
                                                        <div class="row">
                                                            <div class="col col-xs-6">
                                                                <h3 class="panel-title">Competitor</h3>
                                                            </div>
                                                            <div class="col col-xs-6 text-right">
                                                                <!-- <button type="button" class="btn btn-sm btn-default btn-create">Create New</button>
                                                                <button type="button" class="btn btn-sm btn-default btn-create">Save Changes</button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body">

                                                        <table class="table table-striped table-bordered table-list" id="competitor_table">
                                                            <?php
                                                            $data = $competitor->result_object();
                                                            ?>
                                                            <thead>
                                                                <tr>
                                                                    <th class="hidden-xs">No</th>
                                                                    <th>Competitor Name</th>
                                                                    <th>Description</th>
                                                                    <th>Options</th>
                                                                </tr> 
                                                            </thead>
                                                            <?php
                                                            if ($competitor->num_rows() > 0) {
                                                                ?>
                                                                <tbody>
                                                                    <?php
                                                                    $i = '1';
                                                                    foreach ($data as $row) {
                                                                        ?>
                                                                        <tr data-status="disabled" id="comp_tr_<?php echo $row->id; ?>">
                                                                            <td class="hidden-xs text-center"><?php echo $i; ?></td>
                                                                            <td><?php echo $row->competitor_name; ?></td>
                                                                            <td>
                                                                                <?php echo $row->advantage; ?>
                                                                            </td>                            
                                                                            <td align="center" class="text-left">
                                                                                <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Edit" onclick="comp_edit(this,<?php echo $row->id; ?>)"  data-id="<?php echo $row->id; ?>"><em class="fa fa-pencil"></em></a>
                                                                                <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Delete" onclick="comp_delete(<?php echo $row->id; ?>)" data-id="<?php echo $row->id; ?>" ><em class="fa fa-trash"></em></a>
                                                                            </td>
                                                                        </tr>
                                                                        <?php
                                                                        $i++;
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <tr><td id="ext-gen1019" class=" text-center empty_comp" valign="top" colspan="5">No Competitors records found!!</td></tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="button-style text-right">
                                        <button class="btn btn-warning pull-left complete" type="button">Preview</button>
                                        <button type="button" class="btn btn-warning cpt-btnn ">Continue</button>
                                    </div> 
                                </div>


                                <!--Code for funds-->
                                <div class="tab-pane fund-right" id="g">
                                    <h2><b>Funding Needs</b></h2>
                                    <div class=" fund-box">
                                        <div class="fund-text">
                                            <p><b>You will need funds. Here, one needs to assess the amount one will need and also assess the manner in which you will spend this money. Funding is a major issue and one needs to exercise caution especially where it is illegal to solicit an investment. It may be a wise idea to be discreet when amplifying how you plan to compensate the investor by way of equity participation or other methods.</b></p>
                                        </div>
                                        <div class="fontawesom">
                                            <img class="img img-responsive default_img" src="<?php echo base_url(); ?>assets/image/default/funds.png">
                                        </div>    
                                    </div>

                                    <div class="">
                                        <div class="fund-box" style="min-height: 170px;">
                                            <div class="col-md-12 col-xs-12 col-sm-12 fund-text" style="width:100%">
                                                <h4><b>Example :</b></h4>
                                                <p class="funds_sample">An XYZ company would require INR 1M (million) equity funding to meet future business development opportunities to become competitive and increase customer base.</p>
                                            </div>
                                            <button class="btn btn-warning pull-right clone_funds" type="button" style="margin-right: 2%;">Copy content</button>
                                        </div>
                                    </div>

                                    <?php
                                    if ($funds->num_rows() > 0) {
                                        $data = $funds->row();
                                        $amount = $data->fund_amount;
                                        $desc = $data->fund_use;
                                    } else {
                                        $amount = '';
                                        $desc = '';
                                    }
                                    ?>
                                    <div class=" img-btn-box fund-button-box">
                                        <div class="fund_sub_text">
                                            <h4>How much funds are you seeking?</h4>
                                            <form role="form ">
                                                <div class="form-group">
                                                    <input type="text" maxlength="16" class="form-control" id="com-name" name="funds" placeholder="Fund Value" value="<?php echo $amount; ?>">
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                    <div class="sol-content" style="margin-top: 0px;">
                                        <textarea class="form-control fund_desc" rows="4"  style="width: 100% !important;"><?php echo $desc; ?></textarea>
                                        <span class="fund_desc_limit"></span> characters left.
                                    </div>
                                    <div class=" button-style text-right">
                                        <button class="btn btn-warning pull-left complete" type="button">Preview</button>
                                        <button type="button" class="btn btn-warning fund-btnn funds">Continue</button>
                                    </div>  
                                </div>


                                <!--code for Sales-->
                                <div class="tab-pane sal-right" id="h">
                                    <h2><b>Sales Channels</b></h2>
                                    <div class=" sal-box">
                                        <div class="sal-text">
                                            <p><b>Your plans of getting your products or services to the market is the sales pitch. Your plan may include the use of a retail store or a website or even a mail order catalogue. Will you be planning on the use of a sales team to sell your product or service or will you plan on selling with the help of distributors and dealers or other intermediaries? In order to appreciate your type of business model and its economics it is necessary to identify all your sales channels. </b></p>
                                        </div>
                                        <div class="fontawesom">
                                            <img class="img img-responsive default_img" src="<?php echo base_url(); ?>assets/image/default/sales.png">
                                        </div>    
                                    </div>
                                    <div class="">
                                        <div class="sal-box" style="min-height: 170px;">
                                            <div class="col-md-12 col-xs-12 col-sm-12 sal-text" style="width:100%">
                                                <h4><b>Example :</b></h4>
                                                <p class="sales_sample">On the consumer-facing side, XYZ is not charging anything. Consumer has to free signup and select the preferred vendors  to avail the services.Best deals will be provided on every event category.</p>
                                            </div>
                                            <button class="btn btn-warning pull-right clone_sales" type="button" style="margin-right: 2%;">Copy content</button>
                                        </div>
                                    </div>
                                    <div class=" img-btn-box">
                                        <div class="sal-image-btn">
                                            <form class="form-horizontal">
                                                <textarea class="form-control sal_desc"  rows="4" style="width: 100%;"><?php echo $sales_value; ?></textarea>
                                                <span class="sal_desc_limit span_text_left"></span> characters left.
                                            </form>
                                        </div>
                                        <!-- <div class="sal-image">
                                            <img src="../img/sales.png" class="img-responsive" alt="Cinque Terre">
                                        </div> -->
                                    </div>
                                    <div class=" button-style text-right">
                                        <button class="btn btn-warning pull-left complete" type="button">Preview</button>
                                        <button type="button" class="biz_pitch btn btn-warning sal-btnn ">Continue</button>
                                    </div>
                                </div>

                                <!--code for Marketing-->
                                <div class="tab-pane mar-right" id="m">
                                    <h2><b>Marketing Activities</b></h2>
                                    <div class=" mar-box" style="min-height:200px !important;">
                                        <div class="mar-text">
                                            <p><b>Your marketing can be only as good as the level of success of attracting eye balls. You have to be able to generate interest in your products or services. It is only then that the interest will change into actual prospects with customers. You will have to be able to assess your website and the attention it generates. It is important to discuss the kind of online marketing you do and the manner in which you carry out online advertising. It is also possible that your advertising is in print or otherwise. Trade shows and sponsored events also draw in customers and if dealers and resellers are involved in your marketing strategy it may be worthwhile to know the type of marketing you have adopted so that it is possible for you to retain these important partners. </b></p>
                                        </div>
                                        <div class="fontawesom">
                                            <img class="img img-responsive default_img" src="<?php echo base_url(); ?>assets/image/default/marketing.png">
                                        </div>    
                                    </div>
                                    <div class="">
                                        <div class="mar-box" style="min-height: 170px;">
                                            <div class="col-md-12 col-xs-12 col-sm-12 mar-text" style="width:100%">
                                                <h4><b>Example :</b></h4>
                                                <p class="market_sample">Although initial customer acquisition is done through word of mouth but to reach wider target segment XYZ have to adopt Digital Marketing. XYZ would focus on SEO, PPC, Social Media & Blogging.</p>
                                            </div>
                                            <button class="btn btn-warning pull-right clone_market" type="button" style="margin-right: 2%;">Copy content</button>
                                        </div>
                                    </div>
                                    <div class="img-btn-box">
                                        <div class="mar-image-btn">
                                            <form class="form-horizontal">
                                                <textarea class="form-control mar_desc" rows="4" style="width: 100%;"><?php echo $marketing_value; ?></textarea>
                                                <span class="mar_desc_limit"></span> characters left.
                                            </form>
                                        </div>
                                        <!-- <div class="sal-image">
                                            <img src="../img/sales.png" class="img-responsive" alt="Cinque Terre">
                                        </div> -->
                                    </div>
                                    <div class=" button-style text-right">
                                        <button class="btn btn-warning pull-left complete" type="button">Preview</button>
                                        <button type="button" class="biz_pitch btn btn-warning mar-btnn ">Continue</button>
                                    </div>
                                </div>


                                <!--code for Milestones-->
                                <div class="tab-pane mil-right" id="i">
                                    <h2><b>Traction</b></h2>
                                    <div class=" mil-box">
                                        <div class="mil-text">
                                            <p><b>Your next aim is to make out a list of time-based milestones relevant to your project. The milestones should be in terms of achievements and events that will need to occur to prove that your business has the necessary traction. These milestones can be the launch of a new product or adding a new entrant to your management team. It can even be locating your new store at a vantage location. Although you can list numerous milestones, it is important to note that the pitch will feature only the  six forthcoming milestones. </b></p>
                                        </div>
                                        <div class="fontawesom">
                                            <img class="img img-responsive default_img" src="<?php echo base_url(); ?>assets/image/default/milestone.png">
                                        </div>    
                                    </div>
                                    <div class=" img-btn-box">
                                        <!--                                        <div class="mil-image">
                                                                                    <img src="<?php echo base_url(); ?>assets/image/milestones.png" class="img-responsive" alt="Cinque Terre">
                                                                                </div>-->
                                        <div class="mil-image-btn">
                                            <button type="button" data-toggle="modal" data-target="#milestone" href="#milestone" class="btn btn-warning btn-md mile_button">Add a Milestone</button>
                                        </div>
                                    </div>
                                    <div class="cpt-table">
                                        <div class="row">    
                                            <div class="col-md-12">
                                                <div class="panel panel-default panel-table">
                                                    <div class="panel-heading">
                                                        <div class="row">
                                                            <div class="col col-xs-6">
                                                                <h3 class="panel-title">UpComing Milestone</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body milestones_detail">
                                                        <table class="table table-striped table-bordered table-list milestones" id="milestones">
                                                            <?php
                                                            $count = '1';
                                                            ?>
                                                            <thead>
                                                                <tr>
                                                                    <th class="hidden-xs">No</th>
                                                                    <th>Milestone Name</th>
                                                                    <th>Milestone Date</th>
                                                                    <th>Description</th>
                                                                    <th>Options</th>
                                                                </tr> 
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                if ($ongoing_milestone->num_rows() > 0) {
                                                                    $count = '1';
                                                                    foreach ($ongoing_milestone->result_object() as $row) {
                                                                        ?>

                                                                        <tr data-status="disabled">
                                                                            <td class="hidden-xs text-center"><?php echo $count; ?></td>
                                                                            <td><?php echo $row->name; ?></td>
                                                                            <td><?php echo $row->date; ?></td>
                                                                            <td>
                                                                                <p><?php echo $row->description; ?></p>
                                                                            </td>                            
                                                                            <td align="center" class="text-left">
                                                                                <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Edit" onclick="milestone_edit(this,<?php echo $row->id; ?>)"><em class="fa fa-pencil"></em></a>
                                                                                <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Delete" onclick="milestone_delete(<?php echo $row->id; ?>)"><em class="fa fa-trash"></em></a>
                                                                                <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Click to complete milestone" onclick="milestone_complete(this,<?php echo $row->id ?>)"><em class="glyphicon glyphicon-ok"></em></a>
                                                                            </td>
                                                                        </tr>

                                                                        <?php
                                                                        $count++;
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <tr><td id="ext-gen1019" class=" text-center" valign="top" colspan="5">No Milestones found!!</td></tr>
                                                                <?php }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default panel-table">
                                                    <div class="panel-heading">
                                                        <div class="row">
                                                            <div class="col col-xs-6">
                                                                <h3 class="panel-title">Completed Milestone</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body">
                                                        <table class="table table-striped table-bordered table-list" id="completed_milestone">
                                                            <thead>
                                                                <tr>
                                                                    <th class="hidden-xs">No</th>
                                                                    <th>Milestone Name</th>
                                                                    <th>Milestone Date</th>
                                                                    <th>Description</th>
                                                                    <th>Options</th>
                                                                </tr> 
                                                            </thead>
                                                            <tbody>

                                                                <?php
                                                                if ($completed_milestone->num_rows() > 0) {
                                                                    $count = '1';
                                                                    foreach ($completed_milestone->result_object() as $row) {
                                                                        ?>

                                                                        <tr data-status="disabled">
                                                                            <td class="hidden-xs text-center"><?php echo $count; ?></td>
                                                                            <td><?php echo $row->name; ?></td>
                                                                            <td><?php echo $row->date; ?></td>
                                                                            <td>
                                                                                <p><?php echo $row->description; ?></p>
                                                                            </td>                            

                                                                            <td align="center" class="text-left">
                                                                                <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Delete" onclick="milestone_comp_delete(this,<?php echo $row->id; ?>)"><em class="fa fa-trash"></em></a>
                                                                            </td>
                                                                        </tr>
                                                                        <?php
                                                                        $count++;
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <tr><td id="ext-gen1019" class=" text-center" valign="top" colspan="5">No Completed Milestones found!!</td></tr>
                                                                <?php }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class=" button-style text-right mil-sp-btn">
                                        <button class="btn btn-warning pull-left complete" type="button">Preview</button>
                                        <a href="<?php echo base_url(); ?>forecast/setupcost/<?php echo $company_id; ?>"><button type="button" class="btn btn-warning ">Continue</button></a>
                                    </div>  
                                </div>

                                <div class="tab-pane for-right" id="j">
                                    <h2><b></b></h2>
                                    <div class=" for-box">

                                        <div class="for-text">

                                            <p>State the problem (or problems) that you solve for your target customers. "Problems" can als appear as unmet needs or wants - the lack of a good Carribbean resaurent in your town, for example. Be sure to tackle a problem that is important to your market. </p>
                                        </div>

                                    </div>

                                    <div class=" img-btn-box">

                                        <div class="for-image">
                                            <img src="../img/milestones.png" class="img-responsive" alt="Cinque Terre">
                                        </div>
                                        <div class="for-image-btn">
                                            <button type="button" class="btn btn-warning btn-md" href="#team" data-toggle="modal" data-target="#team">Add a Team Member</button>
                                        </div>
                                    </div>


                                    <div class="cpt-table">



                                        <div class="row">    
                                            <div class="col-md-12">
                                                <div class="panel panel-default panel-table">
                                                    <div class="panel-heading">
                                                        <div class="row">
                                                            <div class="col col-xs-6">
                                                                <h3 class="panel-title">...</h3>
                                                            </div>
                                                            <div class="col col-xs-6 text-right">
                                                                <!-- <button type="button" class="btn btn-sm btn-default btn-create">Create New</button>
                                                                <button type="button" class="btn btn-sm btn-default btn-create">Save Changes</button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body">
                                                        <table class="table table-striped table-bordered table-list">
                                                            <thead>
                                                                <tr>
                                                                    <th class="hidden-xs">No</th>
                                                                    <th>Team Member Name</th>
                                                                    <th>Description</th>
                                                                    <th>Options</th>
                                                                </tr> 
                                                            </thead>
                                                            <tbody>
                                                                <tr data-status="disabled">
                                                                    <td class="hidden-xs text-center">1</td>
                                                                    <td><h4>Accenture</h4></td>
                                                                    <td>
                                                                        <textarea maxlength="200" ></textarea>
                                                                    </td>                            

                                                                    <td align="center" class="text-left">
                                                                        <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Edit"><em class="fa fa-pencil"></em></a>
                                                                        <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Delete"><em class="fa fa-trash"></em></a>
                                                                        <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Disabled. Click to enable"><em class="fa fa-toggle-off"></em></a>
                                                                    </td>
                                                                </tr>
                                                                <tr data-status="disabled">
                                                                    <td class="hidden-xs text-center">2</td>
                                                                    <td><h4>Robert Bosch</h4></td>
                                                                    <td>
                                                                        <textarea maxlength="200" ></textarea>
                                                                    </td>                            

                                                                    <td align="center" class="text-left">
                                                                        <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Edit"><em class="fa fa-pencil"></em></a>
                                                                        <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Delete"><em class="fa fa-trash"></em></a>
                                                                        <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Disabled. Click to enable"><em class="fa fa-toggle-off"></em></a>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>

                                                    </div>
                                                    <div class="panel-footer">
                                                        <div class="row">
                                                            <div class="col col-xs-4">Page 1 of 5
                                                            </div>
                                                            <div class="col col-xs-8">
                                                                <ul class="pagination hidden-xs pull-right">
                                                                    <li><a href="#">1</a></li>
                                                                    <li><a href="#">2</a></li>
                                                                    <li><a href="#">3</a></li>
                                                                    <li><a href="#">4</a></li>
                                                                    <li><a href="#">5</a></li>
                                                                </ul>
                                                                <ul class="pagination visible-xs pull-right">
                                                                    <li><a href="#">«</a></li>
                                                                    <li><a href="#">»</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class=" button-style text-right for-sp-btn">

                                        <button class="btn btn-warning pull-left complete" type="button">Preview</button>
                                        <button type="button" class="btn btn-warning for-btnn ">Continue</button>

                                    </div>  
                                </div>

                                <div class="tab-pane team-right" id="k">
                                    <h2><b>Our Team</b></h2>
                                    <div class=" for-box">
                                        <div class="for-text">
                                            <p><b>The team is all important. Therefore, you will have to select the principal members of your team and give out the details of how each member is critical to the success of your venture. The Management Team and the owners of the company will need to be included along with the main employees who have special connections or skills or they are important for future tasks besides advisors and any others who you feel are valuable to your project. </b></p>
                                        </div>
                                        <div class="fontawesom">
                                            <img class="img img-responsive default_img" src="<?php echo base_url(); ?>assets/image/default/team.png">
                                        </div>    
                                    </div>
                                    <div class=" img-btn-box">
                                        <div class="for-image-btn">
                                            <button type="button" class="btn btn-warning btn-md clear_team" href="#team" data-toggle="modal" data-target="#team">Add a Team Member</button>
                                        </div>
                                    </div>
                                    <div class="cpt-table">
                                        <div class="row">    
                                            <div class="col-md-12">
                                                <div class="panel panel-default panel-table">
                                                    <div class="panel-heading">
                                                        <div class="row">
                                                            <div class="col col-xs-6">
                                                                <h3 class="panel-title">Team Members</h3>
                                                            </div>
                                                            <div class="col col-xs-6 text-right">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body">
                                                        <table class="table table-striped table-bordered table-list" id="team_table">
                                                            <?php
                                                            $count = $teamdetail->num_rows();
                                                            ?>
                                                            <thead>
                                                                <tr>
                                                                    <th class="hidden-xs">No</th>
                                                                    <th>Name</th>
                                                                    <th>Image</th>
                                                                    <th>Description</th>
                                                                    <th>Options</th>
                                                                </tr> 
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                if ($count > 0) {
                                                                    $count = '1';
                                                                    foreach ($teamdetail->result_object() as $row) {

                                                                        $url = "assets/image/pitch/$row->image";
                                                                        if (!empty($row->image) && file_exists($url)) {
                                                                            $img = base_url() . $url;
                                                                        } else {
                                                                            $img = base_url() . 'assets/image/pitch/partner.png';
                                                                        }
                                                                        ?>
                                                                        <tr data-status="disabled" class="team_<?php echo $row->id; ?>">
                                                                            <td class="hidden-xs text-center"><?php echo $count; ?></td>
                                                                            <td class="text-center">   
                                                                                <h4><?php echo $row->name ?></h4>
                                                                                <h5><?php echo $row->role; ?></h5>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <img alt="<?php echo $row->image ?>" class="img-responsive img-thumbnail da-img" src="<?php echo $img; ?>" />
                                                                                <!--<img src="<?php echo $img; ?>" alt="<?php echo $row->image ?>" class="img-circle" style="width: 15%;"/>-->
                                                                                <input type="hidden" name="team_img" value="<?php echo $row->image ?>" />
                                                                            </td>
                                                                            <td>
                                                                                <p><?php echo $row->description ?></p>
                                                                            </td>                            
                                                                            <td align="center" class="text-left">
                                                                                <a class="btn btn-default" onclick="team_edit(<?php echo $row->id ?>)" data-toggle="tooltip" data-placement="top" title="Edit"><em class="fa fa-pencil"></em></a>
                                                                                <a class="btn btn-default" onclick="team_delete(<?php echo $row->id ?>)" data-toggle="tooltip" data-placement="top" title="Delete"><em class="fa fa-trash"></em></a>
                                                                                <!--<a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Disabled. Click to enable"><em class="fa fa-toggle-off"></em></a>-->
                                                                            </td>
                                                                        </tr>
                                                                        <?php
                                                                        $count++;
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <tr><td id="ext-gen1019" class=" text-center" valign="top" colspan="5">No Team Members found!!</td></tr>
                                                                <?php }
                                                                ?>
                                                            </tbody>
                                                        </table>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class=" button-style text-right for-sp-btn">

                                        <button class="btn btn-warning pull-left complete" type="button">Preview</button>
                                        <button type="button" class="btn btn-warning team-btnn ">Continue</button>

                                    </div>  
                                </div>

                                <div class="tab-pane ptn-right" id="l">
                                    <h2><b>Partners or Suppliers</b></h2>
                                    <div class=" for-box">
                                        <div class="for-text">
                                            <p><b>In the section involving partners and suppliers there is a need to give out the details of diverse patents and relationships besides facilities for equipment as well as any other resources which are critical to your business. This section may also be used to include any item of importance which has so far not been discussed in the remaining pitch.  </b></p>
                                        </div>
                                        <div class="fontawesom">
                                            <img class="img img-responsive default_img" src="<?php echo base_url(); ?>assets/image/default/partner.png">
                                        </div>  
                                    </div>
                                    <div class=" img-btn-box">
                                        <div class="for-image-btn">
                                            <button type="button" class="btn btn-warning btn-md clear_partner"  href="#partner" data-toggle="modal" data-target="#partner">Add a Partner</button>
                                        </div>
                                    </div>


                                    <div class="cpt-table">
                                        <div class="row">    
                                            <div class="col-md-12">
                                                <div class="panel panel-default panel-table">
                                                    <div class="panel-heading">
                                                        <div class="row">
                                                            <div class="col col-xs-6">
                                                                <h3 class="panel-title">Partners</h3>
                                                            </div>
                                                            <div class="col col-xs-6 text-right">
                                                                <!-- <button type="button" class="btn btn-sm btn-default btn-create">Create New</button>
                                                                <button type="button" class="btn btn-sm btn-default btn-create">Save Changes</button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body">
                                                        <table class="table table-striped table-bordered table-list" id="partner_table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="hidden-xs">No</th>
                                                                    <th>Patner Name</th>
                                                                    <th>Partner Image</th>
                                                                    <th>Description</th>
                                                                    <th>Options</th>
                                                                </tr> 
                                                            </thead>

                                                            <tbody>
                                                                <?php
                                                                $count = $partnerdetail->num_rows();
                                                                if ($count > 0) {
                                                                    $i = '1';
                                                                    foreach ($partnerdetail->result_object() as $row) {

                                                                        $url = "assets/image/pitch/$row->image";
                                                                        if (!empty($row->image) && file_exists($url)) {
                                                                            $img = base_url() . $url;
                                                                        } else {
                                                                            $img = base_url() . 'assets/image/pitch/partner.png';
                                                                        }
//                                                echo $img; die;
                                                                        ?>
                                                                        <tr data-status="disabled" class="partner_<?php echo $row->id; ?>">
                                                                            <td class="hidden-xs text-center"><?php echo $i; ?></td>
                                                                            <td><h4><?php echo $row->partner_name ?></h4></td>
                                                                            <td class="text-center">
                                                                                <img alt="<?php echo $row->image ?>" class="img-responsive img-thumbnail da-img" src="<?php echo $img; ?>" />
                                                                                <!--<img src="<?php echo $img; ?>" alt="<?php echo $row->image ?>" class="img-circle" style="width: 15%;"/>-->
                                                                                <input type="hidden" name="team_img" value="<?php echo $row->image ?>" />
                                                                            </td>
                                                                            <td>
                                                                                <p><?php echo $row->description ?></p>
                                                                            </td>                            
                                                                            <td align="center" class="text-left">
                                                                                <a class="btn btn-default" data-toggle="tooltip" data-placement="top" onclick="partner_edit(<?php echo $row->id ?>)" title="Edit"><em class="fa fa-pencil"></em></a>
                                                                                <a class="btn btn-default" data-toggle="tooltip" data-placement="top" onclick="partner_delete(<?php echo $row->id ?>)" title="Delete"><em class="fa fa-trash"></em></a>
                                                                            </td>
                                                                        </tr>


                                                                        <?php
                                                                        $i++;
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <tr><td id="ext-gen1019" class=" text-center" valign="top" colspan="5">No Partners found</td></tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class=" button-style text-right for-sp-btn">

                                        <button type="button" class="btn btn-warning  complete">Preview</button>

                                    </div>  
                                </div>




                            </div>
                        </div>
                        <!-- /tabs -->
                    </div>





                </div><!-- /row -->
            </div>



        </div>





        <!-- Footer -->

        <footer style="margin-bottom: -20px; margin-top: 4%;">
            <div class="row-fluid tc ">
                <div class="terms">
                    <p><?php echo RIGHTS; ?></p>
                </div>
            </div>
            <!-- /.row -->
        </footer>


    </div>
    <!-- /.container -->


</div>
<!-- /bizjumper-main-content -->







<!-- Competitor  Modal -->

<div class="modal fade" id="competitors" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close close_comp" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" id="lineModalLabel">Add Competitor</h3>
            </div>
            <div class="modal-body">
                <!-- content goes here -->
                <form class="competitor_det">
                    <input type="hidden" name="type" value="add" />
                    <div class="form-group">
                        <label for="exampleInputEmail1">Competitor Name</label>
                        <input type="text" class="form-control" name="competitor" id="cpt_name" placeholder="Competitor Name" required autofocus >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Advantages</label>
                        <input type="text" class="form-control" name="advantage" id="cpt_description" placeholder="Advantage" required>
                    </div>
                    <!--<button type="button" class="btn btn-warning close_comp " data-dismiss="modal"  role="button">Close</button>-->
                    <button type="submit" class="btn btn-warning " id="competitor_btt">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Milestone  Modal -->
<div class="modal fade" id="milestone" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" id="lineModalLabel">Add Milestone</h3>
            </div>
            <div class="modal-body">
                <!-- content goes here -->
                <form class="milestone_det">
                    <input type="hidden" name="type" value="add" />
                    <div class="form-group">
                        <label for="exampleInputEmail1">Milestone Name</label>
                        <input type="text" class="form-control" id="cpt_name" placeholder="Target Milestones" name="name" required autofocus>
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
                        <span class="mil_desc_limit"></span> characters left.
                    </div>
                    <input type="hidden" name="milestone_id" value="" />
                    <input name="group" value="1" type="hidden">
                    <!--<button type="button" class="btn btn-warning " data-dismiss="modal"  role="button">Close</button>-->
                    <button type="submit" class="btn btn-warning " id="milestone_btt">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>






<!-- Team Modal -->

<div class="modal fade" id="team" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" id="lineModalLabel">Add Team Memeber</h3>
            </div>
            <div class="modal-body">
                <!-- content goes here -->
                <form class="team_details" id="team_details">
                    <input type="hidden" name="type" value="add" />
                    <input type="hidden" name="team_id" value="" />
                    <div class="form-group">
                        <label for="exampleInputEmail1">Team Member Name</label>
                        <input type="text" id="inputcompanyname" name="name" class="form-control" placeholder="Name" required autofocus />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Team Member Role</label>
                        <input type="text" id="inputcompanyname" name="title" class="form-control" placeholder="Title" required autofocus />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea class="form-control team_desc" rows="3"  id="about_cpt" name="description" ></textarea> 
                        <span class="team_desc_limit"></span> characters left.
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Team Member Image</label>
                        <input type="file" id="inputcompanyname team_img" name="team_img" class="form-control team_img"  />
                        <input id="foo" class="edit_team_img" type="hidden" name="edit_team_img" value="">
                        <div class="form-group image_edit text-center" style="display: none;">
                            <label>OR</label>
                            <br>
                            <img class="img-responsive img-thumbnail team_image" src="" style="width: 15%;">
                        </div>
                    </div>
                    <div class="form-group last">
                        <div class="col-sm-12 mail-error" style="display: none;">
                            <div class="alert alert-danger text-center team_msg" role="alert"></div>
                        </div>
                    </div>
                    <!--<button type="button" class="btn btn-warning clear_team" data-dismiss="modal"  role="button">Close</button>-->
                    <button type="submit" class="btn btn-warning" id="team_btt">Submit</button>
                </form>

            </div>

        </div>
    </div>
</div>





<!-- Partner  Modal -->

<div class="modal fade" id="partner" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" id="lineModalLabel">Add Partner</h3>
            </div>
            <div class="modal-body">

                <!-- content goes here -->
                <form class="partner_details" id="partner_details">
                    <input type="hidden" name="type" value="add" />
                    <input type="hidden" name="partner_id" value="" />
                    <div class="form-group">
                        <label for="exampleInputEmail1">Partner Name</label>
                        <input type="text" id="inputcompanyname" name="name" class="form-control" placeholder="Partner Name" required autofocus />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Biography</label>
                        <textarea class="form-control partner_desc" rows="2" id="desc" name="description"></textarea>
                        <span class="partner_desc_limit"></span> characters left.
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Partner Member Image</label>
                        <input type="file" id="inputcompanyname" name="partner_img" class="form-control partner_img"  />
                        <input id="foo" class="edit_partner_img " type="hidden" name="edit_partner_img" value="">
                        <div class="form-group image_edit text-center" style="display: none;">
                            <label>OR</label>
                            <br>
                            <img class="img-responsive img-thumbnail partner_image" src="" style="width: 15%;">
                        </div>
                    </div>
                    <div class="form-group last">
                        <div class="col-sm-12 mail-error" style="display: none;">
                            <div class="alert alert-danger text-center partner_msg" role="alert"></div>
                        </div>
                    </div>
                    <!--<button type="button" class="btn btn-warning " data-dismiss="modal"  role="button">Close</button>-->
                    <button type="submit" class="btn btn-warning" id="partner_btt">Submit</button>
                </form>


            </div>

        </div>
    </div>
</div>
</body>
</html>
<?php $comp_id = $this->session->userdata('companyid'); ?>


<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
<script type="text/javascript">
                                                                            var parameter = '<?php echo $comp_id; ?>';
</script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/biz_jumper.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/main.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<!-- Include Bootstrap Datepicker -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
<script>
                                                                            $(document).ready(function () {

                                                                                $('#datePicker')
                                                                                        .datepicker({
                                                                                            startDate: '-0m',
                                                                                            format: 'MM d,yyyy'
                                                                                        });
                                                                            });
</script>

<!-- Custom JavaScript -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.limit-1.2.source.js"></script>


<script>
                                                                            $('.team_desc').limit('200', '.team_desc_limit');
                                                                            $('.partner_desc').limit('200', '.partner_desc_limit');
                                                                            $('.mil_desc').limit('200', '.mil_desc_limit');
                                                                            $('.head_desc').limit('200', '.head_desc_limit');
                                                                            $('.prob_desc').limit('200', '.prob_desc_limit');
                                                                            $('.sol_desc').limit('200', '.sol_desc_limit');
                                                                            $('.tar_desc').limit('200', '.tar_desc_limit');
                                                                            $('.sal_desc').limit('200', '.sal_desc_limit');
                                                                            $('.mar_desc').limit('200', '.mar_desc_limit');
                                                                            $('.fund_desc').limit('200', '.fund_desc_limit');
                                                                            $(function () {
                                                                                window.prettyPrint && prettyPrint()
                                                                                $(document).on('click', '.yamm .dropdown-menu', function (e) {
                                                                                    e.stopPropagation()
                                                                                })
                                                                            })
                                                                            $('input[name="funds"]').keyup(function (e)
                                                                            {
                                                                                if (/\D/g.test(this.value))
                                                                                {
                                                                                    // Filter non-digits from input value.
                                                                                    this.value = this.value.replace(/\D/g, '');
                                                                                }
                                                                            });
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
                                                                            $('.clear_team,.close').click(function () {
                                                                                $('.team_details')[0].reset();
                                                                                $('.team_desc').empty();
                                                                                $('.team_desc').limit('200', '.team_desc_limit');
                                                                            });
                                                                            $('.clear_partner,.close').click(function () {
                                                                                $('.partner_details')[0].reset();
                                                                                $('.partner_desc').empty();
                                                                                $('.partner_desc').limit('200', '.partner_desc_limit');
                                                                            });
                                                                            $('.file').bind('change', function () {
                                                                                var name = this.files[0].name;
                                                                                var type1 = name.split('.');
                                                                                var type = type1[1];
                                                                                //this.files[0].size gets the size of your file.
                                                                                var size = this.files[0].size;
                                                                                var img_type = ['png', 'jpg', 'jpeg', 'JPG', 'JPEG', 'PNG', 'gif'];
                                                                                if ((size < '2097152') && ($.inArray(type, img_type) != '-1')) {
                                                                                    $('.mail-error').css('display', 'none');
                                                                                    $('.error_msg').text('');
                                                                                } else if ((size < '2097152') || ($.inArray(type, img_type) == '-1')) {
                                                                                    $('.mail-error').css('display', 'block');
                                                                                    var html = 'Image file should be in png or jpg format';
                                                                                    $('.error_msg').text(html);
                                                                                    return false;
                                                                                } else if ((size > '2097152') || ($.inArray(type, img_type) != '-1')) {
                                                                                    $('.mail-error').css('display', 'block');
                                                                                    var html = 'File size should not be more than 2MB';
                                                                                    $('.error_msg').text(html);
                                                                                    return false;
                                                                                }
                                                                            });
                                                                            $(document).on('change', '.team_img', function () {
                                                                                var name = this.files[0].name;
                                                                                var type1 = name.split('.');
                                                                                var type = type1[1];
                                                                                var size = this.files[0].size;
                                                                                var img_type = ['png', 'jpg', 'jpeg', 'JPG', 'JPEG', 'PNG', 'gif'];
                                                                                if ((size < '2097152') && ($.inArray(type, img_type) != '-1')) {
                                                                                    $('.mail-error').css('display', 'none');
                                                                                    $('.error_msg').text('');
                                                                                } else if ((size < '2097152') || ($.inArray(type, img_type) == '-1')) {
                                                                                    $('.mail-error').css('display', 'block');
                                                                                    var html = 'Image file should be in png or jpg format';
                                                                                    $(this).replaceWith('<input id="inputcompanyname team_img" class="form-control team_img" type="file" name="team_img">');
                                                                                    $('.team_msg').text(html);
                                                                                    return false;
                                                                                } else if ((size > '2097152') || ($.inArray(type, img_type) != '-1')) {
                                                                                    $('.mail-error').css('display', 'block');
                                                                                    var html = 'File size should not be more than 2MB';
                                                                                    $(this).replaceWith('<input id="inputcompanyname team_img" class="form-control team_img" type="file" name="team_img">');
                                                                                    $('.team_msg').text(html);
                                                                                    return false;
                                                                                }
                                                                            });
                                                                            $(document).on('change', '.partner_img', function () {
                                                                                var name = this.files[0].name;
                                                                                var type1 = name.split('.');
                                                                                var type = type1[1];
                                                                                var size = this.files[0].size;
                                                                                var img_type = ['png', 'jpg', 'jpeg', 'JPG', 'JPEG', 'PNG', 'gif'];
                                                                                if ((size < '2097152') && ($.inArray(type, img_type) != '-1')) {
                                                                                    $('.mail-error').css('display', 'none');
                                                                                    $('.error_msg').text('');
                                                                                } else if ((size < '2097152') || ($.inArray(type, img_type) == '-1')) {
                                                                                    $('.mail-error').css('display', 'block');
                                                                                    var html = 'Image file should be in png or jpg format';
                                                                                    $(this).replaceWith('<input id="inputcompanyname team_img" class="form-control partner_img" type="file" name="team_img">');
                                                                                    $('.partner_msg').text(html);
                                                                                    return false;
                                                                                } else if ((size > '2097152') || ($.inArray(type, img_type) != '-1')) {
                                                                                    $('.mail-error').css('display', 'block');
                                                                                    var html = 'File size should not be more than 2MB';
                                                                                    $(this).replaceWith('<input id="inputcompanyname team_img" class="form-control partner_img" type="file" name="team_img">');
                                                                                    $('.partner_msg').text(html);
                                                                                    return false;
                                                                                }
                                                                            });
                                                                            $('.company').click(function () {
                                                                                var data = new FormData($('#company')[0]);
                                                                                var url = base_url + 'pitch/update_company/' + parameter;
                                                                                $.ajax({
                                                                                    url: url,
                                                                                    data: data,
                                                                                    type: 'POST',
                                                                                    mimeType: "multipart/form-data",
                                                                                    dataType: 'json',
                                                                                    contentType: false,
                                                                                    cache: false,
                                                                                    processData: false,
                                                                                    async: false,
                                                                                    beforeSend: function (xhr) {
                                                                                        bodyfadein();
                                                                                    },
                                                                                    success: function (data) {
                                                                                        bodyfadeout();
                                                                                        if (data.flag != 1) {
                                                                                            alert("oops!! Something wrong");
                                                                                            return false;
                                                                                        }
                                                                                    }
                                                                                });
                                                                            });


                                                                            $('.funds').click(function () {
                                                                                var fund = $('input[name="funds"]').val();
                                                                                var description = $('.fund_desc').val();
                                                                                var url = base_url + '/pitch/funds/';
                                                                                $.ajax({
                                                                                    url: url,
                                                                                    type: 'POST',
                                                                                    data: 'fund=' + fund + '&description=' + encodeURIComponent(description),
                                                                                    dataType: 'json',
                                                                                    contentType: 'application/x-www-form-urlencoded',
                                                                                    success: function (data) {
                                                                                        if (data.flag != 1) {
                                                                                            alert("oops!! Something wrong");
                                                                                            return false;
                                                                                        }
                                                                                    }
                                                                                });
                                                                            });

                                                                            $('.close_comp,.comp_button').click(function () {
                                                                                $('input[name="competitor"]').val('');
                                                                                $('input[name="advantage"]').val($.trim(''));
                                                                                $('input[name="type"]').val('add');
                                                                            });

                                                                            function comp_edit(ele, id) {
                                                                                $('#competitors').modal('show');
                                                                                var tr = $(ele).parents('tr');
                                                                                var name = tr.children('td').first().next().html();
                                                                                var advantage = tr.children('td').first().next().next().text();
                                                                                $('input[name="competitor"]').val(name);
                                                                                $('input[name="advantage"]').val($.trim(advantage));
                                                                                $('input[name="type"]').val('edit');
                                                                                var html = '<input type="hidden" name="id" value="' + id + '"/>';
                                                                                $('.competitor_det').append(html);
                                                                                $('.competitor').addClass('edit_comp');
                                                                            }
                                                                            function comp_delete(id) {
                                                                                var company_id = '<?php echo $company_id; ?>';
                                                                                var url = base_url + 'pitch/delete_competitordetail/' + id;
                                                                                $.ajax({
                                                                                    url: url,
                                                                                    data: 'id=' + id + '&company_id=' + company_id,
                                                                                    type: 'post',
                                                                                    dataType: 'json',
                                                                                    beforeSend: function (xhr) {
                                                                                        bodyfadein();
                                                                                    },
                                                                                    success: function (data) {
                                                                                        bodyfadeout();
                                                                                        $('table#competitor_table tbody').empty();
                                                                                        if (data.flag == 1) {
                                                                                            if (jQuery.isEmptyObject(data.data))
                                                                                            {
                                                                                                var html = '<tr><td id="ext-gen1019" class=" text-center empty_comp" valign="top" colspan="5">No Competitors records found!!</td></tr>';
                                                                                                $('table#competitor_table tbody').append(html);
                                                                                            } else {
                                                                                                var count = 1;
                                                                                                $.each(data.data, function (i, j) {
                                                                                                    var html = '<tr data-status="disabled" id="comp_tr_' + j.id + '">\n\
            <td class="hidden-xs text-center">' + count + '</td>\n\
            <td>' + j.competitor_name + '</td><td>' + j.advantage + '</td>\n\
        <td align="center" class="text-left">\n\
        <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Edit" onclick="comp_edit(this,' + j.id + ')"  data-id="' + j.id + '"><em class="fa fa-pencil"></em></a>\n\
        <a class = "btn btn-default" data - toggle = "tooltip" data - placement = "top" title = "Delete" onclick = "comp_delete(' + j.id + ')" data-id = "' + j.id + '" ><em class="fa fa-trash"></em></a>\n\
        </td>\n\
        < /tr>';
                                                                                                    $('table#competitor_table tbody').append(html);
                                                                                                    count++;
                                                                                                });
                                                                                            }
                                                                                        } else {
                                                                                            alert("oops!! Something wrong");
                                                                                        }
                                                                                    }
                                                                                });
                                                                                return false;
                                                                            }


                                                                            function team_edit(id) {
                                                                                var company_id = '<?php echo $company_id; ?>';
                                                                                var url = base_url + 'pitch/get_teamdetail';
                                                                                $.ajax({
                                                                                    data: 'id=' + id + '&company_id=' + company_id,
                                                                                    url: url,
                                                                                    type: 'post',
                                                                                    dataType: 'json',
                                                                                    async: false,
                                                                                    success: function (data) {
                                                                                        if (data.flag == '1') {
                                                                                            $('input[name="type"]').val('edit');
                                                                                            $('input[name="name"]').val(data.name);
                                                                                            $('input[name="title"]').val(data.role);
                                                                                            $('.team_desc').text(data.desc);
                                                                                            $('input[name="team_id"]').val(id);
                                                                                            if (data.image != '') {
                                                                                                $('.image_edit').css('display', 'block');
                                                                                                var src = base_url + 'assets/image/pitch/' + data.image;
                                                                                                $('input[name="edit_team_img"]').val(data.image);
                                                                                                $('.team_image').attr('src', src);
                                                                                            }
                                                                                            $('input[name="type"]').val('edit');
                                                                                            $('#team').modal('show');
                                                                                        }
                                                                                    }
                                                                                });
                                                                            }


                                                                            function partner_edit(id) {
                                                                                var company_id = '<?php echo $company_id; ?>';
                                                                                var url = base_url + 'pitch/get_partnerdetail';
                                                                                $.ajax({
                                                                                    data: 'id=' + id + '&company_id=' + company_id,
                                                                                    url: url,
                                                                                    type: 'post',
                                                                                    dataType: 'json',
                                                                                    async: false,
                                                                                    success: function (data) {
                                                                                        if (data.flag == '1') {
                                                                                            $('input[name="name"]').val(data.name);
                                                                                            $('.partner_desc').text(data.desc);
                                                                                            $('input[name="partner_id"]').val(id);
                                                                                            if (data.image != '') {
                                                                                                $('.image_edit').css('display', 'block');
                                                                                                var src = base_url + 'assets/image/pitch/' + data.image;
                                                                                                $('input[name="edit_partner_img"]').val(data.image);
                                                                                                $('.partner_image').attr('src', src);
                                                                                            }
                                                                                            $('input[name="type"]').val('edit');
                                                                                            $('#partner').modal('show');
                                                                                        }
                                                                                    }
                                                                                });
                                                                            }
                                                                            function partner_delete(id) {
                                                                                var company_id = '<?php echo $company_id; ?>';
                                                                                var url = base_url + 'pitch/delete_partnerdetail/' + id;
                                                                                $.ajax({
                                                                                    url: url,
                                                                                    data: 'id=' + id + '&company_id=' + company_id,
                                                                                    type: 'post',
                                                                                    dataType: 'json',
                                                                                    success: function (data) {
                                                                                        if (data.flag == 1) {
                                                                                            if (jQuery.isEmptyObject(data.data)) {
                                                                                                $('table#partner_table tbody').empty();
                                                                                                var html = '<tr><td id="ext-gen1019" class=" text-center" valign="top" colspan="5">No Team Members found!!</td></tr>';
                                                                                                $('table#partner_table tbody').append(html);
                                                                                            } else {
                                                                                                $('.partner_' + id).remove();
                                                                                                return false;
                                                                                            }
                                                                                        } else {
                                                                                            alert("oops!! Something wrong");
                                                                                        }
                                                                                    }
                                                                                });
                                                                                return false;
                                                                            }
                                                                            $('.complete').click(function () {
                                                                                var headline = $('.head_desc').val();
                                                                                var problem = $('.prob_desc').val();
                                                                                var solution = $('.sol_desc').val();
                                                                                var target = $('.tar_desc').val();
                                                                                var sales = $('.sal_desc').val();
                                                                                var marketing = $('.mar_desc').val();
                                                                                var comp_id = $('.company_rand').val();
                                                                                var comp_id = $('.company_rand').val();
                                                                                var fund = $('input[name="funds"]').val();
                                                                                var description = $('.fund_desc').val();
                                                                                var url = base_url + 'pitch/update_pitch';
                                                                                $.ajax({
                                                                                    url: url,
                                                                                    type: 'POST',
                                                                                    data: 'headline=' + encodeURIComponent(headline) + '&problem=' + encodeURIComponent(problem) + '&solution=' + encodeURIComponent(solution) + '&target=' + encodeURIComponent(target) + '&sales=' + encodeURIComponent(sales) + '&marketing=' + encodeURIComponent(marketing) + '&fund=' + encodeURIComponent(fund) + '&description=' + encodeURIComponent(description),
                                                                                    dataType: 'JSON',
                                                                                    contentType: 'application/x-www-form-urlencoded',
                                                                                    success: function (data) {
                                                                                        if (data.flag == 1) {
                                                                                            var url = base_url + 'pitch/view/' + parameter;
                                                                                            window.location.href = url;
                                                                                        }
                                                                                    }
                                                                                });
                                                                            });

                                                                            //milestone edit jquery

                                                                            function milestone_edit(ele, id) {
                                                                                var company_id = '<?php echo $company_id; ?>';
                                                                                var url = base_url + 'pitch/get_milestones';
                                                                                $.ajax({
                                                                                    data: 'id=' + id + '&company_id=' + company_id,
                                                                                    url: url,
                                                                                    type: 'post',
                                                                                    dataType: 'json',
                                                                                    async: false,
                                                                                    success: function (data) {
                                                                                        if (data.flag == '1') {
                                                                                            $('input[name="name"]').val(data.name);
                                                                                            $('input[name="date"]').val(data.date);
                                                                                            $('.mil_desc').val(data.desc);
                                                                                            $('input[name="type"]').val('edit');
                                                                                            $('input[name="milestone_id"]').val(id);
                                                                                            $('#milestone').modal('show');
                                                                                        }
                                                                                    }
                                                                                });

                                                                            }

//milestone delete jquery



//    $(document).on('click', '.complete', function () {



                                                                            function bodyfadein() {
                                                                                $('body').prepend('<div class="popup_back" style="text-align: center;"><img src="' + base_url + 'assets/image/loader.gif" style="position: relative;top:40%;"/></div>');
                                                                            }

                                                                            function bodyfadeout() {
                                                                                $('.popup_back').fadeOut(function () {
                                                                                    $(this).remove();
                                                                                });
                                                                            }

</script>

