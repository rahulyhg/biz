<?php $viewlink = (key_exists('view', $_GET)) ? '?view' : ''; ?>
<div class="col-sm-3 col-md-2 col-xs-3">
    <div class="panel-group forecast-left-panel" id="accordion">

        <div class="panel panel-default">
            <div class="panel-heading panel-left <?php echo ($sub_menu == 'setupcost') ? 'active' : ''; ?>">
                <h4 class="panel-title">
                    <a href="<?php echo base_url(); ?>forecast/setupcost/<?php echo $companyid ?><?php echo $viewlink;?>" ><i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;<span class="fore-left-menu" >Setup Cost</span></a>
                </h4>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading panel-left <?php echo ($sub_menu == 'statement') ? 'active' : ''; ?>">
                <h4 class="panel-title">
                    <a href="<?php echo base_url(); ?>forecast/statement/<?php echo $companyid ?><?php echo $viewlink;?>" ><i class="fa fa-money" aria-hidden="true"></i> &nbsp; <span class="fore-left-menu" >Income / Profit & Loss Forecast</span></a>
                </h4>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading panel-left <?php echo ($sub_menu == 'cashflow') ? 'active' : ''; ?>">
                <h4 class="panel-title">
                    <a href="<?php echo base_url(); ?>forecast/cashflow/<?php echo $companyid ?><?php echo $viewlink;?>" ><i class="fa fa-industry" aria-hidden="true"></i> &nbsp; <span class="fore-left-menu" >Cash Flow Forecast</span></a>
                </h4>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading panel-left <?php echo ($sub_menu == 'balancesheet') ? 'active' : ''; ?>">
                <h4 class="panel-title">
                    <a href="<?php echo base_url(); ?>forecast/balancesheet/<?php echo $companyid ?><?php echo $viewlink;?>" ><i class="fa fa-clipboard" aria-hidden="true"></i> &nbsp; <span class="fore-left-menu" >Balance Sheet Forecast</span></a>
                </h4>
            </div>
        </div>
    </div>
</div>