<div class="col-sm-3 col-md-2 col-xs-3 plan-left-panel">
    <div class="panel-group" id="accordion">

        <?php
        $cid = $this->uri->segment(3);
        foreach ($plan_menu as $row) {
            ?>
            <div class="panel panel-default">
                <div class="panel-heading panel-left">
                    <h4 class="panel-title panel_category" data-id="<?php echo $row->id; ?>" onclick="plan_menu(<?php echo $row->id; ?>, '<?php echo $row->name; ?>', '<?php echo $cid; ?>')">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row->id; ?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> &nbsp; <?php echo $row->name; ?></a>
                    </h4>
                </div>
                <div id="collapse<?php echo $row->id; ?>" class="panel-collapse collapse">
                    <div class="panel-body">
                        <table class="table plan-acc " id="plan-<?php echo $row->id; ?>">

                        </table>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</div>