<div class="popup_cont" style="opacity: 1; top: 68.5px; left: 446.5px;">
    <div class="popup">
        <div class="popup_content">
            <div style="width:300px; min-height:150px;" class="abc">
                <h4 style="border-bottom:1px solid #999; padding-bottom:5px;" class="text-center">
                    <b>Are you sure want do that?</b>
                </h4>
                <p>You have successfully completed the forecast.Now would you like to visit Pitch or Plan ? Click to Confirm</p>
            </div> 
            <div style="margin-bottom:30px;" class="btn_sec">
                <a href="<?php echo base_url(); ?>pitch/company/<?php echo $this->uri->segment(3); ?>" class="btn btn-warning btn-sm pull-left">
                    <i class="fa fa-check-square"></i> Move to Pitch
                </a>
                <a href="<?php echo base_url(); ?>plan/company/<?php echo $this->uri->segment(3); ?>" class="btn btn-danger btn-sm pull-right">
                    <i class="fa fa-times-circle"></i> Move to Plan
                </a>
            </div>
        </div>
    </div>
    <div class="popup_close">×</div>
</div>