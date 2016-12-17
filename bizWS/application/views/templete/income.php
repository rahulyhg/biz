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
            <td class="heading_text" style="padding:3px 5px"><b>Revenues</b></td>
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
            <tr>
                <td class="value_name" style="padding:3px 5px">
                    <?php echo $revenues['name']; ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($revenues['fy1'], 2); ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($revenues['fy2'], 2); ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($revenues['fy3'], 2); ?>
                </td>
                <?php if ($totalYear > 3) { ?>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($revenues['fy4'], 2); ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($revenues['fy5'], 2); ?>
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
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Total Revenues</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($rTotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($rTotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($rTotFy1, 2); ?></b></td>
            <?php if ($totalYear > 3) { ?>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($rTotFy1, 2); ?></b></td>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($rTotFy1, 2); ?></b></td>
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
        foreach ($goodsStatement as $goods) {
            $minCls = ($goods['sign']) ? 'minusInp' : '';

            $readonly = '';
            $style = '';
            if (key_exists($goods['name'], $fGS)) {
                $readonly = 'readonly="readonly"';
                $style = 'style="display:none !important;"';
            }
            ?>
            <tr>
                <td class="value_name" style="padding:3px 5px">
                    <?php echo $goods['name']; ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($goods['fy1'], 2); ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($goods['fy2'], 2); ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($goods['fy3'], 2); ?>
                </td>
                <?php if ($totalYear > 3) { ?>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($goods['fy4'], 2); ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($goods['fy5'], 2); ?>
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
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Total Cost of Goods Sold</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($gTotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($gTotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($gTotFy1, 2); ?></b></td>
            <?php if ($totalYear > 3) { ?>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($gTotFy1, 2); ?></b></td>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($gTotFy1, 2); ?></b></td>
            <?php } ?>
        </tr>
        <?php
        $TotFy1 = $rTotFy1 - $gTotFy1;
        $TotFy2 = $rTotFy2 - $gTotFy2;
        $TotFy3 = $rTotFy3 - $gTotFy3;
        ?>
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Gross Profit or Loss</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($TotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($TotFy2, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($TotFy3, 2); ?></b></td>
            <?php
            if ($totalYear > 3) {
                $TotFy4 = $rTotFy4 - $gTotFy4;
                $TotFy5 = $rTotFy5 - $gTotFy5;
                ?>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($TotFy4, 2); ?></b></td>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($TotFy5, 2); ?></b></td>
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
            <tr>
                <td class="value_name" style="padding:3px 5px">
                    <?php echo $operating['name']; ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($operating['fy1'], 2); ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($operating['fy2'], 2); ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($operating['fy3'], 2); ?>
                </td>
                <?php if ($totalYear > 3) { ?>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($operating['fy4'], 2); ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($operating['fy5'], 2); ?>
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
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Total Operating Expenses</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($oTotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($oTotFy2, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($oTotFy3, 2); ?></b></td>
            <?php if ($totalYear > 3) { ?>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($oTotFy4, 2); ?></b></td>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($oTotFy5, 2); ?></b></td>
            <?php } ?>
        </tr>
        <?php
        $opTotFy1 = $TotFy1 - $oTotFy1;
        $opTotFy2 = $TotFy2 - $oTotFy2;
        $opTotFy3 = $TotFy3 - $oTotFy3;
        ?>
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Operating Profit or Loss</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($opTotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($opTotFy2, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($opTotFy3, 2); ?></b></td>
            <?php
            if ($totalYear > 3) {
                $opTotFy4 = $TotFy4 - $oTotFy4;
                $opTotFy5 = $TotFy5 - $oTotFy5;
                ?>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($opTotFy4, 2); ?></b></td>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($opTotFy5, 2); ?></b></td>
            <?php } ?>
        </tr>
        <tr style="color:#333333">
            <td class="heading_text" style="padding:3px 5px"><b>Interest (Income), Expense & Taxes</b></td>
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
            <tr>
                <td class="value_name" style="padding:3px 5px">
                    <?php echo $interest['name']; ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($interest['fy1'], 2); ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($interest['fy2'], 2); ?>
                </td>
                <td  class="value_text" style="padding:3px 5px">
                    <?php echo number_format($interest['fy3'], 2); ?>
                </td>
                <?php if ($totalYear > 3) { ?>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($interest['fy4'], 2); ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($interest['fy5'], 2); ?>
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
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Total Interest (Income), Expense & Taxes</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($iTotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($iTotFy2, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($iTotFy3, 2); ?></b></td>
            <?php if ($totalYear > 3) { ?>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($iTotFy4, 2); ?></b></td>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($iTotFy5, 2); ?></b></td>
            <?php } ?>
        </tr>
        <?php
        $niTotFy1 = $opTotFy1 - $iTotFy1;
        $niTotFy2 = $opTotFy2 - $iTotFy2;
        $niTotFy3 = $opTotFy3 - $iTotFy3;
        ?>
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Net Income (Loss)</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($niTotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($niTotFy2, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($niTotFy3, 2); ?></b></td>
            <?php
            if ($totalYear > 3) {
                $niTotFy4 = $opTotFy4 - $iTotFy4;
                $niTotFy5 = $opTotFy5 - $iTotFy5;
                ?>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($niTotFy4, 2); ?></b></td>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($niTotFy5, 2); ?></b></td>
                    <?php } ?>
        </tr>
    </tbody>
</table>