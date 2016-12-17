<div class="row" style="min-height: 400px;">
    <h3>
        <?php echo $chapter; ?>
        <span class="pull-right btn btn-warning btn-sm" style="font-size: 14px; color:#fff;">
            <a class="table_edit1" href="<?php echo base_url() . 'Plan/addmore/' . $companyid . '/' . $menuid; ?>"><em class="fa fa-plus"></em> Add More </a>
        </span>
    </h3>
    <?php foreach ($links as $link) { ?>
        <div class="plan_content ribbon-container" style="width:100%;">
            <div class="notice notice-success">
                <b> 
                    <span id="innerTitleDiv<?php echo $link->menuid; ?>"><?php echo $link->title; ?></span>
                    <span id="innerTitleForm<?php echo $link->menuid; ?>" style="display:none;">
                        <form method="post" style="width:50%;display:inline;">
                            <input class="form-control input-xs " style="width:200px; display: inline;" name="innerTitle<?php echo $link->menuid; ?>" value="<?php echo $link->title; ?>" type="text" id="textfield" aria-describedby="emailHelp" placeholder="Enter Your Text" required="">
                            <input name="innerMenuid<?php echo $link->menuid; ?>" type="hidden" value="<?php echo $link->menuid; ?>"/>
                            <button class="btn updateInnerTitle" data-id="<?php echo $link->menuid; ?>" style="color: #2ea194;padding: 0;background: transparent;" title="Update"><i class="fa fa-refresh"></i></button>

                        </form>
                    </span>
                    <span>
                        <button class="btn editInnerTitle" data-id="<?php echo $link->menuid; ?>" style="color: #2ea194;padding: 0;background: transparent;" title="Edit"><i class="fa fa-edit"></i></button>
                    </span>
                </b>
            </div>
            <?php echo $link->content; ?>
            <?php if ($link->permission) { ?>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Statements</h3>
                    </div>
                    <div class="summary<?php echo $link->menuid; ?>" style="padding: 20px; line-height: 20px;">
                        <?php echo nl2br($link->summary); ?>
                    </div>
                    <div class="popsummary<?php echo $link->menuid; ?>" style="display:none;">
                        <?php echo $link->summary; ?>
                    </div>
                    <a class="popupOn" href="#" data-title="<?php echo $link->title; ?>" data-summary="<?php echo $link->menuid; ?>"> <span class="ribbon" style="font-family: Sans-Serif;"><i class="fa fa-database fa-fw"></i> Hey, You can edit Here</span></a>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>

<style type="text/css">
    .no-content {
        background: #efeded none repeat scroll 0 0;
        height: 50px;
        margin-top: 50px;
        margin-left:15%;
        width: 65%;
        padding-top: 2%;
        border-radius: 6px;
    }
    .nicEdit-main  {
        height: 390px !important;
    }
</style>

<div class="col-md-12 col-xs-12 col-sm-12" style="margin: 30px 0px;">
    <div class="col-md-6 col-xs-6 col-sm-6 text-left">
        <?php if (!empty($previous)) { ?>
            <a href="<?php echo base_url() ?>plan/subcategory/<?php echo $companyid; ?>/<?php echo $previous; ?>"><button class="btn btn-warning" type="button">Previous</button></a>
        <?php } ?>
    </div>
    <div class="col-md-6 col-xs-6 col-sm-6 text-right">
        <?php if (!empty($next)) { ?>
            <a href="<?php echo base_url() ?>plan/subcategory/<?php echo $companyid; ?>/<?php echo $next; ?>"><button class="btn btn-warning" type="button">Next</button></a>
        <?php } ?>
    </div>
</div>