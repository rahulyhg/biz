<div class="col-md-12" style="margin: 2% 0;">
    <div class="pull-right nxt_btn">
        <button class="btn btn-warning setupNext">Submit</button>
<!--        <a href="<?php echo base_url() ?>forecast/statement/<?php echo $companyid; ?>"><button class="btn btn-warning ">Next</button></a>-->
    </div>
</div>
<div class="balance_sheet">
    <h3><b></b></h3> 
    <!--SETUP COST-->
    <div class="col-md-12 ">
        <div class="panel panel-default panel-table">
            <div class="panel-heading">
                <div class="row">
                    <div class="col col-xs-6">
                        <h3 class="panel-title"><b>Setting up the business:</b></h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                    <thead>
                        <tr class="text-center">
                            <th>Name</th>
                            <th class="col-sm-2 text-center">Price</th>
                            <th class="col-sm-2 text-center"><em class="fa fa-cog"></em></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $bTotPrice = 0;
                        foreach ($businessSetup as $business) {
                            $minCls = ($business['sign']) ? 'minusInp' : '';

                            $readonly = '';
                            $style = '';
                            if (key_exists($business['name'], $fBS)) {
                                $readonly = 'readonly="readonly"';
                                $style = 'style="display:none !important;"';
                            }
                            ?>
                            <tr class="text-center businessSetup">
                                <td align="center" class="col-sm-2">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="businessSetupName[]" value="<?php echo $business['name']; ?>" class="form-control <?php echo $minCls; ?>" placeholder="Name" <?php echo $readonly; ?>/>
                                    </div>
                                    <div class="text-center trNameTag" >
                                        <?php echo $business['name']; ?>
                                    </div>
                                </td>
                                <td align="center" class="col-sm-2" >
                                    <div class="form-group" style="width:70%; margin-top:5%;">
                                        <input type="text" name="businessSetupPrice[]" value="<?php echo number_format($business['price'], 2, '.', ''); ?>" class="form-control onlyNumbers setupPrice <?php echo $minCls; ?>" data-setup="business" placeholder="Amount">
                                    </div>
                                </td>
                                <td class="col-sm-2" align="center">
                                    <a href="javascript:void(0);" class="table_edit trSignChange" data-setup="business" <?php echo $style; ?>><em class="fa fa-<?php echo $signArr[$business['sign']] ?>"></em></a>
                                    <a href="javascript:void(0);" class="table_edit trEditMore" <?php echo $style; ?>><em class="fa fa-pencil"></em></a>
                                    <!--  data-toggle="modal" data-target="#EditModal"  -->
                                    <a href="javascript:void(0);" class="table_delet trDelete" data-setup="business" <?php echo $style; ?>><em class="fa fa-trash"></em></a>
                                </td>
                            </tr>
                            <?php
                            if ($business['sign']) {
                                $bTotPrice -= $business['price'];
                            } else {
                                $bTotPrice += $business['price'];
                            }
                        }
                        ?>
                        <tr class="text-center businessSetupAddMore">
                            <td class="text-center col-sm-2">
                                <a class="table_edit setupAddMoreLink" data-setup="business" href="javascript:void(0);"><em class="fa fa-plus-circle">&nbsp;<b>Add More</b></em></a>
                            </td>
                            <td class="col-sm-2" ></td>
                            <td class="col-sm-2"></td>
                        </tr>
                        <tr class="text-center warning">
                            <td class="text-center col-sm-2"><b>Total Setting up the business</b></td>
                            <td align="center" class="col-sm-2" >
                                <div class="form-group" style="width:70%; margin-top:5%;">
                                    <input type="text" class="form-control businessSetupTotalPrice" value="<?php echo number_format($bTotPrice, 2, '.', ''); ?>" disabled="true">
                                </div>
                            </td>
                            <td class="col-sm-2" align="center">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel panel-default panel-table">
            <div class="panel-heading">
                <div class="row">
                    <div class="col col-xs-6">
                        <h3 class="panel-title"><b>Setting up the premises:</b></h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                    <thead>
                        <tr class="text-center">
                            <th>Name</th>
                            <th class="col-sm-2 text-center">Price</th>
                            <th class="col-sm-2 text-center"><em class="fa fa-cog"></em></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $pTotPrice = 0;
                        foreach ($premisesSetup as $premises) {
                            $minCls = ($premises['sign']) ? 'minusInp' : '';

                            $readonly = '';
                            $style = '';
                            if (key_exists($premises['name'], $fPS)) {
                                $readonly = 'readonly="readonly"';
                                $style = 'style="display:none !important;"';
                            }
                            ?>
                            <tr class="text-center premisesSetup">
                                <td align="center" class="col-sm-2">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="premisesSetupName[]" value="<?php echo $premises['name']; ?>" class="form-control <?php echo $minCls; ?>" placeholder="Name" <?php echo $readonly; ?>/>
                                    </div>
                                    <div class="text-center trNameTag" >
                                        <?php echo $premises['name']; ?>
                                    </div>
                                </td>
                                <td align="center" class="col-sm-2" >
                                    <div class="form-group" style="width:70%; margin-top:5%;">
                                        <input type="text" name="premisesSetupPrice[]" value="<?php echo number_format($premises['price'], 2, '.', ''); ?>" class="form-control onlyNumbers setupPrice <?php echo $minCls; ?>" data-setup="premises" placeholder="Amount">
                                    </div>
                                </td>
                                <td class="col-sm-2" align="center">
                                    <a href="javascript:void(0);" class="table_edit trSignChange" data-setup="premises" <?php echo $style; ?>><em class="fa fa-<?php echo $signArr[$premises['sign']] ?>"></em></a>
                                    <a href="javascript:void(0);" class="table_edit trEditMore" <?php echo $style; ?>><em class="fa fa-pencil"></em></a>
                                    <!--  data-toggle="modal" data-target="#EditModal"  -->
                                    <a href="javascript:void(0);" class="table_delet trDelete" data-setup="premises" <?php echo $style; ?>><em class="fa fa-trash"></em></a>
                                </td>
                            </tr>
                            <?php
                            if ($premises['sign']) {
                                $pTotPrice -= $premises['price'];
                            } else {
                                $pTotPrice += $premises['price'];
                            }
                        }
                        ?>
                        <tr class="text-center premisesSetupAddMore">
                            <td class="text-center col-sm-2">
                                <a class="table_edit setupAddMoreLink" data-setup="premises" href="javascript:void(0);"><em class="fa fa-plus-circle">&nbsp;<b>Add More</b></em></a>
                            </td>
                            <td class="col-sm-2" ></td>
                            <td class="col-sm-2"></td>
                        </tr>
                        <tr class="text-center warning">
                            <td class="text-center col-sm-2"><b>Total Setting up the premises</b></td>
                            <td align="center" class="col-sm-2" >
                                <div class="form-group" style="width:70%; margin-top:5%;">
                                    <input type="text" class="form-control premisesSetupTotalPrice" value="<?php echo number_format($pTotPrice, 2, '.', ''); ?>" disabled="true">
                                </div>
                            </td>
                            <td class="col-sm-2" align="center">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel panel-default panel-table">
            <div class="panel-heading">
                <div class="row">
                    <div class="col col-xs-6">
                        <h3 class="panel-title"><b>Plant and Equipment:</b></h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                    <thead>
                        <tr class="text-center">
                            <th>Name</th>
                            <th class="col-sm-2 text-center">Price</th>
                            <th class="col-sm-2 text-center"><em class="fa fa-cog"></em></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $eTotPrice = 0;
                        foreach ($equipmentSetup as $equipment) {
                            $minCls = ($equipment['sign']) ? 'minusInp' : '';

                            $readonly = '';
                            $style = '';
                            if (key_exists($equipment['name'], $fES)) {
                                $readonly = 'readonly="readonly"';
                                $style = 'style="display:none !important;"';
                            }
                            ?>
                            <tr class="text-center equipmentSetup">
                                <td align="center" class="col-sm-2">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="equipmentSetupName[]" value="<?php echo $equipment['name']; ?>" class="form-control <?php echo $minCls; ?>" placeholder="Name" <?php echo $readonly; ?>/>
                                    </div>
                                    <div class="text-center trNameTag" >
                                        <?php echo $equipment['name']; ?>
                                    </div>
                                </td>
                                <td align="center" class="col-sm-2" >
                                    <div class="form-group" style="width:70%; margin-top:5%;">
                                        <input type="text" name="equipmentSetupPrice[]" value="<?php echo number_format($equipment['price'], 2, '.', ''); ?>" class="form-control onlyNumbers setupPrice <?php echo $minCls; ?>" data-setup="equipment" placeholder="Amount">
                                    </div>
                                </td>
                                <td class="col-sm-2" align="center">
                                    <a href="javascript:void(0);" class="table_edit trSignChange" data-setup="equipment" <?php echo $style; ?>><em class="fa fa-<?php echo $signArr[$equipment['sign']] ?>"></em></a>
                                    <a href="javascript:void(0);" class="table_edit trEditMore" <?php echo $style; ?>><em class="fa fa-pencil"></em></a>
                                    <!--  data-toggle="modal" data-target="#EditModal"  -->
                                    <a href="javascript:void(0);" class="table_delet trDelete" data-setup="equipment" <?php echo $style; ?>><em class="fa fa-trash"></em></a>
                                </td>
                            </tr>
                            <?php
                            if ($equipment['sign']) {
                                $eTotPrice -= $equipment['price'];
                            } else {
                                $eTotPrice += $equipment['price'];
                            }
                        }
                        ?>
                        <tr class="text-center equipmentSetupAddMore">
                            <td class="text-center col-sm-2">
                                <a class="table_edit setupAddMoreLink" data-setup="equipment" href="javascript:void(0);"><em class="fa fa-plus-circle">&nbsp;<b>Add More</b></em></a>
                            </td>
                            <td class="col-sm-2" ></td>
                            <td class="col-sm-2"></td>
                        </tr>
                        <tr class="text-center warning">
                            <td class="text-center col-sm-2"><b>Total Plant and Equipment</b></td>
                            <td align="center" class="col-sm-2" >
                                <div class="form-group" style="width:70%; margin-top:5%;">
                                    <input type="text" class="form-control equipmentSetupTotalPrice" value="<?php echo number_format($eTotPrice, 2, '.', ''); ?>" disabled="true">
                                </div>
                            </td>
                            <td class="col-sm-2" align="center">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel panel-default panel-table">
            <div class="panel-heading">
                <div class="row">
                    <div class="col col-xs-6">
                        <h3 class="panel-title"><b>Starting operations:</b></h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                    <thead>
                        <tr class="text-center">
                            <th>Name</th>
                            <th class="col-sm-2 text-center">Price</th>
                            <th class="col-sm-2 text-center"><em class="fa fa-cog"></em></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $oTotPrice = 0;
                        foreach ($operationsSetup as $operations) {
                            $minCls = ($operations['sign']) ? 'minusInp' : '';

                            $readonly = '';
                            $style = '';
                            if (key_exists($operations['name'], $fOS)) {
                                $readonly = 'readonly="readonly"';
                                $style = 'style="display:none !important;"';
                            }
                            ?>
                            <tr class="text-center operationsSetup">
                                <td align="center" class="col-sm-2">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="operationsSetupName[]" value="<?php echo $operations['name']; ?>" class="form-control <?php echo $minCls; ?>" placeholder="Name" <?php echo $readonly; ?>/>
                                    </div>
                                    <div class="text-center trNameTag" >
                                        <?php echo $operations['name']; ?>
                                    </div>
                                </td>
                                <td align="center" class="col-sm-2" >
                                    <div class="form-group" style="width:70%; margin-top:5%;">
                                        <input type="text" name="operationsSetupPrice[]" value="<?php echo number_format($operations['price'], 2, '.', ''); ?>" class="form-control onlyNumbers setupPrice <?php echo $minCls; ?>" data-setup="operations" placeholder="Amount">
                                    </div>
                                </td>
                                <td class="col-sm-2" align="center">
                                    <a href="javascript:void(0);" class="table_edit trSignChange" data-setup="operations" <?php echo $style; ?>><em class="fa fa-<?php echo $signArr[$operations['sign']] ?>"></em></a>
                                    <a href="javascript:void(0);" class="table_edit trEditMore" <?php echo $style; ?>><em class="fa fa-pencil"></em></a>
                                    <!--  data-toggle="modal" data-target="#EditModal"  -->
                                    <a href="javascript:void(0);" class="table_delet trDelete" data-setup="operations" <?php echo $style; ?>><em class="fa fa-trash"></em></a>
                                </td>
                            </tr>
                            <?php
                            if ($operations['sign']) {
                                $oTotPrice -= $operations['price'];
                            } else {
                                $oTotPrice += $operations['price'];
                            }
                        }
                        ?>
                        <tr class="text-center operationsSetupAddMore">
                            <td class="text-center col-sm-2">
                                <a class="table_edit setupAddMoreLink" data-setup="operations" href="javascript:void(0);"><em class="fa fa-plus-circle">&nbsp;<b>Add More</b></em></a>
                            </td>
                            <td class="col-sm-2" ></td>
                            <td class="col-sm-2"></td>
                        </tr>
                        <tr class="text-center warning">
                            <td class="text-center col-sm-2"><b>Total Starting operations</b></td>
                            <td align="center" class="col-sm-2" >
                                <div class="form-group" style="width:70%; margin-top:5%;">
                                    <input type="text" class="form-control operationsSetupTotalPrice" value="<?php echo number_format($oTotPrice, 2, '.', ''); ?>" disabled="true">
                                </div>
                            </td>
                            <td class="col-sm-2" align="center">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel panel-default panel-table">
            <div class="panel-heading">
                <div class="row">
                    <div class="col col-xs-6">
                        <h3 class="panel-title"><b>Startup Capital:</b></h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                    <thead>
                        <tr class="text-center">
                            <th>Name</th>
                            <th class="col-sm-2 text-center">Price</th>
                            <th class="col-sm-2 text-center"><em class="fa fa-cog"></em></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cTotPrice = 0;
                        foreach ($capitalSetup as $capital) {
                            $minCls = ($capital['sign']) ? 'minusInp' : '';

                            $readonly = '';
                            $style = '';
                            if (key_exists($capital['name'], $fCS)) {
                                $readonly = 'readonly="readonly"';
                                $style = 'style="display:none !important;"';
                            }
                            ?>
                            <tr class="text-center capitalSetup">
                                <td align="center" class="col-sm-2">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="capitalSetupName[]" value="<?php echo $capital['name']; ?>" class="form-control <?php echo $minCls; ?>" placeholder="Name" <?php echo $readonly; ?>/>
                                    </div>
                                    <div class="text-center trNameTag" >
                                        <?php echo $capital['name']; ?>
                                    </div>
                                </td>
                                <td align="center" class="col-sm-2" >
                                    <div class="form-group" style="width:70%; margin-top:5%;">
                                        <input type="text" name="capitalSetupPrice[]" value="<?php echo number_format($capital['price'], 2, '.', ''); ?>" class="form-control onlyNumbers setupPrice <?php echo $minCls; ?>" data-setup="capital" placeholder="Amount">
                                    </div>
                                </td>
                                <td class="col-sm-2" align="center">
                                    <a href="javascript:void(0);" class="table_edit trSignChange" data-setup="capital" <?php echo $style; ?>><em class="fa fa-<?php echo $signArr[$capital['sign']] ?>"></em></a>
                                    <a href="javascript:void(0);" class="table_edit trEditMore" <?php echo $style; ?>><em class="fa fa-pencil"></em></a>
                                    <!--  data-toggle="modal" data-target="#EditModal"  -->
                                    <a href="javascript:void(0);" class="table_delet trDelete" data-setup="capital" <?php echo $style; ?>><em class="fa fa-trash"></em></a>
                                </td>
                            </tr>
                            <?php
                            if ($capital['sign']) {
                                $cTotPrice -= $capital['price'];
                            } else {
                                $cTotPrice += $capital['price'];
                            }
                        }
                        ?>
                        <tr class="text-center capitalSetupAddMore">
                            <td class="text-center col-sm-2">
                                <a class="table_edit setupAddMoreLink" data-setup="capital" href="javascript:void(0);"><em class="fa fa-plus-circle">&nbsp;<b>Add More</b></em></a>
                            </td>
                            <td class="col-sm-2" ></td>
                            <td class="col-sm-2"></td>
                        </tr>
                        <tr class="text-center warning">
                            <td class="text-center col-sm-2"><b>Total Startup Capital</b></td>
                            <td align="center" class="col-sm-2" >
                                <div class="form-group" style="width:70%; margin-top:5%;">
                                    <input type="text" class="form-control capitalSetupTotalPrice" value="<?php echo number_format($cTotPrice, 2, '.', ''); ?>" disabled="true">
                                </div>
                            </td>
                            <td class="col-sm-2" align="center">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel panel-default panel-table">
            <?php
            $TotPrice = $bTotPrice + $pTotPrice + $eTotPrice + $oTotPrice;
            ?>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                    <tbody>
                        <tr class="text-center danger">
                            <td class="text-center col-sm-2"><h4><b>Total Setup costs</b></h4></td>
                            <td class="col-sm-2"><h4><b class="grantSetupTotalPrice"><?php echo number_format($TotPrice, 2, '.', ''); ?></b></h4></td>
                            <td class="col-sm-2" align="center"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel panel-default panel-table">
            <?php
            $STotPrice = $cTotPrice - $TotPrice;
            $STotPrice = ($STotPrice >= 0) ? $STotPrice : 0;
            ?>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                    <tbody>
                        <tr class="text-center danger">
                            <td class="text-center col-sm-2"><h4><b>Surplus funds</b></h4></td>
                            <td class="col-sm-2"><h4><b class="grantSSetupTotalPrice"><?php echo number_format($STotPrice, 2, '.', ''); ?></b></h4></td>
                            <td class="col-sm-2" align="center"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel panel-default panel-table">
            <?php
            $BTotPrice = $TotPrice - $cTotPrice;
            $BTotPrice = ($BTotPrice >= 0) ? $BTotPrice : 0;
            ?>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                    <tbody>
                        <tr class="text-center danger">
                            <td class="text-center col-sm-2"><h4><b>Borrowings required</b></h4></td>
                            <td class="col-sm-2"><h4><b class="grantBSetupTotalPrice"><?php echo number_format($BTotPrice, 2, '.', ''); ?></b></h4></td>
                            <td class="col-sm-2" align="center"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="pull-right">
        <button class="btn btn-warning setupNext">Submit</button>
        <!--<a href="<?php echo base_url() ?>forecast/statement/<?php echo $companyid; ?>"><button class="btn btn-warning ">Next</button></a>-->
    </div>
</div>