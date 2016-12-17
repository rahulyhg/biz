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
                                        <input type="text" name="currentAssetsPrice[]" value="<?php echo number_format($currentAsset['price'], 2); ?>" class="form-control onlyNumbers assetsPrice <?php echo $minCls; ?>" data-assets="current" placeholder="Amount">
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> currentAssetsPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="currentAssetsFy1[]" value="<?php echo number_format($currentAsset['fy1'], 2); ?>" class="form-control currentAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy1" data-assets="current" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag currentAssetsFyDiv" >
                                        <?php echo number_format($currentAsset['fy1'], 2); ?>
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> currentAssetsPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="currentAssetsFy2[]" value="<?php echo number_format($currentAsset['fy2'], 2); ?>" class="form-control currentAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy2" data-assets="current" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag currentAssetsFyDiv" >
                                        <?php echo number_format($currentAsset['fy2'], 2); ?>
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> currentAssetsPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="currentAssetsFy3[]" value="<?php echo number_format($currentAsset['fy3'], 2); ?>" class="form-control currentAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy3" data-assets="current" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag currentAssetsFyDiv" >
                                        <?php echo number_format($currentAsset['fy3'], 2); ?>
                                    </div>
                                </td>
                                <?php if ($totalYear > 3) { ?>
                                    <td align="center" class="<?php echo $tdClass; ?> currentAssetsPriceTd">
                                        <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                            <input type="text" name="currentAssetsFy4[]" value="<?php echo number_format($currentAsset['fy4'], 2); ?>" class="form-control currentAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy4" data-assets="current" placeholder="Amount"/>
                                        </div>
                                        <div class="trNameTag currentAssetsFyDiv" >
                                            <?php echo number_format($currentAsset['fy4'], 2); ?>
                                        </div>
                                    </td>
                                    <td align="center" class="<?php echo $tdClass; ?> currentAssetsPriceTd">
                                        <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                            <input type="text" name="currentAssetsFy5[]" value="<?php echo number_format($currentAsset['fy5'], 2); ?>" class="form-control currentAssetsFyInput AssetsFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy5" data-assets="current" placeholder="Amount"/>									
                                        </div>
                                        <div class="trNameTag currentAssetsFyDiv" >
                                            <?php echo number_format($currentAsset['fy5'], 2); ?>
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
                                    <input type="text" class="form-control currentAssetsTotalPrice" value="<?php echo number_format($cTotPrice, 2); ?>" disabled="true">
                                </div>
                            </td>
                            <td class="<?php echo $tdClass; ?> currentAssetsTotalFy1"><?php echo number_format($cTotFy1, 2); ?></td>
                            <td class="<?php echo $tdClass; ?> currentAssetsTotalFy2"><?php echo number_format($cTotFy2, 2); ?></td>
                            <td class="<?php echo $tdClass; ?> currentAssetsTotalFy3"><?php echo number_format($cTotFy3, 2); ?></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?> currentAssetsTotalFy4"><?php echo number_format($cTotFy4, 2); ?></td>
                                <td class="<?php echo $tdClass; ?> currentAssetsTotalFy5"><?php echo number_format($cTotFy5, 2); ?></td>
                            <?php } ?>
                            <td class="col-sm-2" align="center">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>