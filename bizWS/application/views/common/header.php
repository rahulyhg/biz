<!-- Navigation -->
<div class="top-header fixed-top">
    <div class="container-fluid">


        <div class="top-header-logo col-md-6 col-xs-6">

            <a class=" main-logo" href="<?php echo base_url() ?>dashboard"><img style="width:35%" src="<?php echo base_url(); ?>assets/image/logo_pitch.png"></a>
        </div>
        <?php $this->load->view('common/header_section'); ?>

    </div>


</div>

<div id="menu-container" class="full-width ">
    <ul class="nav nav-tabs menu-tabs">
        <li class="<?php echo ($menu_type == 'dashboard') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>dashboard">My Company</a></li>
        <li class="<?php echo ($menu_type == 'pitch') ? 'active' : ''; ?>"><a  href="<?php echo base_url(); ?>pitch/company/<?php echo $company_id; ?>">Pitch</a></li>
        <li class="<?php echo ($menu_type == 'plan') ? 'active' : ''; ?>"><a  href="<?php echo base_url(); ?>plan/company/<?php echo $this->uri->segment(3); ?>">Plan</a></li>
        <li class="<?php echo ($menu_type == 'forecast') ? 'active' : ''; ?>"><a  href="<?php echo base_url(); ?>forecast/setupcost/<?php echo $company_id; ?>">Forecast</a></li>
        <li class="active coming_soon"><small class="coming_soon_box" style="color:#fff;"><span class="coming_soon_text">Coming Soon</span></small><a href="#" class="planing_pitch">Ratio analysis</a></li>
        <li class="active coming_soon"><small class="coming_soon_box" style="color:#fff;"><span class="coming_soon_text">Coming Soon</span></small><a href="#" class="planing_pitch">Competitor analysis</a></li>
    </ul>
    <div class="tab-content menu-content">
        <div id="home" class="tab-pane fade <?php echo ($menu_type == 'pitch') ? 'in active' : ''; ?>">
            <ul class="sub-menu">
                <li class="<?php echo ($sub_menu == 'add') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>pitch/company/<?php echo $this->uri->segment(3); ?>"> Create</a></li>
                <li class="<?php echo ($sub_menu == 'view') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>pitch/view/<?php echo $this->uri->segment(3); ?>">View</a></li>
                <li class="<?php echo ($sub_menu == 'publish') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>pitch/publish/<?php echo $this->uri->segment(3); ?>">Publish</a></li>
                <li class="<?php echo ($sub_menu == 'present') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>pitch/download/<?php echo $this->uri->segment(3); ?>">Download</a></li>
            </ul>
        </div>
        <div id="menu1" class="tab-pane fade <?php echo ($menu_type == 'plan') ? 'in active' : ''; ?>">
            <ul class="sub-menu">
                <li class="<?php echo ($sub_menu == 'add') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>plan/company/<?php echo $this->uri->segment(3); ?>"> Create</a></li>
                <li class="<?php echo ($sub_menu == 'cover') ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>plan/cover_page/<?php echo $this->uri->segment(3); ?>">Cover Page</a></li>
                <li class="<?php echo ($sub_menu == 'preview') ? 'active' : ''; ?>"><a href='<?php echo base_url(); ?>plan/preview/<?php echo $this->uri->segment(3); ?>'>Preview Cover Page</a></li>
                <li class="<?php echo ($sub_menu == 'download') ? 'active' : ''; ?>"><a href='<?php echo base_url(); ?>plan/download/<?php echo $this->uri->segment(3); ?>'>Download</a></li>
            </ul>
        </div>
        <div id="menu2" class="tab-pane fade <?php echo ($menu_type == 'forecast') ? 'in active' : ''; ?>">
            <ul class="sub-menu">
                <li><a href="<?php echo base_url(); ?>forecast/balancesheet/<?php echo $this->uri->segment(3); ?>"> Create</a></li>
                <li><a href="#">View</a></li>
            </ul>
        </div>

    </div>
</div>