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
            <td class="heading_text" style="padding:3px 5px"><b>Assets</b></td>
            <td></td>
            <td></td>
            <td></td>
            <?php if ($totalYear > 3) { ?>
                <td></td>
                <td></td>
            <?php } ?>
        </tr>
        <tr style="color:#333333">
            <td class="heading_text" style="padding:3px 5px"><b>Current Assets</b></td>
            <td></td>
            <td></td>
            <td></td>
            <?php if ($totalYear > 3) { ?>
                <td></td>
                <td></td>
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
            if (($currentAsset['fy1'] != '0') || ($currentAsset['fy2'] != '0') || ($currentAsset['fy3'] != '0') || ($currentAsset['fy4'] != '0') || ($currentAsset['fy5'] != '0')) {
                ?>
                <tr>
                    <td class="value_name" style="padding:3px 5px">
                        <?php echo $currentAsset['name']; ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($currentAsset['fy1'], 2); ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($currentAsset['fy2'], 2); ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($currentAsset['fy3'], 2); ?>
                    </td>
                    <?php if ($totalYear > 3) { ?>
                        <td  class="value_text" style="padding:3px 5px">
                            <?php echo number_format($currentAsset['fy4'], 2); ?>
                        </td>
                        <td  class="value_text" style="padding:3px 5px">
                            <?php echo number_format($currentAsset['fy5'], 2); ?>
                        </td>
                    <?php } ?>
                </tr>
                <?php
            }
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
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Total Current Assets</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($cTotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($cTotFy2, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($cTotFy3, 2); ?></b></td>
            <?php if ($totalYear > 3) { ?>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($cTotFy4, 2); ?></b></td>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($cTotFy5, 2); ?></b></td>
            <?php } ?>
        </tr>
        <tr style="color:#333333">
            <td class="heading_text" style="padding:3px 5px"><b>Fixed Assets</b></td>
            <td></td>
            <td></td>
            <td></td>
            <?php if ($totalYear > 3) { ?>
                <td></td>
                <td></td>
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
            if (($fixedAsset['fy1'] != '0') || ($fixedAsset['fy2'] != '0') || ($fixedAsset['fy3'] != '0') || ($fixedAsset['fy4'] != '0') || ($fixedAsset['fy5'] != '0')) {
                ?>
                <tr>
                    <td class="value_name" style="padding:3px 5px">
                        <?php echo $fixedAsset['name']; ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($fixedAsset['fy1'], 2); ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($fixedAsset['fy2'], 2); ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($fixedAsset['fy3'], 2); ?>
                    </td>
                    <?php if ($totalYear > 3) { ?>
                        <td  class="value_text" style="padding:3px 5px">
                            <?php echo number_format($fixedAsset['fy4'], 2); ?>
                        </td>
                        <td  class="value_text" style="padding:3px 5px">
                            <?php echo number_format($fixedAsset['fy5'], 2); ?>
                        </td>
                    <?php } ?>
                </tr>
                <?php
            }
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
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Total Fixed Assets</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($fTotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($fTotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($fTotFy1, 2); ?></b></td>
            <?php if ($totalYear > 3) { ?>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($fTotFy1, 2); ?></b></td>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($fTotFy1, 2); ?></b></td>
            <?php } ?>
        </tr>



        <tr style="color:#333333">
            <td class="heading_text" style="padding:3px 5px"><b>Other Assets</b></td>
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
        foreach ($otherAssets as $otherAsset) {
            $minCls = ($otherAsset['sign']) ? 'minusInp' : '';
            if (($otherAsset['fy1'] != '0') || ($otherAsset['fy2'] != '0') || ($otherAsset['fy3'] != '0') || ($otherAsset['fy4'] != '0') || ($otherAsset['fy5'] != '0')) {
                ?>
                <tr>
                    <td class="value_name" style="padding:3px 5px">
                        <?php echo $otherAsset['name']; ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($otherAsset['fy1'], 2); ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($otherAsset['fy2'], 2); ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($otherAsset['fy3'], 2); ?>
                    </td>
                    <?php if ($totalYear > 3) { ?>
                        <td  class="value_text" style="padding:3px 5px">
                            <?php echo number_format($otherAsset['fy4'], 2); ?>
                        </td>
                        <td  class="value_text" style="padding:3px 5px">
                            <?php echo number_format($otherAsset['fy5'], 2); ?>
                        </td>
                    <?php } ?>
                </tr>
                <?php
            }
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
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Total Other Assets</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px;"><b><?php echo number_format($oTotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px;"><b><?php echo number_format($oTotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px;"><b><?php echo number_format($oTotFy1, 2); ?></b></td>
            <?php if ($totalYear > 3) { ?>
                <td class="heading_text" style="text-align: center;padding:3px 5px;"><b><?php echo number_format($oTotFy1, 2); ?></b></td>
                <td class="heading_text" style="text-align: center;padding:3px 5px;"><b><?php echo number_format($oTotFy1, 2); ?></b></td>
            <?php } ?>
            <?php
            $TotFy1 = $cTotFy1 + $fTotFy1 + $oTotFy1;
            $TotFy2 = $cTotFy2 + $fTotFy2 + $oTotFy2;
            $TotFy3 = $cTotFy3 + $fTotFy3 + $oTotFy3;
            ?>
        </tr>
        <tr style="background: #F2EFEF;">
            <td class="heading_text" style="padding:3px 5px"><b>Total Assets</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($TotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($TotFy2, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($TotFy3, 2); ?></b></td>
            <?php
            if ($totalYear > 3) {
                $TotFy4 = $cTotFy4 + $fTotFy4 + $oTotFy4;
                $TotFy5 = $cTotFy5 + $fTotFy5 + $oTotFy5;
                ?>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($TotFy4, 2); ?></b></td>
                <td class="heading_text" style="text-align: center;padding:3px 5px;"><b><?php echo number_format($TotFy5, 2); ?></b></td>
            <?php } ?>
        </tr>


        <!--liabilities-->

        <tr style="color:#333333">
            <td class="heading_text" style="padding:3px 5px"><b>Liabilities</b></td>
            <td></td>
            <td></td>
            <td></td>
            <?php if ($totalYear > 3) { ?>
                <td></td>
                <td></td>
            <?php } ?>
        </tr>
        <tr style="color:#333333">
            <td class="heading_text" style="padding:3px 5px"><b>Current Liabilities</b></td>
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
            if (($currentLbAsset['fy1'] != '0') || ($currentLbAsset['fy2'] != '0') || ($currentLbAsset['fy3'] != '0') || ($currentLbAsset['fy4'] != '0') || ($currentLbAsset['fy5'] != '0')) {
                ?>
                <tr>
                    <td class="value_name" style="padding:3px 5px">
                        <?php echo $currentLbAsset['name']; ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($currentLbAsset['fy1'], 2); ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($currentLbAsset['fy2'], 2); ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($currentLbAsset['fy3'], 2); ?>
                    </td>
                    <?php if ($totalYear > 3) { ?>
                        <td  class="value_text" style="padding:3px 5px">
                            <?php echo number_format($currentLbAsset['fy4'], 2); ?>
                        </td>
                        <td  class="value_text" style="padding:3px 5px">
                            <?php echo number_format($currentLbAsset['fy5'], 2); ?>
                        </td>
                    <?php } ?>
                </tr>
                <?php
            }
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
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Total Current Liabilities</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px;"><b><?php echo number_format($cLTotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px;"><b><?php echo number_format($cLTotFy2, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px;"><b><?php echo number_format($cLTotFy3, 2); ?></b></td>
            <?php if ($totalYear > 3) { ?>
                <td class="heading_text" style="text-align: center;padding:3px 5px;"><b><?php echo number_format($cLTotFy4, 2); ?></b></td>
                <td class="heading_text" style="text-align: center;padding:3px 5px;"><b><?php echo number_format($cLTotFy5, 2); ?></b></td>
            <?php } ?>
        </tr>
        <tr style="color:#333333">
            <td class="heading_text" style="padding:3px 5px"><b>Long-Term Liabilities</b></td>
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
            if (($longTermAsset['fy1'] != '0') || ($longTermAsset['fy2'] != '0') || ($longTermAsset['fy3'] != '0') || ($longTermAsset['fy4'] != '0') || ($longTermAsset['fy5'] != '0')) {
                ?>
                <tr>
                    <td class="value_name" style="padding:3px 5px">
                        <?php echo $longTermAsset['name']; ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($longTermAsset['fy1'], 2); ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($longTermAsset['fy2'], 2); ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($longTermAsset['fy3'], 2); ?>
                    </td>
                    <?php if ($totalYear > 3) { ?>
                        <td  class="value_text" style="padding:3px 5px">
                            <?php echo number_format($longTermAsset['fy4'], 2); ?>
                        </td>
                        <td  class="value_text" style="padding:3px 5px">
                            <?php echo number_format($longTermAsset['fy5'], 2); ?>
                        </td>
                    <?php } ?>
                </tr>
                <?php
            }
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
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Total Long-Term Liabilities</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px;"><b><?php echo number_format($lTTotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px;"><b><?php echo number_format($lTTotFy2, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px;"><b><?php echo number_format($lTTotFy3, 2); ?></b></td>
            <?php if ($totalYear > 3) { ?>
                <td class="heading_text" style="text-align: center;padding:3px 5px;"><b><?php echo number_format($lTTotFy4, 2); ?></b></td>
                <td class="heading_text" style="text-align: center;padding:3px 5px;"><b><?php echo number_format($lTTotFy5, 2); ?></b></td>
            <?php } ?>
        </tr>
        <tr style="color:#333333">
            <td class="heading_text" style="padding:3px 5px"><b>Equity</b></td>
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
            if (($equityAsset['fy1'] != '0') || ($equityAsset['fy2'] != '0') || ($equityAsset['fy3'] != '0') || ($equityAsset['fy4'] != '0') || ($equityAsset['fy5'] != '0')) {
                ?>
                <tr>
                    <td class="value_name" style="padding:3px 5px">
                        <?php echo $equityAsset['name']; ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($equityAsset['fy1'], 2); ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($equityAsset['fy2'], 2); ?>
                    </td>
                    <td  class="value_text" style="padding:3px 5px">
                        <?php echo number_format($equityAsset['fy3'], 2); ?>
                    </td>
                    <?php if ($totalYear > 3) { ?>
                        <td  class="value_text" style="padding:3px 5px">
                            <?php echo number_format($equityAsset['fy4'], 2); ?>
                        </td>
                        <td  class="value_text" style="padding:3px 5px">
                            <?php echo number_format($equityAsset['fy5'], 2); ?>
                        </td>
                    <?php } ?>
                </tr>
                <?php
            }
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
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Total Equity</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px;"><b><?php echo number_format($eTotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px;"><b><?php echo number_format($eTotFy2, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px;"><b><?php echo number_format($eTotFy3, 2); ?></b></td>
            <?php if ($totalYear > 3) { ?>
                <td class="heading_text" style="text-align: center;padding:3px 5px;"><b><?php echo number_format($eTotFy4, 2); ?></b></td>
                <td class="heading_text" style="text-align: center;padding:3px 5px;"><b><?php echo number_format($eTotFy5, 2); ?></b></td>
            <?php } ?>
        </tr>
        <?php
        $TotFy1 = $cLTotFy1 + $lTTotFy1 + $eTotFy1;
        $TotFy2 = $cLTotFy2 + $lTTotFy2 + $eTotFy2;
        $TotFy3 = $cLTotFy3 + $lTTotFy3 + $eTotFy3;
        ?>
        <tr style="background: #F2EFEF;">
            <td class="heading_text" style="padding:3px 5px"><b>TOTAL LIABILITIES & EQUITY </b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($TotFy1, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($TotFy2, 2); ?></b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($TotFy3, 2); ?></b></td>
            <?php
            if ($totalYear > 3) {
                $TotFy4 = $cTotFy4 + $fTotFy4 + $oTotFy4;
                $TotFy5 = $cTotFy5 + $fTotFy5 + $oTotFy5;
                ?>
                <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($TotFy4, 2); ?></b></td>
                <td class="heading_text" style="text-align: center;padding:3px 5px;"><b><?php echo number_format($TotFy5, 2); ?></b></td>
                    <?php } ?>
        </tr>
    </tbody>
</table>