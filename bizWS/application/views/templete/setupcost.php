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
            <th class="heading_text" style="color:#ffffff;">Name</th>
            <th class="heading_text" style="color:#ffffff;">Price</th>
        </tr>
    </thead>
    <tbody>
        <tr style="color:#333333">
            <td class="heading_text" style="padding:3px 5px"><b>Setting up the business</b></td>
            <td></td>
        </tr>
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
            <tr>
                <td class="value_name" style="padding:3px 5px">
                    <?php echo $business['name']; ?>
                </td>
                <td class="value_text" style="padding:3px 5px;">
                    <?php echo number_format($business['price'], 2); ?>
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
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Total Setting up the business</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($bTotPrice, 2); ?></b></td>
        </tr>
        <tr style="color:#333333">
            <td class="heading_text" style="padding:3px 5px"><b>Setting up the premises</b></td>
            <td></td>
        </tr>
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
            <tr>
                <td class="value_name" style="padding:3px 5px">
                    <?php echo $premises['name']; ?>
                </td>
                <td class="value_text" style="padding:3px 5px;">
                    <?php echo number_format($premises['price'], 2); ?>
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
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Total Setting up the premises</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($pTotPrice, 2); ?></b></td>
        </tr>
        <tr style="color:#333333">
            <td class="heading_text" style="padding:3px 5px"><b>Plant and Equipment</b></td>
            <td></td>
        </tr>
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
            <tr>
                <td class="value_name" style="padding:3px 5px">
                    <?php echo $equipment['name']; ?>
                </td>
                <td class="value_text" style="padding:3px 5px;">
                    <?php echo number_format($equipment['price'], 2); ?>
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
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Total Plant and Equipment</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($eTotPrice, 2); ?></b></td>
        </tr>
        <tr style="color:#333333">
            <td class="heading_text" style="padding:3px 5px"><b>Starting operations</b></td>
            <td></td>
        </tr>
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
            <tr>
                <td class="value_name" style="padding:3px 5px">
                    <?php echo $operations['name']; ?>
                </td>
                <td class="value_text" style="padding:3px 5px;">
                    <?php echo number_format($operations['price'], 2); ?>
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
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Total Starting operations</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($oTotPrice, 2); ?></b></td>
        </tr>
        <tr style="color:#333333">
            <td class="heading_text" style="padding:3px 5px"><b>Startup Capital</b></td>
            <td></td>
        </tr>
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
            <tr>
                <td class="value_name" style="padding:3px 5px">
                    <?php echo $capital['name']; ?>
                </td>
                <td class="value_text" style="padding:3px 5px;">
                    <?php echo number_format($capital['price'], 2); ?>
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
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Total Startup Capital</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($cTotPrice, 2); ?></b></td>
        </tr>
        <?php
        $TotPrice = $bTotPrice + $pTotPrice + $eTotPrice + $oTotPrice;
        ?>
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Total Setup costs</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($TotPrice, 2); ?></b></td>
        </tr>
        <?php
        $STotPrice = $cTotPrice - $TotPrice;
        $STotPrice = ($STotPrice >= 0) ? $STotPrice : 0;
        ?>
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Surplus funds</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($STotPrice, 2); ?></b></td>
        </tr>
        <?php
        $BTotPrice = $TotPrice - $cTotPrice;
        $BTotPrice = ($BTotPrice >= 0) ? $BTotPrice : 0;
        ?>
        <tr style="background: #F2EFEF">
            <td class="heading_text" style="padding:3px 5px"><b>Borrowings required</b></td>
            <td class="heading_text" style="text-align: center;padding:3px 5px"><b><?php echo number_format($BTotPrice, 2); ?></b></td>
        </tr>
    </tbody>
</table>