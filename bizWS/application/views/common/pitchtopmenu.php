<?php 
echo $company_id = $this->uri->segment(3);
?>
<nav class="navbar navbar-default" style="background: #354052">
    <div class="container-fluid">
        <ul class="nav navbar-nav " id="menues">

            <?php $subs_type = $this->session->userdata('subs_type'); ?>
            <li><a href="#" >DASHBOARD</a></li>
            <li class="active" ><a href="#" >PITCH</a></li>
            <?php if ($subs_type != '1') { ?>
                <li><a href="#">PLAN</a></li>
                <li><a href="#">FORECAST</a></li>
                <li><a href="#">PLANNING</a></li>
            <?php } ?>
        </ul>
    </div>
</nav>
<!--<div class="row">-->
<div class="container-fluid" id="sub_menu">
    <ul>
        <li class="<?php echo ($menu == 'add_pitch') ? 'active' : ''; ?>"><a href="<?= site_url(); ?>/pitch/company/<?= $company_id ?>" >ADD</a></li>
        <li class="<?php echo ($menu == 'view_pitch') ? 'active' : ''; ?>"><a href="<?= site_url(); ?>/pitch/view/<?= $company_id ?>">VIEW</a></li>
        <li class="<?php echo ($menu == 'publish') ? 'active' : ''; ?>"><a href="<?= site_url(); ?>/pitch/share/<?= $company_id ?>">PUBLISH</a></li>
        <li class="<?php echo ($menu == 'presentation') ? 'active' : ''; ?>"><a href="#">PRESENTATION</a></li>
    </ul>
</div>