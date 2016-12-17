<div class="col-sm-3 col-md-2 col-xs-3 plan-left-panel">
    <div class="panel-group" id="accordion">
        <?php
        if (isset($menu[0])) {
            foreach ($menu[0] as $key => $title) {
                $collapse = ($key == $menuParent) ? 'in' : '';
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading panel-left">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key; ?>" ><?php echo $title; ?></a>
                        </h4>
                    </div>
                    <div id="collapse<?php echo $key; ?>" class="panel-collapse collapse <?php echo $collapse; ?>">
                        <div class="panel-body">
                            <table class="table plan-acc">
                                <?php
                                if (isset($menu[$key])) {
                                    foreach ($menu[$key] as $sKey => $sTitle) {
                                        ?>
                                        <tr>
                                            <td>
                                                <a <?php echo ($this->uri->segment(4) == $sKey) ? 'class="active"' : ''; ?>href="<?php echo base_url() . 'Plan/subcategory/' . $companyid . '/' . $sKey; ?>"><?php echo $sTitle; ?></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo base_url() . 'Plan/addmore/' . $companyid . '/' . $key; ?>">Add More...</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
        <!--        <div class="panel panel-default">
                    <div class="panel-heading panel-left">
                        <h4 class="panel-title">
                            <a href="<?php echo base_url() . 'Plan/addmore/'; ?>" >Add More...</a>
                        </h4>
                    </div>
                </div>-->
    </div>
</div>