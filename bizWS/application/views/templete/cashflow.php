<style>
    .heading_text{
        font-size: 10px;
    }
    .value_text{
        font-size:8px;
        text-align: center;
    }
    .value_name{
        font-size:8px;
    }
</style>
<table style="width:100%;">
    <thead>
        <tr style="background:#000000;">
            <th></th>
            <th class="heading_text" style="color:#ffffff;">FY01</th>
            <th class="heading_text" style="color:#ffffff;">FY02</th>
            <th class="heading_text" style="color:#ffffff;">FY03</th>
            <?php if ($totalYear > 3) { ?>
                <th class="heading_text" style="color:#ffffff;">FY04</th>
                <th class="heading_text" style="color:#ffffff;">FY05</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <tr style="color:#333333">
            <td class="heading_text" style="padding:3px 5px"><b>Beginning Cash On Hand</b></td>
            <td></td>
            <td></td>
            <td></td>
            <?php if ($totalYear > 3) { ?>
                <td></td>
                <td></td>
            <?php } ?>
        </tr>
        <?php
        $hTotFy1 = 0;
        $hTotFy2 = 0;
        $hTotFy3 = 0;
        $hTotFy4 = 0;
        $hTotFy5 = 0;
        foreach ($handcfCashflow as $handcf) {
            $minCls = ($handcf['sign']) ? 'minusInp' : '';

            $readonly = '';
            $style = '';
            if (key_exists($handcf['name'], $fHC)) {
                $readonly = 'readonly="readonly"';
                $style = 'style="display:none !important;"';
            }
            ?>
            <tr>
                <td class="value_name" style="padding:3px 5px">
                    <?php echo $handcf['name']; ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($handcf['fy1'], 2); ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($handcf['fy2'], 2); ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($handcf['fy3'], 2); ?>
                </td>
                <?php if ($totalYear > 3) { ?>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($handcf['fy4'], 2); ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($handcf['fy5'], 2); ?>
                    </td>
                <?php } ?>
            </tr>
            <?php
            if ($handcf['sign']) {
                $hTotFy1 -= $handcf['fy1'];
                $hTotFy2 -= $handcf['fy2'];
                $hTotFy3 -= $handcf['fy3'];
                $hTotFy4 -= $handcf['fy4'];
                $hTotFy5 -= $handcf['fy5'];
            } else {
                $hTotFy1 += $handcf['fy1'];
                $hTotFy2 += $handcf['fy2'];
                $hTotFy3 += $handcf['fy3'];
                $hTotFy4 += $handcf['fy4'];
                $hTotFy5 += $handcf['fy5'];
            }
        }
        ?>
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Total Beginning Cash On Hand</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($hTotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($hTotFy2, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($hTotFy3, 2); ?></b></td>
            <?php if ($totalYear > 3) { ?>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($hTotFy4, 2); ?></b></td>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($hTotFy5, 2); ?></b></td>
            <?php } ?>
        </tr>
        <tr style="color:#333333">
            <td class="heading_text" style="padding:3px 5px"><b>Cash Receipts</b></td>
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
        foreach ($receiptscfCashflow as $receiptscf) {
            $minCls = ($receiptscf['sign']) ? 'minusInp' : '';

            $readonly = '';
            $style = '';
            if (key_exists($receiptscf['name'], $fRC)) {
                $readonly = 'readonly="readonly"';
                $style = 'style="display:none !important;"';
            }
            ?>
            <tr>
                <td class="value_name" style="padding:3px 5px">
                    <?php echo $receiptscf['name']; ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($receiptscf['fy1'], 2); ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($receiptscf['fy2'], 2); ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($receiptscf['fy3'], 2); ?>
                </td>
                <?php if ($totalYear > 3) { ?>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($receiptscf['fy4'], 2); ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($receiptscf['fy5'], 2); ?>
                    </td>
                <?php } ?>
            </tr>
            <?php
            if ($receiptscf['sign']) {
                $rTotFy1 -= $receiptscf['fy1'];
                $rTotFy2 -= $receiptscf['fy2'];
                $rTotFy3 -= $receiptscf['fy3'];
                $rTotFy4 -= $receiptscf['fy4'];
                $rTotFy5 -= $receiptscf['fy5'];
            } else {
                $rTotFy1 += $receiptscf['fy1'];
                $rTotFy2 += $receiptscf['fy2'];
                $rTotFy3 += $receiptscf['fy3'];
                $rTotFy4 += $receiptscf['fy4'];
                $rTotFy5 += $receiptscf['fy5'];
            }
        }
        ?>
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Total Cash Receipts</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($rTotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($rTotFy2, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($rTotFy3, 2); ?></b></td>
            <?php if ($totalYear > 3) { ?>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($rTotFy4, 2); ?></b></td>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($rTotFy5, 2); ?></b></td>
            <?php } ?>
        </tr>
        <tr style="color:#333333">
            <td class="heading_text" style="padding:3px 5px"><b>Cash Payments</b></td>
            <td></td>
            <td></td>
            <td></td>
            <?php if ($totalYear > 3) { ?>
                <td></td>
                <td></td>
            <?php } ?>
        </tr>
        <tr style="color:#333333">
            <td class="heading_text" style="padding:3px 5px"><b>Cost of Goods Sold</b></td>
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
        foreach ($goodscfCashflow as $goodscf) {
            $minCls = ($goodscf['sign']) ? 'minusInp' : '';

            $readonly = '';
            $style = '';
            if (key_exists($goodscf['name'], $fGC)) {
                $readonly = 'readonly="readonly"';
                $style = 'style="display:none !important;"';
            }
            ?>
            <tr>
                <td class="value_name" style="padding:3px 5px">
                    <?php echo $goodscf['name']; ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($goodscf['fy1'], 2); ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($goodscf['fy2'], 2); ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($goodscf['fy3'], 2); ?>
                </td>
                <?php if ($totalYear > 3) { ?>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($goodscf['fy4'], 2); ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($goodscf['fy5'], 2); ?>
                    </td>
                <?php } ?>
            </tr>
            <?php
            if ($goodscf['sign']) {
                $gTotFy1 -= $goodscf['fy1'];
                $gTotFy2 -= $goodscf['fy2'];
                $gTotFy3 -= $goodscf['fy3'];
                $gTotFy4 -= $goodscf['fy4'];
                $gTotFy5 -= $goodscf['fy5'];
            } else {
                $gTotFy1 += $goodscf['fy1'];
                $gTotFy2 += $goodscf['fy2'];
                $gTotFy3 += $goodscf['fy3'];
                $gTotFy4 += $goodscf['fy4'];
                $gTotFy5 += $goodscf['fy5'];
            }
        }
        ?>
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Total Cost of Goods Sold</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($gTotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($gTotFy2, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($gTotFy3, 2); ?></b></td>
            <?php if ($totalYear > 3) { ?>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($gTotFy4, 2); ?></b></td>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($gTotFy5, 2); ?></b></td>
            <?php } ?>
        </tr>
        <tr style="color:#333333">
            <td class="heading_text" style="padding:3px 5px"><b>Operating Expenses</b></td>
            <td></td>
            <td></td>
            <td></td>
            <?php if ($totalYear > 3) { ?>
                <td></td>
                <td></td>
            <?php } ?>
        </tr>
        <?php
        $opTotFy1 = 0;
        $opTotFy2 = 0;
        $opTotFy3 = 0;
        $opTotFy4 = 0;
        $opTotFy5 = 0;
        foreach ($operatingcfCashflow as $operatingcf) {
            $minCls = ($operatingcf['sign']) ? 'minusInp' : '';

            $readonly = '';
            $style = '';
            if (key_exists($operatingcf['name'], $fOPC)) {
                $readonly = 'readonly="readonly"';
                $style = 'style="display:none !important;"';
            }
            ?>
            <tr>
                <td class="value_name" style="padding:3px 5px">
                    <?php echo $operatingcf['name']; ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($operatingcf['fy1'], 2); ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($operatingcf['fy2'], 2); ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($operatingcf['fy3'], 2); ?>
                </td>
                <?php if ($totalYear > 3) { ?>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($operatingcf['fy4'], 2); ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($operatingcf['fy5'], 2); ?>
                    </td>
                <?php } ?>
            </tr>
            <?php
            if ($operatingcf['sign']) {
                $opTotFy1 -= $operatingcf['fy1'];
                $opTotFy2 -= $operatingcf['fy2'];
                $opTotFy3 -= $operatingcf['fy3'];
                $opTotFy4 -= $operatingcf['fy4'];
                $opTotFy5 -= $operatingcf['fy5'];
            } else {
                $opTotFy1 += $operatingcf['fy1'];
                $opTotFy2 += $operatingcf['fy2'];
                $opTotFy3 += $operatingcf['fy3'];
                $opTotFy4 += $operatingcf['fy4'];
                $opTotFy5 += $operatingcf['fy5'];
            }
        }
        ?>
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Total Operating Expenses</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($opTotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($opTotFy2, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($opTotFy3, 2); ?></b></td>
            <?php if ($totalYear > 3) { ?>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($opTotFy4, 2); ?></b></td>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($opTotFy5, 2); ?></b></td>
            <?php } ?>
        </tr>
        <tr style="color:#333333">
            <td class="heading_text" style="padding:3px 5px"><b>Other Expense Payments</b></td>
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
        foreach ($othercfCashflow as $othercf) {
            $minCls = ($othercf['sign']) ? 'minusInp' : '';

            $readonly = '';
            $style = '';
            if (key_exists($othercf['name'], $fOC)) {
                $readonly = 'readonly="readonly"';
                $style = 'style="display:none !important;"';
            }
            ?>
            <tr>
                <td class="value_name" style="padding:3px 5px">
                    <?php echo $othercf['name']; ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($othercf['fy1'], 2); ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($othercf['fy2'], 2); ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($othercf['fy3'], 2); ?>
                </td>
                <?php if ($totalYear > 3) { ?>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($othercf['fy4'], 2); ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($othercf['fy5'], 2); ?>
                    </td>
                <?php } ?>
            </tr>
            <?php
            if ($othercf['sign']) {
                $oTotFy1 -= $othercf['fy1'];
                $oTotFy2 -= $othercf['fy2'];
                $oTotFy3 -= $othercf['fy3'];
                $oTotFy4 -= $othercf['fy4'];
                $oTotFy5 -= $othercf['fy5'];
            } else {
                $oTotFy1 += $othercf['fy1'];
                $oTotFy2 += $othercf['fy2'];
                $oTotFy3 += $othercf['fy3'];
                $oTotFy4 += $othercf['fy4'];
                $oTotFy5 += $othercf['fy5'];
            }
        }
        ?>
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Total Other Expense Payments</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($oTotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($oTotFy2, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($oTotFy3, 2); ?></b></td>
            <?php if ($totalYear > 3) { ?>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($oTotFy4, 2); ?></b></td>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($oTotFy5, 2); ?></b></td>
            <?php } ?>
        </tr>
        <?php
        $TotFy1 = $gTotFy1 + $opTotFy1 + $oTotFy1;
        $TotFy2 = $gTotFy2 + $opTotFy2 + $oTotFy2;
        $TotFy3 = $gTotFy3 + $opTotFy3 + $oTotFy3;
        ?>
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Total Other Expense Payments</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($TotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($TotFy2, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($TotFy3, 2); ?></b></td>
            <?php
            if ($totalYear > 3) {
                $TotFy4 = $gTotFy4 + $opTotFy4 + $oTotFy4;
                $TotFy5 = $gTotFy5 + $opTotFy5 + $oTotFy5;
                ?>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($TotFy4, 2); ?></b></td>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($TotFy5, 2); ?></b></td>
            <?php } ?>
        </tr>
        <?php
        $NCTotFy1 = $rTotFy1 - $TotFy1;
        $NCTotFy2 = $rTotFy2 - $TotFy2;
        $NCTotFy3 = $rTotFy3 - $TotFy3;
        ?>
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Net Cash Change - Inflow (Outflow)</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($NCTotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($NCTotFy2, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($NCTotFy3, 2); ?></b></td>
            <?php
            if ($totalYear > 3) {
                $NCTotFy4 = $rTotFy4 - $TotFy4;
                $NCTotFy5 = $rTotFy5 - $TotFy5;
                ?>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($NCTotFy4, 2); ?></b></td>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($NCTotFy5, 2); ?></b></td>
            <?php } ?>
        </tr>
        <?php
        $CPTotFy1 = $hTotFy1 + $NCTotFy1;
        $CPTotFy2 = $hTotFy2 + $NCTotFy2;
        $CPTotFy3 = $hTotFy3 + $NCTotFy3;
        ?>
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Cash Position</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($CPTotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($CPTotFy2, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($CPTotFy3, 2); ?></b></td>
            <?php
            if ($totalYear > 3) {
                $CPTotFy4 = $hTotFy4 + $NCTotFy4;
                $CPTotFy5 = $hTotFy5 + $NCTotFy5;
                ?>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($CPTotFy4, 2); ?></b></td>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($CPTotFy5, 2); ?></b></td>
                    <?php } ?>
        </tr>
    </tbody>
</table>