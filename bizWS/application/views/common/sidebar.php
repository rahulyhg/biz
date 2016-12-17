<?php
$menu_title = $this->uri->segment(2);
?>

<div id="dashleft">
    <ul>
        <li><a href="<?php echo site_url() ?>/pitch/company/<?php echo $company_id; ?>"  class="<?php echo ($menu_title == 'company') ? 'active' : ''; ?>" > Company</a></li>
        <li><a href="<?php echo site_url() ?>/pitch/headline/<?php echo $company_id; ?>" class="<?php echo ($menu_title == 'headline') ? 'active' : ''; ?>"> Headline</a></li>
        <li><a href="<?php echo site_url() ?>/pitch/problem/<?php echo $company_id; ?>" class="<?php echo ($menu_title == 'problem') ? 'active' : ''; ?>"> Problem</a></li>
        <li><a href="<?php echo site_url() ?>/pitch/solution/<?php echo $company_id; ?>" class="<?php echo ($menu_title == 'solution') ? 'active' : ''; ?>"> Our Solution</a></li>
        <li><a href="<?php echo site_url() ?>/pitch/target/<?php echo $company_id; ?>" class="<?php echo ($menu_title == 'target') ? 'active' : ''; ?>"> Target market</a></li>
        <li><a href="<?php echo site_url() ?>/pitch/competitor/<?php echo $company_id; ?>"  class="<?php echo ($menu_title == 'competitor') ? 'active' : ''; ?>"> Competitor</a></li>
        <li><a href="<?php echo site_url() ?>/pitch/funds/<?php echo $company_id; ?>" class="<?php echo ($menu_title == 'funds') ? 'active' : ''; ?>"> Funding</a></li>
        <li><a href="<?php echo site_url() ?>/pitch/sales/<?php echo $company_id; ?>" class="<?php echo ($menu_title == 'sales') ? 'active' : ''; ?>"> Sales</a></li>
        <li><a href="<?php echo site_url() ?>/pitch/milestones/<?php echo $company_id; ?>" class="<?php echo ($menu_title == 'milestones') ? 'active' : ''; ?>"> Milestones</a></li>
        <li><a href="<?php echo site_url() ?>/pitch/forecast/<?php echo $company_id; ?>" class="<?php echo ($menu_title == 'forecast') ? 'active' : ''; ?>"> Forecast</a></li>
        <li><a href="<?php echo site_url() ?>/pitch/team/<?php echo $company_id; ?>" class="<?php echo ($menu_title == 'team') ? 'active' : ''; ?>"> Team</a></li>
        <li><a href="<?php echo site_url() ?>/pitch/partner/<?php echo $company_id; ?>" class="<?php echo ($menu_title == 'partner') ? 'active' : ''; ?>"> Partners</a></li>

    </ul>
</div>