<?php
$tdClass = '';
?>
<div class="balance_sheet">
    <h3><b></b></h3>
    <!--    ASSETS-->
    <div class="col-md-12 ">
        <div class="">
            <div id="table_2">
                <table class="table table-responsive table-hover forecast_view">
                    <thead>
                        <tr class="">
                            <th></th>
                            <th class="<?php echo $tdClass; ?> ">FY01</th>
                            <th class="<?php echo $tdClass; ?> ">FY02</th>
                            <th class="<?php echo $tdClass; ?> ">FY03</th>
                            <?php if ($totalYear > 3) { ?>
                                <th class="<?php echo $tdClass; ?> ">FY04</th>
                                <th class="<?php echo $tdClass; ?> ">FY05</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="clickable"><b>Assets</b></td>
                            <td class="clickable"></td>
                            <td class="clickable"></td>
                            <td class="clickable"></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="clickable"></td>
                                <td class="clickable"></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td class="clickable"><b>Current Assets</b></td>
                            <td class="clickable"></td>
                            <td class="clickable"></td>
                            <td class="clickable"></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="clickable"></td>
                                <td class="clickable"></td>
                            <?php } ?>
                        </tr>
                        <?php
                        $cTotFy1 = 0;
                        $cTotFy2 = 0;
                        $cTotFy3 = 0;
                        $cTotFy4 = 0;
                        $cTotFy5 = 0;
                        foreach ($currentAssets as $currentAsset) {
                            $minCls = ($currentAsset['sign']) ? 'minusInp' : '';
                            ?>
                            <tr>
                                <td class="col-sm-2">
                                    <div class="trNameTag" >
                                        <?php echo $currentAsset['name']; ?>
                                    </div>
                                </td>
                                <td  class="<?php echo $tdClass; ?> currentAssetsPriceTd">
                                    <div class="trNameTag currentAssetsFyDiv" >
                                        <?php echo number_format($currentAsset['fy1'], 2); ?>
                                    </div>
                                </td>
                                <td  class="<?php echo $tdClass; ?> currentAssetsPriceTd">
                                    <div class="trNameTag currentAssetsFyDiv" >
                                        <?php echo number_format($currentAsset['fy2'], 2); ?>
                                    </div>
                                </td>
                                <td  class="<?php echo $tdClass; ?> currentAssetsPriceTd">
                                    <div class="trNameTag currentAssetsFyDiv" >
                                        <?php echo number_format($currentAsset['fy3'], 2); ?>
                                    </div>
                                </td>
                                <?php if ($totalYear > 3) { ?>
                                    <td  class="<?php echo $tdClass; ?> currentAssetsPriceTd">
                                        <div class="trNameTag currentAssetsFyDiv" >
                                            <?php echo number_format($currentAsset['fy4'], 2); ?>
                                        </div>
                                    </td>
                                    <td  class="<?php echo $tdClass; ?> currentAssetsPriceTd">
                                        <div class="trNameTag currentAssetsFyDiv" >
                                            <?php echo number_format($currentAsset['fy5'], 2); ?>
                                        </div>
                                    </td>
                                <?php } ?>
                            </tr>
                            <?php
                            if ($currentAsset['sign']) {
                                $cTotFy1 -= $currentAsset['fy1'];
                                $cTotFy2 -= $currentAsset['fy2'];
                                $cTotFy3 -= $currentAsset['fy3'];
                                $cTotFy4 -= $currentAsset['fy4'];
                                $cTotFy5 -= $currentAsset['fy5'];
                            } else {
                                $cTotFy1 += $currentAsset['fy1'];
                                $cTotFy2 += $currentAsset['fy2'];
                                $cTotFy3 += $currentAsset['fy3'];
                                $cTotFy4 += $currentAsset['fy4'];
                                $cTotFy5 += $currentAsset['fy5'];
                            }
                        }
                        ?>
                        <tr class="clickable">
                            <td class="col-sm-2"><b>Total Current Assets</b></td>
                            <td class="<?php echo $tdClass; ?> currentAssetsTotalFy1"><b><?php echo number_format($cTotFy1, 2); ?></b></td>
                            <td class="<?php echo $tdClass; ?> currentAssetsTotalFy2"><b><?php echo number_format($cTotFy2, 2); ?></b></td>
                            <td class="<?php echo $tdClass; ?> currentAssetsTotalFy3"><b><?php echo number_format($cTotFy3, 2); ?></b></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?> currentAssetsTotalFy4"><b><?php echo number_format($cTotFy4, 2); ?></b></td>
                                <td class="<?php echo $tdClass; ?> currentAssetsTotalFy5"><b><?php echo number_format($cTotFy5, 2); ?></b></td>
                            <?php } ?>
                        </tr>
                        <tr  class="clickable">
                            <td ><b>Fixed Assets</b></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <?php if ($totalYear > 3) { ?>
                                <td ></td>
                                <td ></td>
                            <?php } ?>
                        </tr>
                        <?php
                        $fTotFy1 = 0;
                        $fTotFy2 = 0;
                        $fTotFy3 = 0;
                        $fTotFy4 = 0;
                        $fTotFy5 = 0;
                        foreach ($fixedAssets as $fixedAsset) {
                            $minCls = ($fixedAsset['sign']) ? 'minusInp' : '';
                            ?>
                            <tr class="fixedAssets">
                                <td class="col-sm-2">
                                    <div class="trNameTag" >
                                        <?php echo $fixedAsset['name']; ?>
                                    </div>
                                </td>
                                <td  class="<?php echo $tdClass; ?> fixedAssetsPriceTd">
                                    <div class="trNameTag fixedAssetsFyDiv" >
                                        <?php echo number_format($fixedAsset['fy1'], 2); ?>
                                    </div>
                                </td>
                                <td  class="<?php echo $tdClass; ?> fixedAssetsPriceTd">
                                    <div class="trNameTag fixedAssetsFyDiv" >
                                        <?php echo number_format($fixedAsset['fy2'], 2); ?>
                                    </div>
                                </td>
                                <td  class="<?php echo $tdClass; ?> fixedAssetsPriceTd">
                                    <div class="trNameTag fixedAssetsFyDiv" >
                                        <?php echo number_format($fixedAsset['fy3'], 2); ?>
                                    </div>
                                </td>
                                <?php if ($totalYear > 3) { ?>
                                    <td  class="<?php echo $tdClass; ?> fixedAssetsPriceTd">
                                        <div class="trNameTag fixedAssetsFyDiv" >
                                            <?php echo number_format($fixedAsset['fy4'], 2); ?>
                                        </div>
                                    </td>
                                    <td  class="<?php echo $tdClass; ?> fixedAssetsPriceTd">
                                        <div class="trNameTag fixedAssetsFyDiv" >
                                            <?php echo number_format($fixedAsset['fy5'], 2); ?>
                                        </div>
                                    </td>
                                <?php } ?>
                            </tr>
                            <?php
                            if ($fixedAsset['sign']) {
                                $fTotFy1 -= $fixedAsset['fy1'];
                                $fTotFy2 -= $fixedAsset['fy2'];
                                $fTotFy3 -= $fixedAsset['fy3'];
                                $fTotFy4 -= $fixedAsset['fy4'];
                                $fTotFy5 -= $fixedAsset['fy5'];
                            } else {
                                $fTotFy1 += $fixedAsset['fy1'];
                                $fTotFy2 += $fixedAsset['fy2'];
                                $fTotFy3 += $fixedAsset['fy3'];
                                $fTotFy4 += $fixedAsset['fy4'];
                                $fTotFy5 += $fixedAsset['fy5'];
                            }
                        }
                        ?>
                        <tr class="clickable">
                            <td class=""><b>Total Fixed Assets</b></td>
                            <td class="<?php echo $tdClass; ?> fixedAssetsTotalFy1"><b><?php echo number_format($fTotFy1, 2); ?></b></td>
                            <td class="<?php echo $tdClass; ?> fixedAssetsTotalFy2"><b><?php echo number_format($fTotFy2, 2); ?></b></td>
                            <td class="<?php echo $tdClass; ?> fixedAssetsTotalFy3"><b><?php echo number_format($fTotFy3, 2); ?></b></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?> fixedAssetsTotalFy4"><b><?php echo number_format($fTotFy4, 2); ?></b></td>
                                <td class="<?php echo $tdClass; ?> fixedAssetsTotalFy5"><b><?php echo number_format($fTotFy5, 2); ?></b></td>
                            <?php } ?>
                        <tr  class="clickable">
                            <td><b>Other Assets</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <?php if ($totalYear > 3) { ?>
                                <td></td>
                                <td></td>
                            <?php } ?>
                        </tr>
                        </tr>
                        <?php
                        $oTotFy1 = 0;
                        $oTotFy2 = 0;
                        $oTotFy3 = 0;
                        $oTotFy4 = 0;
                        $oTotFy5 = 0;
                        foreach ($otherAssets as $otherAsset) {
                            $minCls = ($otherAsset['sign']) ? 'minusInp' : '';
                            ?>
                            <tr class="otherAssets">
                                <td class="col-sm-2">
                                    <div class="trNameTag" >
                                        <?php echo $otherAsset['name']; ?>
                                    </div>
                                </td>
                                <td  class="<?php echo $tdClass; ?> otherAssetsPriceTd">
                                    <div class="trNameTag otherAssetsFyDiv" >
                                        <?php echo number_format($otherAsset['fy1'], 2); ?>
                                    </div>
                                </td>
                                <td  class="<?php echo $tdClass; ?> otherAssetsPriceTd">
                                    <div class="trNameTag otherAssetsFyDiv" >
                                        <?php echo number_format($otherAsset['fy2'], 2); ?>
                                    </div>
                                </td>
                                <td  class="<?php echo $tdClass; ?> otherAssetsPriceTd">
                                    <div class="trNameTag otherAssetsFyDiv" >
                                        <?php echo number_format($otherAsset['fy3'], 2); ?>
                                    </div>
                                </td>
                                <?php if ($totalYear > 3) { ?>
                                    <td  class="<?php echo $tdClass; ?> otherAssetsPriceTd">
                                        <div class="trNameTag otherAssetsFyDiv" >
                                            <?php echo number_format($otherAsset['fy4'], 2); ?>
                                        </div>
                                    </td>
                                    <td  class="<?php echo $tdClass; ?> otherAssetsPriceTd">
                                        <div class="trNameTag otherAssetsFyDiv" >
                                            <?php echo number_format($otherAsset['fy5'], 2); ?>
                                        </div>
                                    </td>
                                <?php } ?>
                            </tr>
                            <?php
                            if ($otherAsset['sign']) {
                                $oTotFy1 -= $otherAsset['fy1'];
                                $oTotFy2 -= $otherAsset['fy2'];
                                $oTotFy3 -= $otherAsset['fy3'];
                                $oTotFy4 -= $otherAsset['fy4'];
                                $oTotFy5 -= $otherAsset['fy5'];
                            } else {
                                $oTotFy1 += $otherAsset['fy1'];
                                $oTotFy2 += $otherAsset['fy2'];
                                $oTotFy3 += $otherAsset['fy3'];
                                $oTotFy4 += $otherAsset['fy4'];
                                $oTotFy5 += $otherAsset['fy5'];
                            }
                        }
                        ?>
                        <tr class="clickable">
                            <td class=""><b>Total Other Assets</b></td>
                            <td class="<?php echo $tdClass; ?> otherAssetsTotalFy1"><?php echo number_format($oTotFy1, 2); ?></td>
                            <td class="<?php echo $tdClass; ?> otherAssetsTotalFy2"><?php echo number_format($oTotFy2, 2); ?></td>
                            <td class="<?php echo $tdClass; ?> otherAssetsTotalFy3"><?php echo number_format($oTotFy3, 2); ?></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?> otherAssetsTotalFy4"><?php echo number_format($oTotFy4, 2); ?></td>
                                <td class="<?php echo $tdClass; ?> otherAssetsTotalFy5"><?php echo number_format($oTotFy5, 2); ?></td>
                            <?php } ?>
                            <?php
                            $TotFy1 = $cTotFy1 + $fTotFy1 + $oTotFy1;
                            $TotFy2 = $cTotFy2 + $fTotFy2 + $oTotFy2;
                            $TotFy3 = $cTotFy3 + $fTotFy3 + $oTotFy3;
                            ?>
                        </tr>
                        <tr class="clickable">
                            <td class="col-sm-4"><b>Total Assets</b></td>
                            <td class="<?php echo $tdClass; ?>"><b class=""><?php echo number_format($TotFy1, 2); ?></b></td>
                            <td class="<?php echo $tdClass; ?>"><b class=""><?php echo number_format($TotFy2, 2); ?></b></td>
                            <td class="<?php echo $tdClass; ?>"><b class=""><?php echo number_format($TotFy3, 2); ?></b></td>
                            <?php
                            if ($totalYear > 3) {
                                $TotFy4 = $cTotFy4 + $fTotFy4 + $oTotFy4;
                                $TotFy5 = $cTotFy5 + $fTotFy5 + $oTotFy5;
                                ?>
                                <td class="<?php echo $tdClass; ?>"><b class=""><?php echo number_format($TotFy4, 2); ?></b></td>
                                <td class="<?php echo $tdClass; ?>"><b class=""><?php echo number_format($TotFy5, 2); ?></b></td>
                            <?php } ?>
                        </tr>
                        <tr  class="clickable">
                            <td><b>Liabilities</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <?php if ($totalYear > 3) { ?>
                                <td></td>
                                <td></td>
                            <?php } ?>
                        </tr>
                        <tr  class="clickable">
                            <td><b>Current Liabilities</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <?php if ($totalYear > 3) { ?>
                                <td></td>
                                <td></td>
                            <?php } ?>
                        </tr>
                        <?php
                        $cLTotFy1 = 0;
                        $cLTotFy2 = 0;
                        $cLTotFy3 = 0;
                        $cLTotFy4 = 0;
                        $cLTotFy5 = 0;
                        foreach ($currentLbAssets as $currentLbAsset) {
                            $minCls = ($currentLbAsset['sign']) ? 'minusInp' : '';
                            ?>
                            <tr class="currentLbAssets">
                                <td class="col-sm-2">
                                    <div class="trNameTag" >
                                        <?php echo $currentLbAsset['name']; ?>
                                    </div>
                                </td>
                                <td  class="<?php echo $tdClass; ?> currentLbAssetsPriceTd">
                                    <div class="trNameTag currentLbAssetsFyDiv" >
                                        <?php echo number_format($currentLbAsset['fy1'], 2); ?>
                                    </div>
                                </td>
                                <td  class="<?php echo $tdClass; ?> currentLbAssetsPriceTd">
                                    <div class="trNameTag currentLbAssetsFyDiv" >
                                        <?php echo number_format($currentLbAsset['fy2'], 2); ?>
                                    </div>
                                </td>
                                <td  class="<?php echo $tdClass; ?> currentLbAssetsPriceTd">
                                    <div class="trNameTag currentLbAssetsFyDiv" >
                                        <?php echo number_format($currentLbAsset['fy3'], 2); ?>
                                    </div>
                                </td>
                                <?php if ($totalYear > 3) { ?>
                                    <td  class="<?php echo $tdClass; ?> currentLbAssetsPriceTd">
                                        <div class="trNameTag currentLbAssetsFyDiv" >
                                            <?php echo number_format($currentLbAsset['fy4'], 2); ?>
                                        </div>
                                    </td>
                                    <td  class="<?php echo $tdClass; ?> currentLbAssetsPriceTd">
                                        <div class="trNameTag currentLbAssetsFyDiv" >
                                            <?php echo number_format($currentLbAsset['fy5'], 2); ?>
                                        </div>
                                    </td>
                                <?php } ?>
                            </tr>
                            <?php
                            if ($currentLbAsset['sign']) {
                                $cLTotFy1 -= $currentLbAsset['fy1'];
                                $cLTotFy2 -= $currentLbAsset['fy2'];
                                $cLTotFy3 -= $currentLbAsset['fy3'];
                                $cLTotFy4 -= $currentLbAsset['fy4'];
                                $cLTotFy5 -= $currentLbAsset['fy5'];
                            } else {
                                $cLTotFy1 += $currentLbAsset['fy1'];
                                $cLTotFy2 += $currentLbAsset['fy2'];
                                $cLTotFy3 += $currentLbAsset['fy3'];
                                $cLTotFy4 += $currentLbAsset['fy4'];
                                $cLTotFy5 += $currentLbAsset['fy5'];
                            }
                        }
                        ?>
                        <tr class="clickable">
                            <td class="col-sm-2"><b>Total Current Liabilities</b></td>
                            <td class="<?php echo $tdClass; ?> currentLbAssetsTotalFy1"><?php echo number_format($cLTotFy1, 2); ?></td>
                            <td class="<?php echo $tdClass; ?> currentLbAssetsTotalFy2"><?php echo number_format($cLTotFy2, 2); ?></td>
                            <td class="<?php echo $tdClass; ?> currentLbAssetsTotalFy3"><?php echo number_format($cLTotFy3, 2); ?></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?> currentLbAssetsTotalFy4"><?php echo number_format($cLTotFy4, 2); ?></td>
                                <td class="<?php echo $tdClass; ?> currentLbAssetsTotalFy5"><?php echo number_format($cLTotFy5, 2); ?></td>
                            <?php } ?>
                        </tr>
                        <tr  class="clickable">
                            <td><b>Long-Term Liabilities</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <?php if ($totalYear > 3) { ?>
                                <td></td>
                                <td></td>
                            <?php } ?>
                        </tr>
                        <?php
                        $lTTotFy1 = 0;
                        $lTTotFy2 = 0;
                        $lTTotFy3 = 0;
                        $lTTotFy4 = 0;
                        $lTTotFy5 = 0;
                        foreach ($longTermAssets as $longTermAsset) {
                            $minCls = ($longTermAsset['sign']) ? 'minusInp' : '';
                            ?>
                            <tr class="longTermAssets">
                                <td class="col-sm-2">
                                    <div class="trNameTag" >
                                        <?php echo $longTermAsset['name']; ?>
                                    </div>
                                </td>
                                <td  class="<?php echo $tdClass; ?> longTermAssetsPriceTd">
                                    <div class="trNameTag longTermAssetsFyDiv" >
                                        <?php echo number_format($longTermAsset['fy1'], 2); ?>
                                    </div>
                                </td>
                                <td  class="<?php echo $tdClass; ?> longTermAssetsPriceTd">
                                    <div class="trNameTag longTermAssetsFyDiv" >
                                        <?php echo number_format($longTermAsset['fy2'], 2); ?>
                                    </div>
                                </td>
                                <td  class="<?php echo $tdClass; ?> longTermAssetsPriceTd">
                                    <div class="trNameTag longTermAssetsFyDiv" >
                                        <?php echo number_format($longTermAsset['fy3'], 2); ?>
                                    </div>
                                </td>
                                <?php if ($totalYear > 3) { ?>
                                    <td  class="<?php echo $tdClass; ?> longTermAssetsPriceTd">
                                        <div class="trNameTag longTermAssetsFyDiv" >
                                            <?php echo number_format($longTermAsset['fy4'], 2); ?>
                                        </div>
                                    </td>
                                    <td  class="<?php echo $tdClass; ?> longTermAssetsPriceTd">
                                        <div class="trNameTag longTermAssetsFyDiv" >
                                            <?php echo number_format($longTermAsset['fy5'], 2); ?>
                                        </div>
                                    </td>
                                <?php } ?>
                            </tr>
                            <?php
                            if ($longTermAsset['sign']) {
                                $lTTotFy1 -= $longTermAsset['fy1'];
                                $lTTotFy2 -= $longTermAsset['fy2'];
                                $lTTotFy3 -= $longTermAsset['fy3'];
                                $lTTotFy4 -= $longTermAsset['fy4'];
                                $lTTotFy5 -= $longTermAsset['fy5'];
                            } else {
                                $lTTotFy1 += $longTermAsset['fy1'];
                                $lTTotFy2 += $longTermAsset['fy2'];
                                $lTTotFy3 += $longTermAsset['fy3'];
                                $lTTotFy4 += $longTermAsset['fy4'];
                                $lTTotFy5 += $longTermAsset['fy5'];
                            }
                        }
                        ?>
                        <tr class="clickable">
                            <td class="col-sm-2"><b>Total Long-Term Liabilities</b></td>
                            <td class="<?php echo $tdClass; ?> longTermAssetsTotalFy1"><?php echo number_format($lTTotFy1, 2); ?></td>
                            <td class="<?php echo $tdClass; ?> longTermAssetsTotalFy2"><?php echo number_format($lTTotFy2, 2); ?></td>
                            <td class="<?php echo $tdClass; ?> longTermAssetsTotalFy3"><?php echo number_format($lTTotFy3, 2); ?></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?> longTermAssetsTotalFy4"><?php echo number_format($lTTotFy4, 2); ?></td>
                                <td class="<?php echo $tdClass; ?> longTermAssetsTotalFy5"><?php echo number_format($lTTotFy5, 2); ?></td>
                            <?php } ?>
                        </tr>
                        <tr  class="clickable">
                            <td><b>Equity</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <?php if ($totalYear > 3) { ?>
                                <td></td>
                                <td></td>
                            <?php } ?>
                        </tr>
                        <?php
                        $eTotFy1 = 0;
                        $eTotFy2 = 0;
                        $eTotFy3 = 0;
                        $eTotFy4 = 0;
                        $eTotFy5 = 0;
                        foreach ($equityAssets as $equityAsset) {
                            $minCls = ($equityAsset['sign']) ? 'minusInp' : '';
                            ?>
                            <tr class="equityAssets">
                                <td class="col-sm-2">
                                    <div class="trNameTag" >
                                        <?php echo $equityAsset['name']; ?>
                                    </div>
                                </td>
                                <td  class="<?php echo $tdClass; ?> equityAssetsPriceTd">
                                    <div class="trNameTag equityAssetsFyDiv" >
                                        <?php echo number_format($equityAsset['fy1'], 2); ?>
                                    </div>
                                </td>
                                <td  class="<?php echo $tdClass; ?> equityAssetsPriceTd">
                                    <div class="trNameTag equityAssetsFyDiv" >
                                        <?php echo number_format($equityAsset['fy2'], 2); ?>
                                    </div>
                                </td>
                                <td  class="<?php echo $tdClass; ?> equityAssetsPriceTd">
                                    <div class="trNameTag equityAssetsFyDiv" >
                                        <?php echo number_format($equityAsset['fy3'], 2); ?>
                                    </div>
                                </td>
                                <?php if ($totalYear > 3) { ?>
                                    <td  class="<?php echo $tdClass; ?> equityAssetsPriceTd">
                                        <div class="trNameTag equityAssetsFyDiv" >
                                            <?php echo number_format($equityAsset['fy4'], 2); ?>
                                        </div>
                                    </td>
                                    <td  class="<?php echo $tdClass; ?> equityAssetsPriceTd">
                                        <div class="trNameTag equityAssetsFyDiv" >
                                            <?php echo number_format($equityAsset['fy5'], 2); ?>
                                        </div>
                                    </td>
                                <?php } ?>
                            </tr>
                            <?php
                            if ($equityAsset['sign']) {
                                $eTotFy1 -= $equityAsset['fy1'];
                                $eTotFy2 -= $equityAsset['fy2'];
                                $eTotFy3 -= $equityAsset['fy3'];
                                $eTotFy4 -= $equityAsset['fy4'];
                                $eTotFy5 -= $equityAsset['fy5'];
                            } else {
                                $eTotFy1 += $equityAsset['fy1'];
                                $eTotFy2 += $equityAsset['fy2'];
                                $eTotFy3 += $equityAsset['fy3'];
                                $eTotFy4 += $equityAsset['fy4'];
                                $eTotFy5 += $equityAsset['fy5'];
                            }
                        }
                        ?>
                        <tr class="clickable">
                            <td class="col-sm-2"><b>Total Equity</b></td>
                            <td class="<?php echo $tdClass; ?> equityAssetsTotalFy1"><?php echo number_format($eTotFy1, 2); ?></td>
                            <td class="<?php echo $tdClass; ?> equityAssetsTotalFy2"><?php echo number_format($eTotFy2, 2); ?></td>
                            <td class="<?php echo $tdClass; ?> equityAssetsTotalFy3"><?php echo number_format($eTotFy3, 2); ?></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?> equityAssetsTotalFy4"><?php echo number_format($eTotFy4, 2); ?></td>
                                <td class="<?php echo $tdClass; ?> equityAssetsTotalFy5"><?php echo number_format($eTotFy5, 2); ?></td>
                            <?php } ?>
                        </tr>
                        <?php
                        $TotFy1 = $cLTotFy1 + $lTTotFy1 + $eTotFy1;
                        $TotFy2 = $cLTotFy2 + $lTTotFy2 + $eTotFy2;
                        $TotFy3 = $cLTotFy3 + $lTTotFy3 + $eTotFy3;
                        ?>
                        <tr class="clickable">
                            <td class="col-sm-4"><b>TOTAL LIABILITIES & EQUITY</b></td>
                            <td class="<?php echo $tdClass; ?>"><b class="grantEAssetsTotalFy1"><?php echo number_format($TotFy1, 2); ?></h4></td>
                            <td class="<?php echo $tdClass; ?>"><b class="grantEAssetsTotalFy2"><?php echo number_format($TotFy2, 2); ?></h4></td>
                            <td class="<?php echo $tdClass; ?>"><b class="grantEAssetsTotalFy3"><?php echo number_format($TotFy3, 2); ?></h4></td>
                            <?php
                            if ($totalYear > 3) {
                                $TotFy4 = $cLTotFy4 + $lTTotFy4 + $eTotFy4;
                                $TotFy5 = $cLTotFy5 + $lTTotFy5 + $eTotFy5;
                                ?>
                                <td class="<?php echo $tdClass; ?>"><b class="grantEAssetsTotalFy4"><?php echo number_format($TotFy4, 2); ?></h4></td>
                                <td class="<?php echo $tdClass; ?>"><b class="grantEAssetsTotalFy5"><?php echo number_format($TotFy5, 2); ?></h4></td>
                                <?php } ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>