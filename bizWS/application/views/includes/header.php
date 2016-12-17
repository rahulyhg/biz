<?php
$cls = 'active';
$cls1 = '';
if (key_exists('view', $_GET)) {
    $cls = '';
    $cls1 = 'active';
}
?>
<div class="top-header fixed-top">
    <div class="container-fluid">
        <div class="top-header-logo col-md-6 col-xs-6">
            <a class=" main-logo" href="<?php echo base_url() ?>dashboard"><img style="width:35%"  src="<?php echo base_url(); ?>assets/image/logo_pitch.png"></a>
        </div>
        <?php $this->load->view('common/header_section'); ?>
    </div>
</div>
<div id="menu-container" class="full-width ">
    <ul class="nav nav-tabs menu-tabs">
        <li class="<?php echo ($menu_type == 'dashboard') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>dashboard">My Company</a></li>
        <li class="<?php echo ($menu_type == 'pitch') ? 'active' : ''; ?>"><a  href="<?php echo base_url(); ?>pitch/company/<?php echo $companyid; ?>">Pitch</a></li>
        <li class="<?php echo ($menu_type == 'plan') ? 'active' : ''; ?>"><a  href="<?php echo base_url(); ?>plan/company/<?php echo $companyid; ?>">Plan</a></li>
        <li class="<?php echo ($menu_type == 'forecast') ? 'active' : ''; ?>"><a  href="<?php echo base_url(); ?>forecast/setupcost/<?php echo $companyid; ?>">Forecast</a></li>
        <li class="active coming_soon"><small class="coming_soon_box" style="color:#fff;"><span class="coming_soon_text">Coming Soon</span></small><a class="planing_pitch">Ration analysis</a></li>
        <li class="active coming_soon"><small class="coming_soon_box" style="color:#fff;"><span class="coming_soon_text">Coming Soon</span></small><a  class="planing_pitch">Competitor analysis</a></li>
    </ul>
    <div class="tab-content menu-content">
        <div id="home" class="tab-pane fade <?php echo ($menu_type == 'pitch') ? 'in active' : ''; ?>">
            <ul class="sub-menu">
                <li class="<?php echo ($sub_menu == 'add') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>pitch/company/<?php echo $companyid; ?>"> Create</a></li>
                <li class="<?php echo ($sub_menu == 'view') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>pitch/view/<?php echo $companyid; ?>">View</a></li>
                <li class="<?php echo ($sub_menu == 'publish') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>pitch/publish/<?php echo $companyid; ?>">Publish</a></li>
                <li class="<?php echo ($sub_menu == 'present') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>pitch/download/<?php echo $companyid; ?>">Download</a></li>
            </ul>
        </div>
        <div id="menu1" class="tab-pane fade <?php echo ($menu_type == 'plan') ? 'in active' : ''; ?>">
            <ul class="sub-menu">
                <li class="<?php echo ($sub_menu == 'add') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>plan/company/<?php echo $companyid; ?>"> Create</a></li>
                <li class="<?php echo ($sub_menu == 'cover') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>plan/cover_page/<?php echo $companyid; ?>">Cover Page</a></li>
                <li class="<?php echo ($sub_menu == 'preview') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>plan/preview/<?php echo $companyid; ?>">Preview Cover Page</a></li>
                <li class="<?php echo ($sub_menu == 'download') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>plan/download/<?php echo $companyid; ?>">Download</a></li>
            </ul>
        </div>
        <div id="menu2" class="tab-pane fade <?php echo ($menu_type == 'forecast') ? 'in active' : ''; ?>">
            <ul class="sub-menu">
                <li class="<?php echo $cls; ?>"><a href="<?php echo base_url() . $addLink ?>">&nbsp; &nbsp; &nbsp;Create&nbsp; &nbsp; &nbsp;</a></li>
                <li class="<?php echo $cls1; ?>"><a href="<?php echo base_url() . $addLink ?>?view">&nbsp; &nbsp; &nbsp;View &nbsp; &nbsp; &nbsp;</a></li>
                <!-- <li ><a href="#">Forecast 3</a></li>
                <li><a href="#">Forecast 4</a></li> -->
            </ul>
        </div>
    </div>
</div>