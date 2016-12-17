<div class="balance_sheet">
    <h3><b></b></h3>
    <!--Income Profit and Loss Statement-->
    <div class="col-md-12 ">
        <div class="">
            <div class="table_1">
                <table class="table table-responsive table-hover forecast_view">
                    <thead>
                        <tr class="text-center">
                            <th>Name</th>
                            <th class="<?php echo $tdClass; ?>">FY01</th>
                            <th class="<?php echo $tdClass; ?>">FY02</th>
                            <th class="<?php echo $tdClass; ?>">FY03</th>
                            <?php if ($totalYear > 3) { ?>
                                <th class="<?php echo $tdClass; ?>">FY04</th>
                                <th class="<?php echo $tdClass; ?>">FY05</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><b>Revenues</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <?php if ($totalYear > 3) { ?>
                                <td></td>
                                <td></td>
                            <?php } ?>
                        </tr>
                        <?php
                        $rTotFy1 = 0;
                        $rTotFy2 = 0;
                        $rTotFy3 = 0;
                        $rTotFy4 = 0;
                        $rTotFy5 = 0;
                        foreach ($revenuesStatement as $revenues) {
                            $minCls = ($revenues['sign']) ? 'minusInp' : '';

                            $readonly = '';
                            $style = '';
                            if (key_exists($revenues['name'], $fRS)) {
                                $readonly = 'readonly="readonly"';
                                $style = 'style="display:none !important;"';
                            }
                            ?>
                            <tr class="revenuesStatement">
                                <td class="col-sm-2">
                                    <div class="trNameTag" >
                                        <?php echo $revenues['name']; ?>
                                    </div>
                                </td>
                                <td class="<?php echo $tdClass; ?> revenuesStatementPriceTd">
                                    <div class="trNameTag revenuesStatementFyDiv" >
                                        <?php echo number_format($revenues['fy1'], 2); ?>
                                    </div>
                                </td>
                                <td class="<?php echo $tdClass; ?> revenuesStatementPriceTd">
                                    <div class="trNameTag revenuesStatementFyDiv" >
                                        <?php echo number_format($revenues['fy2'], 2); ?>
                                    </div>
                                </td>
                                <td class="<?php echo $tdClass; ?> revenuesStatementPriceTd">
                                    <div class="trNameTag revenuesStatementFyDiv" >
                                        <?php echo number_format($revenues['fy3'], 2); ?>
                                    </div>
                                </td>
                                <?php if ($totalYear > 3) { ?>
                                    <td class="<?php echo $tdClass; ?> revenuesStatementPriceTd">
                                        <div class="trNameTag revenuesStatementFyDiv" >
                                            <?php echo number_format($revenues['fy4'], 2); ?>
                                        </div>
                                    </td>
                                    <td class="<?php echo $tdClass; ?> revenuesStatementPriceTd">
                                        <div class="trNameTag revenuesStatementFyDiv" >
                                            <?php echo number_format($revenues['fy5'], 2); ?>
                                        </div>
                                    </td>
                                <?php } ?>
                            </tr>
                            <?php
                            if ($revenues['sign']) {
                                $rTotFy1 -= $revenues['fy1'];
                                $rTotFy2 -= $revenues['fy2'];
                                $rTotFy3 -= $revenues['fy3'];
                                $rTotFy4 -= $revenues['fy4'];
                                $rTotFy5 -= $revenues['fy5'];
                            } else {
                                $rTotFy1 += $revenues['fy1'];
                                $rTotFy2 += $revenues['fy2'];
                                $rTotFy3 += $revenues['fy3'];
                                $rTotFy4 += $revenues['fy4'];
                                $rTotFy5 += $revenues['fy5'];
                            }
                        }
                        ?>
                        <tr class="clickable">
                            <td class="col-sm-2"><b>Total Revenues</b></td>
                            <td class="<?php echo $tdClass; ?> revenuesStatementTotalFy1"><?php echo number_format($rTotFy1, 2); ?></td>
                            <td class="<?php echo $tdClass; ?> revenuesStatementTotalFy2"><?php echo number_format($rTotFy2, 2); ?></td>
                            <td class="<?php echo $tdClass; ?> revenuesStatementTotalFy3"><?php echo number_format($rTotFy3, 2); ?></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?> revenuesStatementTotalFy4"><?php echo number_format($rTotFy4, 2); ?></td>
                                <td class="<?php echo $tdClass; ?> revenuesStatementTotalFy5"><?php echo number_format($rTotFy5, 2); ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td><b>Cost of Goods Sold</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <?php if ($totalYear > 3) { ?>
                                <td></td>
                                <td></td>
                            <?php } ?>
                        </tr>
                        <?php
                        $gTotFy1 = 0;
                        $gTotFy2 = 0;
                        $gTotFy3 = 0;
                        $gTotFy4 = 0;
                        $gTotFy5 = 0;
                        foreach ($goodsStatement as $goods) {
                            $minCls = ($goods['sign']) ? 'minusInp' : '';

                            $readonly = '';
                            $style = '';
                            if (key_exists($goods['name'], $fGS)) {
                                $readonly = 'readonly="readonly"';
                                $style = 'style="display:none !important;"';
                            }
                            ?>
                            <tr class="goodsStatement">
                                <td class="col-sm-2">
                                    <div class="trNameTag" >
                                        <?php echo $goods['name']; ?>
                                    </div>
                                </td>
                                <td class="<?php echo $tdClass; ?> goodsStatementPriceTd">
                                    <div class="trNameTag goodsStatementFyDiv" >
                                        <?php echo number_format($goods['fy1'], 2); ?>
                                    </div>
                                </td>
                                <td class="<?php echo $tdClass; ?> goodsStatementPriceTd">
                                    <div class="trNameTag goodsStatementFyDiv" >
                                        <?php echo number_format($goods['fy2'], 2); ?>
                                    </div>
                                </td>
                                <td class="<?php echo $tdClass; ?> goodsStatementPriceTd">
                                    <div class="trNameTag goodsStatementFyDiv" >
                                        <?php echo number_format($goods['fy3'], 2); ?>
                                    </div>
                                </td>
                                <?php if ($totalYear > 3) { ?>
                                    <td class="<?php echo $tdClass; ?> goodsStatementPriceTd">
                                        <div class="trNameTag goodsStatementFyDiv" >
                                            <?php echo number_format($goods['fy4'], 2); ?>
                                        </div>
                                    </td>
                                    <td class="<?php echo $tdClass; ?> goodsStatementPriceTd">
                                        <div class="trNameTag goodsStatementFyDiv" >
                                            <?php echo number_format($goods['fy5'], 2); ?>
                                        </div>
                                    </td>
                                <?php } ?>
                            </tr>
                            <?php
                            if ($goods['sign']) {
                                $gTotFy1 -= $goods['fy1'];
                                $gTotFy2 -= $goods['fy2'];
                                $gTotFy3 -= $goods['fy3'];
                                $gTotFy4 -= $goods['fy4'];
                                $gTotFy5 -= $goods['fy5'];
                            } else {
                                $gTotFy1 += $goods['fy1'];
                                $gTotFy2 += $goods['fy2'];
                                $gTotFy3 += $goods['fy3'];
                                $gTotFy4 += $goods['fy4'];
                                $gTotFy5 += $goods['fy5'];
                            }
                        }
                        ?>
                        <tr class="clickable">
                            <td class="col-sm-2"><b>Total Cost of Goods Sold</b></td>
                            <td class="<?php echo $tdClass; ?> goodsStatementTotalFy1"><?php echo number_format($gTotFy1, 2); ?></td>
                            <td class="<?php echo $tdClass; ?> goodsStatementTotalFy2"><?php echo number_format($gTotFy2, 2); ?></td>
                            <td class="<?php echo $tdClass; ?> goodsStatementTotalFy3"><?php echo number_format($gTotFy3, 2); ?></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?> goodsStatementTotalFy4"><?php echo number_format($gTotFy4, 2); ?></td>
                                <td class="<?php echo $tdClass; ?> goodsStatementTotalFy5"><?php echo number_format($gTotFy5, 2); ?></td>
                            <?php } ?>
                        </tr>
                        <?php
                        $TotFy1 = $rTotFy1 - $gTotFy1;
                        $TotFy2 = $rTotFy2 - $gTotFy2;
                        $TotFy3 = $rTotFy3 - $gTotFy3;
                        ?>
                        <tr class="clickable">
                            <td class="col-sm-4"><b>Gross Profit (Loss)</b></td>
                            <td class="<?php echo $tdClass; ?>"><b class="grantStatementTotalFy1"><?php echo number_format($TotFy1, 2); ?></b></td>
                            <td class="<?php echo $tdClass; ?>"><b class="grantStatementTotalFy2"><?php echo number_format($TotFy2, 2); ?></b></td>
                            <td class="<?php echo $tdClass; ?>"><b class="grantStatementTotalFy3"><?php echo number_format($TotFy3, 2); ?></b></td>
                            <?php
                            if ($totalYear > 3) {
                                $TotFy4 = $rTotFy4 - $gTotFy4;
                                $TotFy5 = $rTotFy5 - $gTotFy5;
                                ?>
                                <td class="<?php echo $tdClass; ?>"><b class="grantStatementTotalFy4"><?php echo number_format($TotFy4, 2); ?></b></td>
                                <td class="<?php echo $tdClass; ?>"><b class="grantStatementTotalFy5"><?php echo number_format($TotFy5, 2); ?></b></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td><b>Operating Expenses</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <?php if ($totalYear > 3) { ?>
                                <td></td>
                                <td></td>
                            <?php } ?>
                        </tr>
                        <?php
                        $oTotFy1 = 0;
                        $oTotFy2 = 0;
                        $oTotFy3 = 0;
                        $oTotFy4 = 0;
                        $oTotFy5 = 0;
                        foreach ($operatingStatement as $operating) {
                            $minCls = ($operating['sign']) ? 'minusInp' : '';

                            $readonly = '';
                            $style = '';
                            if (key_exists($operating['name'], $fOS)) {
                                $readonly = 'readonly="readonly"';
                                $style = 'style="display:none !important;"';
                            }
                            ?>
                            <tr class="operatingStatement">
                                <td class="col-sm-2">
                                    <div class="trNameTag" >
                                        <?php echo $operating['name']; ?>
                                    </div>
                                </td>
                                <td class="<?php echo $tdClass; ?> operatingStatementPriceTd">
                                    <div class="trNameTag operatingStatementFyDiv" >
                                        <?php echo number_format($operating['fy1'], 2); ?>
                                    </div>
                                </td>
                                <td class="<?php echo $tdClass; ?> operatingStatementPriceTd">
                                    <div class="trNameTag operatingStatementFyDiv" >
                                        <?php echo number_format($operating['fy2'], 2); ?>
                                    </div>
                                </td>
                                <td class="<?php echo $tdClass; ?> operatingStatementPriceTd">
                                    <div class="trNameTag operatingStatementFyDiv" >
                                        <?php echo number_format($operating['fy3'], 2); ?>
                                    </div>
                                </td>
                                <?php if ($totalYear > 3) { ?>
                                    <td class="<?php echo $tdClass; ?> operatingStatementPriceTd">
                                        <div class="trNameTag operatingStatementFyDiv" >
                                            <?php echo number_format($operating['fy4'], 2); ?>
                                        </div>
                                    </td>
                                    <td class="<?php echo $tdClass; ?> operatingStatementPriceTd">
                                        <div class="trNameTag operatingStatementFyDiv" >
                                            <?php echo number_format($operating['fy5'], 2); ?>
                                        </div>
                                    </td>
                                <?php } ?>
                            </tr>
                            <?php
                            if ($operating['sign']) {
                                $oTotFy1 -= $operating['fy1'];
                                $oTotFy2 -= $operating['fy2'];
                                $oTotFy3 -= $operating['fy3'];
                                $oTotFy4 -= $operating['fy4'];
                                $oTotFy5 -= $operating['fy5'];
                            } else {
                                $oTotFy1 += $operating['fy1'];
                                $oTotFy2 += $operating['fy2'];
                                $oTotFy3 += $operating['fy3'];
                                $oTotFy4 += $operating['fy4'];
                                $oTotFy5 += $operating['fy5'];
                            }
                        }
                        ?>
                        <tr class="clickable">
                            <td class="col-sm-2"><b>Total Operating Expenses</b></td>
                            <td class="<?php echo $tdClass; ?> operatingStatementTotalFy1"><?php echo number_format($oTotFy1, 2); ?></td>
                            <td class="<?php echo $tdClass; ?> operatingStatementTotalFy2"><?php echo number_format($oTotFy2, 2); ?></td>
                            <td class="<?php echo $tdClass; ?> operatingStatementTotalFy3"><?php echo number_format($oTotFy3, 2); ?></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?> operatingStatementTotalFy4"><?php echo number_format($oTotFy4, 2); ?></td>
                                <td class="<?php echo $tdClass; ?> operatingStatementTotalFy5"><?php echo number_format($oTotFy5, 2); ?></td>
                            <?php } ?>
                        </tr>
                        <?php
                        $opTotFy1 = $TotFy1 - $oTotFy1;
                        $opTotFy2 = $TotFy2 - $oTotFy2;
                        $opTotFy3 = $TotFy3 - $oTotFy3;
                        ?>
                        <tr class="clickable">
                            <td class="col-sm-4"><b>Operating Profit (Loss)</b></td>
                            <td class="<?php echo $tdClass; ?>"><b class="grantOPStatementTotalFy1"><?php echo number_format($opTotFy1, 2); ?></b></td>
                            <td class="<?php echo $tdClass; ?>"><b class="grantOPStatementTotalFy2"><?php echo number_format($opTotFy2, 2); ?></b></td>
                            <td class="<?php echo $tdClass; ?>"><b class="grantOPStatementTotalFy3"><?php echo number_format($opTotFy3, 2); ?></b></td>
                            <?php
                            if ($totalYear > 3) {
                                $opTotFy4 = $TotFy4 - $oTotFy4;
                                $opTotFy5 = $TotFy5 - $oTotFy5;
                                ?>
                                <td class="<?php echo $tdClass; ?>"><b class="grantOPStatementTotalFy4"><?php echo number_format($opTotFy4, 2); ?></b></td>
                                <td class="<?php echo $tdClass; ?>"><b class="grantOPStatementTotalFy5"><?php echo number_format($opTotFy5, 2); ?></b></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td><b>Interest (Income), Expense & Taxes</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <?php if ($totalYear > 3) { ?>
                                <td></td>
                                <td></td>
                            <?php } ?>
                        </tr>
                        <?php
                        $iTotFy1 = 0;
                        $iTotFy2 = 0;
                        $iTotFy3 = 0;
                        $iTotFy4 = 0;
                        $iTotFy5 = 0;
                        foreach ($interestStatement as $interest) {
                            $minCls = ($interest['sign']) ? 'minusInp' : '';

                            $readonly = '';
                            $style = '';
                            if (key_exists($interest['name'], $fIS)) {
                                $readonly = 'readonly="readonly"';
                                $style = 'style="display:none !important;"';
                            }
                            ?>
                            <tr class="interestStatement">
                                <td class="col-sm-2">
                                    <div class="trNameTag" >
                                        <?php echo $interest['name']; ?>
                                    </div>
                                </td>
                                <td class="<?php echo $tdClass; ?> interestStatementPriceTd">
                                    <div class="trNameTag interestStatementFyDiv" >
                                        <?php echo number_format($interest['fy1'], 2); ?>
                                    </div>
                                </td>
                                <td class="<?php echo $tdClass; ?> interestStatementPriceTd">
                                    <div class="trNameTag interestStatementFyDiv" >
                                        <?php echo number_format($interest['fy2'], 2); ?>
                                    </div>
                                </td>
                                <td class="<?php echo $tdClass; ?> interestStatementPriceTd">
                                    <div class="trNameTag interestStatementFyDiv" >
                                        <?php echo number_format($interest['fy3'], 2); ?>
                                    </div>
                                </td>
                                <?php if ($totalYear > 3) { ?>
                                    <td class="<?php echo $tdClass; ?> interestStatementPriceTd">
                                        <div class="trNameTag interestStatementFyDiv" >
                                            <?php echo number_format($interest['fy4'], 2); ?>
                                        </div>
                                    </td>
                                    <td class="<?php echo $tdClass; ?> interestStatementPriceTd">
                                        <div class="trNameTag interestStatementFyDiv" >
                                            <?php echo number_format($interest['fy5'], 2); ?>
                                        </div>
                                    </td>
                                <?php } ?>
                            </tr>
                            <?php
                            if ($interest['sign']) {
                                $iTotFy1 -= $interest['fy1'];
                                $iTotFy2 -= $interest['fy2'];
                                $iTotFy3 -= $interest['fy3'];
                                $iTotFy4 -= $interest['fy4'];
                                $iTotFy5 -= $interest['fy5'];
                            } else {
                                $iTotFy1 += $interest['fy1'];
                                $iTotFy2 += $interest['fy2'];
                                $iTotFy3 += $interest['fy3'];
                                $iTotFy4 += $interest['fy4'];
                                $iTotFy5 += $interest['fy5'];
                            }
                        }
                        ?>
                        <tr class="clickable">
                            <td class="col-sm-2"><b>Total Interest (Income), Expense & Taxes</b></td>
                            <td class="<?php echo $tdClass; ?> interestStatementTotalFy1"><?php echo number_format($iTotFy1, 2); ?></td>
                            <td class="<?php echo $tdClass; ?> interestStatementTotalFy2"><?php echo number_format($iTotFy2, 2); ?></td>
                            <td class="<?php echo $tdClass; ?> interestStatementTotalFy3"><?php echo number_format($iTotFy3, 2); ?></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?> interestStatementTotalFy4"><?php echo number_format($iTotFy4, 2); ?></td>
                                <td class="<?php echo $tdClass; ?> interestStatementTotalFy5"><?php echo number_format($iTotFy5, 2); ?></td>
                            <?php } ?>
                        </tr>
                        <?php
                        $niTotFy1 = $opTotFy1 - $iTotFy1;
                        $niTotFy2 = $opTotFy2 - $iTotFy2;
                        $niTotFy3 = $opTotFy3 - $iTotFy3;
                        ?>
                        <tr class="clickable">
                            <td class="col-sm-4"><b>Net Income (Loss)</b></td>
                            <td class="<?php echo $tdClass; ?>"><b class="grantNIStatementTotalFy1"><?php echo number_format($niTotFy1, 2); ?></b></td>
                            <td class="<?php echo $tdClass; ?>"><b class="grantNIStatementTotalFy2"><?php echo number_format($niTotFy2, 2); ?></b></td>
                            <td class="<?php echo $tdClass; ?>"><b class="grantNIStatementTotalFy3"><?php echo number_format($niTotFy3, 2); ?></b></td>
                            <?php
                            if ($totalYear > 3) {
                                $niTotFy4 = $opTotFy4 - $iTotFy4;
                                $niTotFy5 = $opTotFy5 - $iTotFy5;
                                ?>
                                <td class="<?php echo $tdClass; ?>"><b class="grantNIStatementTotalFy4"><?php echo number_format($niTotFy4, 2); ?></b></td>
                                <td class="<?php echo $tdClass; ?>"><b class="grantNIStatementTotalFy5"><?php echo number_format($niTotFy5, 2); ?></b></td>
                                <?php } ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>