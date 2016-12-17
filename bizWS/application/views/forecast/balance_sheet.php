<div class="col-md-12" style="margin: 2% 0;">
    <div class="pull-right">
        <button class="btn btn-warning assetEquityNext">Submit</button>
<!--        <button class="btn btn-warning redirect">Next</button>-->
    </div>
</div>
<div class="balance_sheet">
    <h3><b>ASSETS</b></h3>
    <div class="col-md-12 ">
        <div class="panel panel-default panel-table">
            <div class="panel-heading">
                <div class="row">
                    <div class="col col-xs-6">
                        <h3 class="panel-title"><b>Current Assets:</b></h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                    <thead>
                        <tr class="text-center">
                            <th>Name</th>
                            <th class="col-sm-2 text-center">Price</th>
                            <th class="<?php echo $tdClass; ?> text-center">FY01</th>
                            <th class="<?php echo $tdClass; ?> text-center">FY02</th>
                            <th class="<?php echo $tdClass; ?> text-center">FY03</th>
                            <?php if ($totalYear > 3) { ?>
                                <th class="<?php echo $tdClass; ?> text-center">FY04</th>
                                <th class="<?php echo $tdClass; ?> text-center">FY05</th>
                            <?php } ?>
                            <th class="col-sm-2 text-center"><em class="fa fa-cog"></em></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cTotPrice = 0;
                        $cTotFy1 = 0;
                        $cTotFy2 = 0;
                        $cTotFy3 = 0;
                        $cTotFy4 = 0;
                        $cTotFy5 = 0;
                        foreach ($currentAssets as $currentAsset) {
                            $minCls = ($currentAsset['sign']) ? 'minusInp' : '';

                            $readonly = '';
                            $style = '';
                            if (key_exists($currentAsset['name'], $fCA)) {
                                $readonly = 'readonly="readonly"';
                                $style = 'style="display:none !important;"';
                            }
                            ?>
                            <tr class="text-center currentAssets">
                                <td align="center" class="col-sm-2">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="currentAssetsName[]" value="<?php echo $currentAsset['name']; ?>" class="form-control <?php echo $minCls; ?>" placeholder="Name" <?php echo $readonly; ?>/>
                                    </div>
                                    <div class="text-center trNameTag" >
                                        <?php echo $currentAsset['name']; ?>
                                    </div>
                                </td>
                                <td align="center" class="col-sm-2" >
                                    <div class="form-group" style="width:70%; margin-top:5%;">
                                        <input type="text" name="currentAssetsPrice[]" value="<?php echo number_format($currentAsset['price'], 2, '.', ''); ?>" class="form-control onlyNumbers assetsPrice <?php echo $minCls; ?>" data-assets="current" placeholder="Amount">
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> currentAssetsPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="currentAssetsFy1[]" value="<?php echo number_format($currentAsset['fy1'], 2, '.', ''); ?>" class="form-control currentAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy1" data-assets="current" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag currentAssetsFyDiv" >
                                        <?php echo number_format($currentAsset['fy1'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> currentAssetsPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="currentAssetsFy2[]" value="<?php echo number_format($currentAsset['fy2'], 2, '.', ''); ?>" class="form-control currentAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy2" data-assets="current" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag currentAssetsFyDiv" >
                                        <?php echo number_format($currentAsset['fy2'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> currentAssetsPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="currentAssetsFy3[]" value="<?php echo number_format($currentAsset['fy3'], 2, '.', ''); ?>" class="form-control currentAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy3" data-assets="current" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag currentAssetsFyDiv" >
                                        <?php echo number_format($currentAsset['fy3'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <?php if ($totalYear > 3) { ?>
                                    <td align="center" class="<?php echo $tdClass; ?> currentAssetsPriceTd">
                                        <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                            <input type="text" name="currentAssetsFy4[]" value="<?php echo number_format($currentAsset['fy4'], 2, '.', ''); ?>" class="form-control currentAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy4" data-assets="current" placeholder="Amount"/>
                                        </div>
                                        <div class="trNameTag currentAssetsFyDiv" >
                                            <?php echo number_format($currentAsset['fy4'], 2, '.', ''); ?>
                                        </div>
                                    </td>
                                    <td align="center" class="<?php echo $tdClass; ?> currentAssetsPriceTd">
                                        <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                            <input type="text" name="currentAssetsFy5[]" value="<?php echo number_format($currentAsset['fy5'], 2, '.', ''); ?>" class="form-control currentAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy5" data-assets="current" placeholder="Amount"/>									
                                        </div>
                                        <div class="trNameTag currentAssetsFyDiv" >
                                            <?php echo number_format($currentAsset['fy5'], 2, '.', ''); ?>
                                        </div>
                                    </td>
                                <?php } ?>
                                <td class="col-sm-2" align="center">
                                    <a href="javascript:void(0);" class="table_edit trSignChange" data-assets="current" <?php echo $style; ?>><em class="fa fa-<?php echo $signArr[$currentAsset['sign']] ?>"></em></a>
                                    <a href="javascript:void(0);" class="table_edit trEditMore"><em class="fa fa-pencil"></em></a>
                                    <!--  data-toggle="modal" data-target="#EditModal"  -->
                                    <a href="javascript:void(0);" class="table_delet trDelete" data-assets="current" <?php echo $style; ?>><em class="fa fa-trash"></em></a>
                                </td>
                            </tr>
                            <?php
                            if ($currentAsset['sign']) {
                                $cTotPrice -= $currentAsset['price'];
                                $cTotFy1 -= $currentAsset['fy1'];
                                $cTotFy2 -= $currentAsset['fy2'];
                                $cTotFy3 -= $currentAsset['fy3'];
                                $cTotFy4 -= $currentAsset['fy4'];
                                $cTotFy5 -= $currentAsset['fy5'];
                            } else {
                                $cTotPrice += $currentAsset['price'];
                                $cTotFy1 += $currentAsset['fy1'];
                                $cTotFy2 += $currentAsset['fy2'];
                                $cTotFy3 += $currentAsset['fy3'];
                                $cTotFy4 += $currentAsset['fy4'];
                                $cTotFy5 += $currentAsset['fy5'];
                            }
                        }
                        ?>
                        <tr class="text-center currentAssetsAddMore">
                            <td class="text-center col-sm-2">
                                <a class="table_edit assetsAddMoreLink" data-assets="current" href="javascript:void(0);"><em class="fa fa-plus-circle">&nbsp;<b>Add More</b></em></a>
                            </td>
                            <td class="col-sm-2" ></td>
                            <td class="col-sm-2"></td>
                            <td class="<?php echo $tdClass; ?>"></td>
                            <td class="<?php echo $tdClass; ?>"></td>
                            <td class="<?php echo $tdClass; ?>"></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?>"></td>
                                <td class="<?php echo $tdClass; ?>"></td>
                            <?php } ?>
                        </tr>
                        <tr class="text-center warning">
                            <td class="text-center col-sm-2"><b>Total Current Assets</b></td>
                            <td align="center" class="col-sm-2" >
                                <div class="form-group" style="width:70%; margin-top:5%;">
                                    <input type="text" class="form-control currentAssetsTotalPrice" value="<?php echo number_format($cTotPrice, 2, '.', ''); ?>" disabled="true">
                                </div>
                            </td>
                            <td class="<?php echo $tdClass; ?> currentAssetsTotalFy1"><?php echo number_format($cTotFy1, 2, '.', ''); ?></td>
                            <td class="<?php echo $tdClass; ?> currentAssetsTotalFy2"><?php echo number_format($cTotFy2, 2, '.', ''); ?></td>
                            <td class="<?php echo $tdClass; ?> currentAssetsTotalFy3"><?php echo number_format($cTotFy3, 2, '.', ''); ?></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?> currentAssetsTotalFy4"><?php echo number_format($cTotFy4, 2, '.', ''); ?></td>
                                <td class="<?php echo $tdClass; ?> currentAssetsTotalFy5"><?php echo number_format($cTotFy5, 2, '.', ''); ?></td>
                            <?php } ?>
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
                        <h3 class="panel-title"><b>Fixed Assets:</b></h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                    <thead>
                        <tr class="text-center">
                            <th>Name</th>
                            <th class="col-sm-2 text-center">Price</th>
                            <th class="<?php echo $tdClass; ?> text-center">FY01</th>
                            <th class="<?php echo $tdClass; ?> text-center">FY02</th>
                            <th class="<?php echo $tdClass; ?> text-center">FY03</th>
                            <?php if ($totalYear > 3) { ?>
                                <th class="<?php echo $tdClass; ?> text-center">FY04</th>
                                <th class="<?php echo $tdClass; ?> text-center">FY05</th>
                            <?php } ?>
                            <th class="col-sm-2 text-center"><em class="fa fa-cog"></em></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $fTotPrice = 0;
                        $fTotFy1 = 0;
                        $fTotFy2 = 0;
                        $fTotFy3 = 0;
                        $fTotFy4 = 0;
                        $fTotFy5 = 0;
                        foreach ($fixedAssets as $fixedAsset) {
                            $minCls = ($fixedAsset['sign']) ? 'minusInp' : '';

                            $readonly = '';
                            $style = '';
                            if (key_exists($fixedAsset['name'], $fFA)) {
                                $readonly = 'readonly="readonly"';
                                $style = 'style="display:none !important;"';
                            }
                            ?>
                            <tr class="text-center fixedAssets">
                                <td align="center" class="col-sm-2">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="fixedAssetsName[]" value="<?php echo $fixedAsset['name']; ?>" class="form-control <?php echo $minCls; ?>" placeholder="Name" <?php echo $readonly; ?>/>
                                    </div>
                                    <div class="text-center trNameTag" >
                                        <?php echo $fixedAsset['name']; ?>
                                    </div>
                                </td>
                                <td align="center" class="col-sm-2" >
                                    <div class="form-group" style="width:70%; margin-top:5%;">
                                        <input type="text" name="fixedAssetsPrice[]" value="<?php echo number_format($fixedAsset['price'], 2, '.', ''); ?>" class="form-control onlyNumbers assetsPrice <?php echo $minCls; ?>" data-assets="fixed" placeholder="Amount">
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> fixedAssetsPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="fixedAssetsFy1[]" value="<?php echo number_format($fixedAsset['fy1'], 2, '.', ''); ?>" class="form-control fixedAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy1" data-assets="fixed" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag fixedAssetsFyDiv" >
                                        <?php echo number_format($fixedAsset['fy1'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> fixedAssetsPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="fixedAssetsFy2[]" value="<?php echo number_format($fixedAsset['fy2'], 2, '.', ''); ?>" class="form-control fixedAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy2" data-assets="fixed" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag fixedAssetsFyDiv" >
                                        <?php echo number_format($fixedAsset['fy2'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> fixedAssetsPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="fixedAssetsFy3[]" value="<?php echo number_format($fixedAsset['fy3'], 2, '.', ''); ?>" class="form-control fixedAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy3" data-assets="fixed" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag fixedAssetsFyDiv" >
                                        <?php echo number_format($fixedAsset['fy3'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <?php if ($totalYear > 3) { ?>
                                    <td align="center" class="<?php echo $tdClass; ?> fixedAssetsPriceTd">
                                        <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                            <input type="text" name="fixedAssetsFy4[]" value="<?php echo number_format($fixedAsset['fy4'], 2, '.', ''); ?>" class="form-control fixedAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy4" data-assets="fixed" placeholder="Amount"/>
                                        </div>
                                        <div class="trNameTag fixedAssetsFyDiv" >
                                            <?php echo number_format($fixedAsset['fy4'], 2, '.', ''); ?>
                                        </div>
                                    </td>
                                    <td align="center" class="<?php echo $tdClass; ?> fixedAssetsPriceTd">
                                        <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                            <input type="text" name="fixedAssetsFy5[]" value="<?php echo number_format($fixedAsset['fy5'], 2, '.', ''); ?>" class="form-control fixedAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy5" data-assets="fixed" placeholder="Amount"/>									
                                        </div>
                                        <div class="trNameTag fixedAssetsFyDiv" >
                                            <?php echo number_format($fixedAsset['fy5'], 2, '.', ''); ?>
                                        </div>
                                    </td>
                                <?php } ?>
                                <td class="col-sm-2" align="center">
                                    <a href="javascript:void(0);" class="table_edit trSignChange" data-assets="fixed" <?php echo $style; ?>><em class="fa fa-<?php echo $signArr[$fixedAsset['sign']] ?>"></em></a>
                                    <a href="javascript:void(0);" class="table_edit trEditMore"><em class="fa fa-pencil"></em></a>
                                    <!--  data-toggle="modal" data-target="#EditModal"  -->
                                    <a href="javascript:void(0);" class="table_delet trDelete" data-assets="fixed" <?php echo $style; ?>><em class="fa fa-trash"></em></a>
                                </td>
                            </tr>
                            <?php
                            if ($fixedAsset['sign']) {
                                $fTotPrice -= $fixedAsset['price'];
                                $fTotFy1 -= $fixedAsset['fy1'];
                                $fTotFy2 -= $fixedAsset['fy2'];
                                $fTotFy3 -= $fixedAsset['fy3'];
                                $fTotFy4 -= $fixedAsset['fy4'];
                                $fTotFy5 -= $fixedAsset['fy5'];
                            } else {
                                $fTotPrice += $fixedAsset['price'];
                                $fTotFy1 += $fixedAsset['fy1'];
                                $fTotFy2 += $fixedAsset['fy2'];
                                $fTotFy3 += $fixedAsset['fy3'];
                                $fTotFy4 += $fixedAsset['fy4'];
                                $fTotFy5 += $fixedAsset['fy5'];
                            }
                        }
                        ?>
                        <tr class="text-center fixedAssetsAddMore">
                            <td class="text-center col-sm-2">
                                <a class="table_edit assetsAddMoreLink" data-assets="fixed" href="javascript:void(0);"><em class="fa fa-plus-circle">&nbsp;<b>Add More</b></em></a>
                            </td>
                            <td class="col-sm-2" ></td>
                            <td class="col-sm-2"></td>
                            <td class="<?php echo $tdClass; ?>"></td>
                            <td class="<?php echo $tdClass; ?>"></td>
                            <td class="<?php echo $tdClass; ?>"></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?>"></td>
                                <td class="<?php echo $tdClass; ?>"></td>
                            <?php } ?>
                        </tr>
                        <tr class="text-center warning">
                            <td class="text-center col-sm-2"><b>Total Fixed Assets</b></td>
                            <td align="center" class="col-sm-2" >
                                <div class="form-group" style="width:70%; margin-top:5%;">
                                    <input type="text" value="<?php echo number_format($fTotPrice, 2, '.', ''); ?>" class="form-control fixedAssetsTotalPrice" disabled="true">
                                </div>
                            </td>
                            <td class="<?php echo $tdClass; ?> fixedAssetsTotalFy1"><?php echo number_format($fTotFy1, 2, '.', ''); ?></td>
                            <td class="<?php echo $tdClass; ?> fixedAssetsTotalFy2"><?php echo number_format($fTotFy2, 2, '.', ''); ?></td>
                            <td class="<?php echo $tdClass; ?> fixedAssetsTotalFy3"><?php echo number_format($fTotFy3, 2, '.', ''); ?></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?> fixedAssetsTotalFy4"><?php echo number_format($fTotFy4, 2, '.', ''); ?></td>
                                <td class="<?php echo $tdClass; ?> fixedAssetsTotalFy5"><?php echo number_format($fTotFy5, 2, '.', ''); ?></td>
                            <?php } ?>
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
                        <h3 class="panel-title"><b>Other Assets:</b></h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                    <thead>
                        <tr class="text-center">
                            <th>Name</th>
                            <th class="col-sm-2 text-center">Price</th>
                            <th class="<?php echo $tdClass; ?> text-center">FY01</th>
                            <th class="<?php echo $tdClass; ?> text-center">FY02</th>
                            <th class="<?php echo $tdClass; ?> text-center">FY03</th>
                            <?php if ($totalYear > 3) { ?>
                                <th class="<?php echo $tdClass; ?> text-center">FY04</th>
                                <th class="<?php echo $tdClass; ?> text-center">FY05</th>
                            <?php } ?>
                            <th class="col-sm-2 text-center"><em class="fa fa-cog"></em></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $oTotPrice = 0;
                        $oTotFy1 = 0;
                        $oTotFy2 = 0;
                        $oTotFy3 = 0;
                        $oTotFy4 = 0;
                        $oTotFy5 = 0;
                        foreach ($otherAssets as $otherAsset) {
                            $minCls = ($otherAsset['sign']) ? 'minusInp' : '';

                            $readonly = '';
                            $style = '';
                            if (key_exists($otherAsset['name'], $fOA)) {
                                $readonly = 'readonly="readonly"';
                                $style = 'style="display:none !important;"';
                            }
                            ?>
                            <tr class="text-center otherAssets">
                                <td align="center" class="col-sm-2">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="otherAssetsName[]" value="<?php echo $otherAsset['name']; ?>" class="form-control <?php echo $minCls; ?>" placeholder="Name" <?php echo $readonly; ?>/>
                                    </div>
                                    <div class="text-center trNameTag" >
                                        <?php echo $otherAsset['name']; ?>
                                    </div>
                                </td>
                                <td align="center" class="col-sm-2" >
                                    <div class="form-group" style="width:70%; margin-top:5%;">
                                        <input type="text" name="otherAssetsPrice[]" value="<?php echo number_format($otherAsset['price'], 2, '.', ''); ?>" class="form-control onlyNumbers assetsPrice <?php echo $minCls; ?>" data-assets="other" placeholder="Amount">
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> otherAssetsPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="otherAssetsFy1[]" value="<?php echo number_format($otherAsset['fy1'], 2, '.', ''); ?>" class="form-control otherAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy1" data-assets="other" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag otherAssetsFyDiv" >
                                        <?php echo number_format($otherAsset['fy1'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> otherAssetsPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="otherAssetsFy2[]" value="<?php echo number_format($otherAsset['fy2'], 2, '.', ''); ?>" class="form-control otherAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy2" data-assets="other" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag otherAssetsFyDiv" >
                                        <?php echo number_format($otherAsset['fy2'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> otherAssetsPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="otherAssetsFy3[]" value="<?php echo number_format($otherAsset['fy3'], 2, '.', ''); ?>" class="form-control otherAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy3" data-assets="other" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag otherAssetsFyDiv" >
                                        <?php echo number_format($otherAsset['fy3'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <?php if ($totalYear > 3) { ?>
                                    <td align="center" class="<?php echo $tdClass; ?> otherAssetsPriceTd">
                                        <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                            <input type="text" name="otherAssetsFy4[]" value="<?php echo number_format($otherAsset['fy4'], 2, '.', ''); ?>" class="form-control otherAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy4" data-assets="other" placeholder="Amount"/>
                                        </div>
                                        <div class="trNameTag otherAssetsFyDiv" >
                                            <?php echo number_format($otherAsset['fy4'], 2, '.', ''); ?>
                                        </div>
                                    </td>
                                    <td align="center" class="<?php echo $tdClass; ?> otherAssetsPriceTd">
                                        <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                            <input type="text" name="otherAssetsFy5[]" value="<?php echo number_format($otherAsset['fy5'], 2, '.', ''); ?>" class="form-control otherAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy5" data-assets="other" placeholder="Amount"/>									
                                        </div>
                                        <div class="trNameTag otherAssetsFyDiv" >
                                            <?php echo number_format($otherAsset['fy5'], 2, '.', ''); ?>
                                        </div>
                                    </td>
                                <?php } ?>
                                <td class="col-sm-2" align="center">
                                    <a href="javascript:void(0);" class="table_edit trSignChange" data-assets="other" <?php echo $style; ?>><em class="fa fa-<?php echo $signArr[$otherAsset['sign']] ?>"></em></a>
                                    <a href="javascript:void(0);" class="table_edit trEditMore"><em class="fa fa-pencil"></em></a>
                                    <!--  data-toggle="modal" data-target="#EditModal"  -->
                                    <a href="javascript:void(0);" class="table_delet trDelete" data-assets="other" <?php echo $style; ?>><em class="fa fa-trash"></em></a>
                                </td>
                            </tr>
                            <?php
                            if ($otherAsset['sign']) {
                                $oTotPrice -= $otherAsset['price'];
                                $oTotFy1 -= $otherAsset['fy1'];
                                $oTotFy2 -= $otherAsset['fy2'];
                                $oTotFy3 -= $otherAsset['fy3'];
                                $oTotFy4 -= $otherAsset['fy4'];
                                $oTotFy5 -= $otherAsset['fy5'];
                            } else {
                                $oTotPrice += $otherAsset['price'];
                                $oTotFy1 += $otherAsset['fy1'];
                                $oTotFy2 += $otherAsset['fy2'];
                                $oTotFy3 += $otherAsset['fy3'];
                                $oTotFy4 += $otherAsset['fy4'];
                                $oTotFy5 += $otherAsset['fy5'];
                            }
                        }
                        ?>
                        <tr class="text-center otherAssetsAddMore">
                            <td class="text-center col-sm-2">
                                <a class="table_edit assetsAddMoreLink" data-assets="other" href="javascript:void(0);"><em class="fa fa-plus-circle">&nbsp;<b>Add More</b></em></a>
                            </td>
                            <td class="col-sm-2" ></td>
                            <td class="col-sm-2"></td>
                            <td class="<?php echo $tdClass; ?>"></td>
                            <td class="<?php echo $tdClass; ?>"></td>
                            <td class="<?php echo $tdClass; ?>"></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?>"></td>
                                <td class="<?php echo $tdClass; ?>"></td>
                            <?php } ?>
                        </tr>
                        <tr class="text-center warning">
                            <td class="text-center col-sm-2"><b>Total Other Assets</b></td>
                            <td align="center" class="col-sm-2" >
                                <div class="form-group" style="width:70%; margin-top:5%;">
                                    <input type="text" value="<?php echo number_format($oTotPrice, 2, '.', ''); ?>" class="form-control otherAssetsTotalPrice" disabled="true">
                                </div>
                            </td>
                            <td class="<?php echo $tdClass; ?> otherAssetsTotalFy1"><?php echo number_format($oTotFy1, 2, '.', ''); ?></td>
                            <td class="<?php echo $tdClass; ?> otherAssetsTotalFy2"><?php echo number_format($oTotFy2, 2, '.', ''); ?></td>
                            <td class="<?php echo $tdClass; ?> otherAssetsTotalFy3"><?php echo number_format($oTotFy3, 2, '.', ''); ?></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?> otherAssetsTotalFy4"><?php echo number_format($oTotFy4, 2, '.', ''); ?></td>
                                <td class="<?php echo $tdClass; ?> otherAssetsTotalFy5"><?php echo number_format($oTotFy5, 2, '.', ''); ?></td>
                            <?php } ?>
                            <td class="col-sm-2" align="center">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel panel-default panel-table">
            <?php
            $TotPrice = $cTotPrice + $fTotPrice + $oTotPrice;
            $TotFy1 = $cTotFy1 + $fTotFy1 + $oTotFy1;
            $TotFy2 = $cTotFy2 + $fTotFy2 + $oTotFy2;
            $TotFy3 = $cTotFy3 + $fTotFy3 + $oTotFy3;
            ?>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                    <tbody>
                        <tr class="text-center danger">
                            <td class="text-center col-sm-4"><h4><b>Total Assets</b></h4></td>
                            <td class="<?php echo $tdClass; ?>"><h4><b class="grantAssetsTotalFy1"><?php echo number_format($TotFy1, 2, '.', ''); ?></b></h4></td>
                            <td class="<?php echo $tdClass; ?>"><h4><b class="grantAssetsTotalFy2"><?php echo number_format($TotFy2, 2, '.', ''); ?></b></h4></td>
                            <td class="<?php echo $tdClass; ?>"><h4><b class="grantAssetsTotalFy3"><?php echo number_format($TotFy3, 2, '.', ''); ?></b></h4></td>
                            <?php
                            if ($totalYear > 3) {
                                $TotFy4 = $cTotFy4 + $fTotFy4 + $oTotFy4;
                                $TotFy5 = $cTotFy5 + $fTotFy5 + $oTotFy5;
                                ?>
                                <td class="<?php echo $tdClass; ?>"><h4><b class="grantAssetsTotalFy4"><?php echo number_format($TotFy4, 2, '.', ''); ?></b></h4></td>
                                <td class="<?php echo $tdClass; ?>"><h4><b class="grantAssetsTotalFy5"><?php echo number_format($TotFy5, 2, '.', ''); ?></b></h4></td>
                            <?php } ?>
                            <td class="col-sm-2" align="center"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>	
<div class="balance_sheet">
    <h3><b>LIABILITIES</b></h3>
    <div class="col-md-12 ">		
        <div class="panel panel-default panel-table">
            <div class="panel-heading">
                <div class="row">
                    <div class="col col-xs-6">
                        <h3 class="panel-title"><b>Current Liabilities :</b></h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                    <thead>
                        <tr class="text-center">
                            <th>Name</th>
                            <th class="col-sm-2 text-center">Price</th>
                            <th class="<?php echo $tdClass; ?> text-center">FY01</th>
                            <th class="<?php echo $tdClass; ?> text-center">FY02</th>
                            <th class="<?php echo $tdClass; ?> text-center">FY03</th>
                            <?php if ($totalYear > 3) { ?>
                                <th class="<?php echo $tdClass; ?> text-center">FY04</th>
                                <th class="<?php echo $tdClass; ?> text-center">FY05</th>
                            <?php } ?>
                            <th class="col-sm-2 text-center"><em class="fa fa-cog"></em></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cLTotPrice = 0;
                        $cLTotFy1 = 0;
                        $cLTotFy2 = 0;
                        $cLTotFy3 = 0;
                        $cLTotFy4 = 0;
                        $cLTotFy5 = 0;
                        foreach ($currentLbAssets as $currentLbAsset) {
                            $minCls = ($currentLbAsset['sign']) ? 'minusInp' : '';

                            $readonly = '';
                            $style = '';
                            if (key_exists($currentLbAsset['name'], $fCL)) {
                                $readonly = 'readonly="readonly"';
                                $style = 'style="display:none !important;"';
                            }
                            ?>
                            <tr class="text-center currentLbAssets">
                                <td align="center" class="col-sm-2">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="currentLbAssetsName[]" value="<?php echo $currentLbAsset['name']; ?>" class="form-control <?php echo $minCls; ?>" placeholder="Name" <?php echo $readonly; ?>/>
                                    </div>
                                    <div class="text-center trNameTag" >
                                        <?php echo $currentLbAsset['name']; ?>
                                    </div>
                                </td>
                                <td align="center" class="col-sm-2" >
                                    <div class="form-group" style="width:70%; margin-top:5%;">
                                        <input type="text" name="currentLbAssetsPrice[]" value="<?php echo number_format($currentLbAsset['price'], 2, '.', ''); ?>" class="form-control onlyNumbers assetsPrice <?php echo $minCls; ?>" data-assets="currentLb" placeholder="Amount">
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> currentLbAssetsPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="currentLbAssetsFy1[]" value="<?php echo number_format($currentLbAsset['fy1'], 2, '.', ''); ?>" class="form-control currentLbAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy1" data-assets="currentLb" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag currentLbAssetsFyDiv" >
                                        <?php echo number_format($currentLbAsset['fy1'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> currentLbAssetsPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="currentLbAssetsFy2[]" value="<?php echo number_format($currentLbAsset['fy2'], 2, '.', ''); ?>" class="form-control currentLbAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy2" data-assets="currentLb" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag currentLbAssetsFyDiv" >
                                        <?php echo number_format($currentLbAsset['fy2'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> currentLbAssetsPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="currentLbAssetsFy3[]" value="<?php echo number_format($currentLbAsset['fy3'], 2, '.', ''); ?>" class="form-control currentLbAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy3" data-assets="currentLb" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag currentLbAssetsFyDiv" >
                                        <?php echo number_format($currentLbAsset['fy3'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <?php if ($totalYear > 3) { ?>
                                    <td align="center" class="<?php echo $tdClass; ?> currentLbAssetsPriceTd">
                                        <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                            <input type="text" name="currentLbAssetsFy4[]" value="<?php echo number_format($currentLbAsset['fy4'], 2, '.', ''); ?>" class="form-control currentLbAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy4" data-assets="currentLb" placeholder="Amount"/>
                                        </div>
                                        <div class="trNameTag currentLbAssetsFyDiv" >
                                            <?php echo number_format($currentLbAsset['fy4'], 2, '.', ''); ?>
                                        </div>
                                    </td>
                                    <td align="center" class="<?php echo $tdClass; ?> currentLbAssetsPriceTd">
                                        <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                            <input type="text" name="currentLbAssetsFy5[]" value="<?php echo number_format($currentLbAsset['fy5'], 2, '.', ''); ?>" class="form-control currentLbAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy5" data-assets="currentLb" placeholder="Amount"/>									
                                        </div>
                                        <div class="trNameTag currentLbAssetsFyDiv" >
                                            <?php echo number_format($currentLbAsset['fy5'], 2, '.', ''); ?>
                                        </div>
                                    </td>
                                <?php } ?>
                                <td class="col-sm-2" align="center">
                                    <a href="javascript:void(0);" class="table_edit trSignChange" data-assets="other" <?php echo $style; ?>><em class="fa fa-<?php echo $signArr[$currentLbAsset['sign']] ?>"></em></a>
                                    <a href="javascript:void(0);" class="table_edit trEditMore"><em class="fa fa-pencil"></em></a>
                                    <!--  data-toggle="modal" data-target="#EditModal"  -->
                                    <a href="javascript:void(0);" class="table_delet trDelete" data-assets="currentLb" <?php echo $style; ?>><em class="fa fa-trash"></em></a>
                                </td>
                            </tr>
                            <?php
                            if ($currentLbAsset['sign']) {
                                $cLTotPrice -= $currentLbAsset['price'];
                                $cLTotFy1 -= $currentLbAsset['fy1'];
                                $cLTotFy2 -= $currentLbAsset['fy2'];
                                $cLTotFy3 -= $currentLbAsset['fy3'];
                                $cLTotFy4 -= $currentLbAsset['fy4'];
                                $cLTotFy5 -= $currentLbAsset['fy5'];
                            } else {
                                $cLTotPrice += $currentLbAsset['price'];
                                $cLTotFy1 += $currentLbAsset['fy1'];
                                $cLTotFy2 += $currentLbAsset['fy2'];
                                $cLTotFy3 += $currentLbAsset['fy3'];
                                $cLTotFy4 += $currentLbAsset['fy4'];
                                $cLTotFy5 += $currentLbAsset['fy5'];
                            }
                        }
                        ?>
                        <tr class="text-center currentLbAssetsAddMore">
                            <td class="text-center col-sm-2">
                                <a class="table_edit assetsAddMoreLink" data-assets="currentLb" href="javascript:void(0);"><em class="fa fa-plus-circle">&nbsp;<b>Add More</b></em></a>
                            </td>
                            <td class="col-sm-2" ></td>
                            <td class="col-sm-2"></td>
                            <td class="<?php echo $tdClass; ?>"></td>
                            <td class="<?php echo $tdClass; ?>"></td>
                            <td class="<?php echo $tdClass; ?>"></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?>"></td>
                                <td class="<?php echo $tdClass; ?>"></td>
                            <?php } ?>
                        </tr>
                        <tr class="text-center warning">
                            <td class="text-center col-sm-2"><b>Total Current Liabilities</b></td>
                            <td align="center" class="col-sm-2" >
                                <div class="form-group" style="width:70%; margin-top:5%;">
                                    <input type="text" value="<?php echo number_format($cLTotPrice, 2, '.', ''); ?>" class="form-control currentLbAssetsTotalPrice" disabled="true">
                                </div>
                            </td>
                            <td class="<?php echo $tdClass; ?> currentLbAssetsTotalFy1"><?php echo number_format($cLTotFy1, 2, '.', ''); ?></td>
                            <td class="<?php echo $tdClass; ?> currentLbAssetsTotalFy2"><?php echo number_format($cLTotFy2, 2, '.', ''); ?></td>
                            <td class="<?php echo $tdClass; ?> currentLbAssetsTotalFy3"><?php echo number_format($cLTotFy3, 2, '.', ''); ?></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?> currentLbAssetsTotalFy4"><?php echo number_format($cLTotFy4, 2, '.', ''); ?></td>
                                <td class="<?php echo $tdClass; ?> currentLbAssetsTotalFy5"><?php echo number_format($cLTotFy5, 2, '.', ''); ?></td>
                            <?php } ?>
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
                        <h3 class="panel-title"><b>Long-Term Liabilities :</b></h3>
                    </div>
                </div>
            </div>	
            <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                    <thead>
                        <tr class="text-center">
                            <th>Name</th>
                            <th class="col-sm-2 text-center">Price</th>
                            <th class="<?php echo $tdClass; ?> text-center">FY01</th>
                            <th class="<?php echo $tdClass; ?> text-center">FY02</th>
                            <th class="<?php echo $tdClass; ?> text-center">FY03</th>
                            <?php if ($totalYear > 3) { ?>
                                <th class="<?php echo $tdClass; ?> text-center">FY04</th>
                                <th class="<?php echo $tdClass; ?> text-center">FY05</th>
                            <?php } ?>
                            <th class="col-sm-2 text-center"><em class="fa fa-cog"></em></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $lTTotPrice = 0;
                        $lTTotFy1 = 0;
                        $lTTotFy2 = 0;
                        $lTTotFy3 = 0;
                        $lTTotFy4 = 0;
                        $lTTotFy5 = 0;
                        foreach ($longTermAssets as $longTermAsset) {
                            $minCls = ($longTermAsset['sign']) ? 'minusInp' : '';

                            $readonly = '';
                            $style = '';
                            if (key_exists($longTermAsset['name'], $fLL)) {
                                $readonly = 'readonly="readonly"';
                                $style = 'style="display:none !important;"';
                            }
                            ?>
                            <tr class="text-center longTermAssets">
                                <td align="center" class="col-sm-2">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="longTermAssetsName[]" value="<?php echo $longTermAsset['name']; ?>" class="form-control <?php echo $minCls; ?>" placeholder="Name" <?php echo $readonly; ?>/>
                                    </div>
                                    <div class="text-center trNameTag" >
                                        <?php echo $longTermAsset['name']; ?>
                                    </div>
                                </td>
                                <td align="center" class="col-sm-2" >
                                    <div class="form-group" style="width:70%; margin-top:5%;">
                                        <input type="text" name="longTermAssetsPrice[]"value="<?php echo number_format($longTermAsset['price'], 2, '.', ''); ?>"  class="form-control onlyNumbers assetsPrice <?php echo $minCls; ?>" data-assets="longTerm" placeholder="Amount">
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> longTermAssetsPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="longTermAssetsFy1[]" value="<?php echo number_format($longTermAsset['fy1'], 2, '.', ''); ?>" class="form-control longTermAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy1" data-assets="longTerm" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag longTermAssetsFyDiv" >
                                        <?php echo number_format($longTermAsset['fy1'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> longTermAssetsPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="longTermAssetsFy2[]" value="<?php echo number_format($longTermAsset['fy2'], 2, '.', ''); ?>" class="form-control longTermAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy2" data-assets="longTerm" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag longTermAssetsFyDiv" >
                                        <?php echo number_format($longTermAsset['fy2'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> longTermAssetsPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="longTermAssetsFy3[]" value="<?php echo number_format($longTermAsset['fy3'], 2, '.', ''); ?>" class="form-control longTermAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy3" data-assets="longTerm" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag longTermAssetsFyDiv" >
                                        <?php echo number_format($longTermAsset['fy3'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <?php if ($totalYear > 3) { ?>
                                    <td align="center" class="<?php echo $tdClass; ?> longTermAssetsPriceTd">
                                        <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                            <input type="text" name="longTermAssetsFy4[]" value="<?php echo number_format($longTermAsset['fy4'], 2, '.', ''); ?>" class="form-control longTermAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy4" data-assets="longTerm" placeholder="Amount"/>
                                        </div>
                                        <div class="trNameTag longTermAssetsFyDiv" >
                                            <?php echo number_format($longTermAsset['fy4'], 2, '.', ''); ?>
                                        </div>
                                    </td>
                                    <td align="center" class="<?php echo $tdClass; ?> longTermAssetsPriceTd">
                                        <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                            <input type="text" name="longTermAssetsFy5[]" value="<?php echo number_format($longTermAsset['fy5'], 2, '.', ''); ?>" class="form-control longTermAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy5" data-assets="longTerm" placeholder="Amount"/>									
                                        </div>
                                        <div class="trNameTag longTermAssetsFyDiv" >
                                            <?php echo number_format($longTermAsset['fy5'], 2, '.', ''); ?>
                                        </div>
                                    </td>
                                <?php } ?>
                                <td class="col-sm-2" align="center">
                                    <a href="javascript:void(0);" class="table_edit trSignChange" data-assets="longTerm" <?php echo $style; ?>><em class="fa fa-<?php echo $signArr[$longTermAsset['sign']] ?>"></em></a>
                                    <a href="javascript:void(0);" class="table_edit trEditMore"><em class="fa fa-pencil"></em></a>
                                    <!--  data-toggle="modal" data-target="#EditModal"  -->
                                    <a href="javascript:void(0);" class="table_delet trDelete" data-assets="longTerm" <?php echo $style; ?>><em class="fa fa-trash"></em></a>
                                </td>
                            </tr>
                            <?php
                            if ($longTermAsset['sign']) {
                                $lTTotPrice -= $longTermAsset['price'];
                                $lTTotFy1 -= $longTermAsset['fy1'];
                                $lTTotFy2 -= $longTermAsset['fy2'];
                                $lTTotFy3 -= $longTermAsset['fy3'];
                                $lTTotFy4 -= $longTermAsset['fy4'];
                                $lTTotFy5 -= $longTermAsset['fy5'];
                            } else {
                                $lTTotPrice += $longTermAsset['price'];
                                $lTTotFy1 += $longTermAsset['fy1'];
                                $lTTotFy2 += $longTermAsset['fy2'];
                                $lTTotFy3 += $longTermAsset['fy3'];
                                $lTTotFy4 += $longTermAsset['fy4'];
                                $lTTotFy5 += $longTermAsset['fy5'];
                            }
                        }
                        ?>
                        <tr class="text-center longTermAssetsAddMore">
                            <td class="text-center col-sm-2">
                                <a class="table_edit assetsAddMoreLink" data-assets="longTerm" href="javascript:void(0);"><em class="fa fa-plus-circle">&nbsp;<b>Add More</b></em></a>
                            </td>
                            <td class="col-sm-2" ></td>
                            <td class="col-sm-2"></td>
                            <td class="<?php echo $tdClass; ?>"></td>
                            <td class="<?php echo $tdClass; ?>"></td>
                            <td class="<?php echo $tdClass; ?>"></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?>"></td>
                                <td class="<?php echo $tdClass; ?>"></td>
                            <?php } ?>
                        </tr>
                        <tr class="text-center warning">
                            <td class="text-center col-sm-2"><b>Total Long-Term Liabilities</b></td>
                            <td align="center" class="col-sm-2" >
                                <div class="form-group" style="width:70%; margin-top:5%;">
                                    <input type="text" value="<?php echo number_format($lTTotPrice, 2, '.', ''); ?>" class="form-control longTermAssetsTotalPrice" disabled="true">
                                </div>
                            </td>
                            <td class="<?php echo $tdClass; ?> longTermAssetsTotalFy1"><?php echo number_format($lTTotFy1, 2, '.', ''); ?></td>
                            <td class="<?php echo $tdClass; ?> longTermAssetsTotalFy2"><?php echo number_format($lTTotFy2, 2, '.', ''); ?></td>
                            <td class="<?php echo $tdClass; ?> longTermAssetsTotalFy3"><?php echo number_format($lTTotFy3, 2, '.', ''); ?></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?> longTermAssetsTotalFy4"><?php echo number_format($lTTotFy4, 2, '.', ''); ?></td>
                                <td class="<?php echo $tdClass; ?> longTermAssetsTotalFy5"><?php echo number_format($lTTotFy5, 2, '.', ''); ?></td>
                            <?php } ?>
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
                        <h3 class="panel-title"><b>EQUITY:</b></h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                    <thead>
                        <tr class="text-center">
                            <th>Name</th>
                            <th class="col-sm-2 text-center">Price</th>
                            <th class="<?php echo $tdClass; ?> text-center">FY01</th>
                            <th class="<?php echo $tdClass; ?> text-center">FY02</th>
                            <th class="<?php echo $tdClass; ?> text-center">FY03</th>
                            <?php if ($totalYear > 3) { ?>
                                <th class="<?php echo $tdClass; ?> text-center">FY04</th>
                                <th class="<?php echo $tdClass; ?> text-center">FY05</th>
                            <?php } ?>
                            <th class="col-sm-2 text-center"><em class="fa fa-cog"></em></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $eTotPrice = 0;
                        $eTotFy1 = 0;
                        $eTotFy2 = 0;
                        $eTotFy3 = 0;
                        $eTotFy4 = 0;
                        $eTotFy5 = 0;
                        foreach ($equityAssets as $equityAsset) {
                            $minCls = ($equityAsset['sign']) ? 'minusInp' : '';

                            $readonly = '';
                            $style = '';
                            if (key_exists($equityAsset['name'], $fE)) {
                                $readonly = 'readonly="readonly"';
                                $style = 'style="display:none !important;"';
                            }
                            ?>
                            <tr class="text-center equityAssets">
                                <td align="center" class="col-sm-2">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="equityAssetsName[]" value="<?php echo $equityAsset['name']; ?>" class="form-control <?php echo $minCls; ?>" placeholder="Name" <?php echo $readonly; ?>/>
                                    </div>
                                    <div class="text-center trNameTag" >
                                        <?php echo $equityAsset['name']; ?>
                                    </div>
                                </td>
                                <td align="center" class="col-sm-2" >
                                    <div class="form-group" style="width:70%; margin-top:5%;">
                                        <input type="text" name="equityAssetsPrice[]" value="<?php echo number_format($equityAsset['price'], 2, '.', ''); ?>" class="form-control onlyNumbers assetsPrice <?php echo $minCls; ?>" data-assets="equity" placeholder="Amount">
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> equityAssetsPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="equityAssetsFy1[]" value="<?php echo number_format($equityAsset['fy1'], 2, '.', ''); ?>" class="form-control equityAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy1" data-assets="equity" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag equityAssetsFyDiv" >
                                        <?php echo number_format($equityAsset['fy1'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> equityAssetsPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="equityAssetsFy2[]" value="<?php echo number_format($equityAsset['fy2'], 2, '.', ''); ?>" class="form-control equityAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy2" data-assets="equity" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag equityAssetsFyDiv" >
                                        <?php echo number_format($equityAsset['fy2'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> equityAssetsPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="equityAssetsFy3[]" value="<?php echo number_format($equityAsset['fy3'], 2, '.', ''); ?>" class="form-control equityAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy3" data-assets="equity" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag equityAssetsFyDiv" >
                                        <?php echo number_format($equityAsset['fy3'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <?php if ($totalYear > 3) { ?>
                                    <td align="center" class="<?php echo $tdClass; ?> equityAssetsPriceTd">
                                        <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                            <input type="text" name="equityAssetsFy4[]" value="<?php echo number_format($equityAsset['fy4'], 2, '.', ''); ?>" class="form-control equityAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy4" data-assets="equity" placeholder="Amount"/>
                                        </div>
                                        <div class="trNameTag equityAssetsFyDiv" >
                                            <?php echo number_format($equityAsset['fy4'], 2, '.', ''); ?>
                                        </div>
                                    </td>
                                    <td align="center" class="<?php echo $tdClass; ?> equityAssetsPriceTd">
                                        <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                            <input type="text" name="equityAssetsFy5[]" value="<?php echo number_format($equityAsset['fy5'], 2, '.', ''); ?>" class="form-control equityAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy5" data-assets="equity" placeholder="Amount"/>									
                                        </div>
                                        <div class="trNameTag equityAssetsFyDiv" >
                                            <?php echo number_format($equityAsset['fy5'], 2, '.', ''); ?>
                                        </div>
                                    </td>
                                <?php } ?>
                                <td class="col-sm-2" align="center">
                                    <a href="javascript:void(0);" class="table_edit trSignChange" data-assets="equity" <?php echo $style; ?>><em class="fa fa-<?php echo $signArr[$equityAsset['sign']] ?>"></em></a>
                                    <a href="javascript:void(0);" class="table_edit trEditMore"><em class="fa fa-pencil"></em></a>
                                    <!--  data-toggle="modal" data-target="#EditModal"  -->
                                    <a href="javascript:void(0);" class="table_delet trDelete" data-assets="equity" <?php echo $style; ?>><em class="fa fa-trash"></em></a>
                                </td>
                            </tr>
                            <?php
                            if ($equityAsset['sign']) {
                                $eTotPrice -= $equityAsset['price'];
                                $eTotFy1 -= $equityAsset['fy1'];
                                $eTotFy2 -= $equityAsset['fy2'];
                                $eTotFy3 -= $equityAsset['fy3'];
                                $eTotFy4 -= $equityAsset['fy4'];
                                $eTotFy5 -= $equityAsset['fy5'];
                            } else {
                                $eTotPrice += $equityAsset['price'];
                                $eTotFy1 += $equityAsset['fy1'];
                                $eTotFy2 += $equityAsset['fy2'];
                                $eTotFy3 += $equityAsset['fy3'];
                                $eTotFy4 += $equityAsset['fy4'];
                                $eTotFy5 += $equityAsset['fy5'];
                            }
                        }
                        ?>
                        <tr class="text-center equityAssetsAddMore">
                            <td class="text-center col-sm-2">
                                <a class="table_edit assetsAddMoreLink" data-assets="equity" href="javascript:void(0);"><em class="fa fa-plus-circle">&nbsp;<b>Add More</b></em></a>
                            </td>
                            <td class="col-sm-2" ></td>
                            <td class="col-sm-2"></td>
                            <td class="<?php echo $tdClass; ?>"></td>
                            <td class="<?php echo $tdClass; ?>"></td>
                            <td class="<?php echo $tdClass; ?>"></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?>"></td>
                                <td class="<?php echo $tdClass; ?>"></td>
                            <?php } ?>
                        </tr>
                        <tr class="text-center warning">
                            <td class="text-center col-sm-2"><b>Total Equity</b></td>
                            <td align="center" class="col-sm-2" >
                                <div class="form-group" style="width:70%; margin-top:5%;">
                                    <input type="text" value="<?php echo number_format($eTotPrice, 2, '.', ''); ?>" class="form-control equityAssetsTotalPrice" disabled="true">
                                </div>
                            </td>
                            <td class="<?php echo $tdClass; ?> equityAssetsTotalFy1"><?php echo number_format($eTotFy1, 2, '.', ''); ?></td>
                            <td class="<?php echo $tdClass; ?> equityAssetsTotalFy2"><?php echo number_format($eTotFy2, 2, '.', ''); ?></td>
                            <td class="<?php echo $tdClass; ?> equityAssetsTotalFy3"><?php echo number_format($eTotFy3, 2, '.', ''); ?></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?> equityAssetsTotalFy4"><?php echo number_format($eTotFy4, 2, '.', ''); ?></td>
                                <td class="<?php echo $tdClass; ?> equityAssetsTotalFy5"><?php echo number_format($eTotFy5, 2, '.', ''); ?></td>
                            <?php } ?>
                            <td class="col-sm-2" align="center">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel panel-default panel-table">
            <?php
            $TotPrice = $cLTotPrice + $lTTotPrice + $eTotPrice;
            $TotFy1 = $cLTotFy1 + $lTTotFy1 + $eTotFy1;
            $TotFy2 = $cLTotFy2 + $lTTotFy2 + $eTotFy2;
            $TotFy3 = $cLTotFy3 + $lTTotFy3 + $eTotFy3;
            ?>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                    <tbody>
                        <tr class="text-center danger total_costs">
                            <td class="text-center col-sm-4"><h4><b>TOTAL LIABILITIES & EQUITY</b></h4></td>
                            <td class="<?php echo $tdClass; ?>"><h4><b class="grantEAssetsTotalFy1"><?php echo number_format($TotFy1, 2, '.', ''); ?></b></h4></td>
                            <td class="<?php echo $tdClass; ?>"><h4><b class="grantEAssetsTotalFy2"><?php echo number_format($TotFy2, 2, '.', ''); ?></b></h4></td>
                            <td class="<?php echo $tdClass; ?>"><h4><b class="grantEAssetsTotalFy3"><?php echo number_format($TotFy3, 2, '.', ''); ?></b></h4></td>
                            <?php
                            if ($totalYear > 3) {
                                $TotFy4 = $cLTotFy4 + $lTTotFy4 + $eTotFy4;
                                $TotFy5 = $cLTotFy5 + $lTTotFy5 + $eTotFy5;
                                ?>
                                <td class="<?php echo $tdClass; ?>"><h4><b class="grantEAssetsTotalFy4"><?php echo number_format($TotFy4, 2, '.', ''); ?></b></h4></td>
                                <td class="<?php echo $tdClass; ?>"><h4><b class="grantEAssetsTotalFy5"><?php echo number_format($TotFy5, 2, '.', ''); ?></b></h4></td>
                            <?php } ?>
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
        <button class="btn btn-warning assetEquityNext">Submit</button>
        <!--<button class="btn btn-warning redirect">Next</button>-->
    </div>
</div>
<?php $this->load->view('popup/forecast_popup'); ?>