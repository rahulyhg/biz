
<div class="popup_model">
    <div class="popup_header text-center">
        <strong class="popup_title">Where do you want to start?</strong>
    </div>
    <?php echo $company_id = $this->session->userdata('company_id'); ?>
    <div class="popup_wrapper">
        <div class="pitch_circle"><a href="<?= site_url() ?>/pitch/<?= $company_id;?>" class="pitch_redirect"><div class="circle pitch"><strong class="pitch_text">Go to Pitch</strong></div></a></div>
        <div class="pitch_circle"><a href="" class="plan_redirect"><div class="circle plan"><strong class="pitch_text">Go to Plan</strong></div></a></div> 
    </div>
</div>