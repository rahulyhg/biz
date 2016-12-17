<div class="balance_sheet">
    <h3><b></b></h3> 
    <!--SETUP COST-->
    <div class="col-md-12 ">
        <div class="">
            <div id="table_1">
                <table class="table table-responsive table-hover forecast_view">
                    <thead>
                        <tr class="text-center">
                            <th>Name</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><b>Setting up the business</b></td>
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
                            <tr class="businessSetup">
                                <td class="col-sm-2">
                                    <div class="trNameTag" >
                                        <?php echo $business['name']; ?>
                                    </div>
                                </td>
                                <td class="col-sm-2" >
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
                        <tr class="clickable">
                            <td class=""><b>Total Setting up the business</b></td>
                            <td class="col-sm-2" >
                                <?php echo number_format($bTotPrice, 2); ?>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Setting up the premises</b></td>
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
                            <tr class="premisesSetup">
                                <td class="col-sm-2">
                                    <div class="trNameTag" >
                                        <?php echo $premises['name']; ?>
                                    </div>
                                </td>
                                <td>
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
                        <tr class="clickable">
                            <td class="col-sm-2"><b>Total Setting up the premises</b></td>
                            <td>
                                <?php echo number_format($pTotPrice, 2); ?>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Plant and Equipment</b></td>
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
                            <tr class="equipmentSetup">
                                <td class="col-sm-2">
                                    <div class="trNameTag" >
                                        <?php echo $equipment['name']; ?>
                                    </div>
                                </td>
                                <td>
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
                        <tr class="clickable">
                            <td class="col-sm-2"><b>Total Plant and Equipment</b></td>
                            <td>
                                <?php echo number_format($eTotPrice, 2); ?>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Starting operations:</b></td>
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
                            <tr class="operationsSetup">
                                <td class="col-sm-2">
                                    <div class="trNameTag" >
                                        <?php echo $operations['name']; ?>
                                    </div>
                                </td>
                                <td>
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
                        <tr class="clickable">
                            <td class="col-sm-2"><b>Total Starting operations</b></td>
                            <td>
                                <?php echo number_format($oTotPrice, 2); ?>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Startup Capital</b></td>
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
                            <tr class="capitalSetup">
                                <td class="col-sm-2">
                                    <div class="trNameTag" >
                                        <?php echo $capital['name']; ?>
                                    </div>
                                </td>
                                <td>
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
                        <tr class="clickable">
                            <td class="col-sm-2"><b>Total Startup Capital</b></td>
                            <td>
                                <?php echo number_format($cTotPrice, 2); ?>
                            </td>
                        </tr>
                        <?php
                        $TotPrice = $bTotPrice + $pTotPrice + $eTotPrice + $oTotPrice;
                        ?>
                        <tr class="clickable">
                            <td><b>Total Setup costs</b></td>
                            <td class="col-sm-2"><b class="grantSetupTotalPrice"><?php echo number_format($TotPrice, 2); ?></b></td>

                        </tr>
                        <?php
                        $STotPrice = $cTotPrice - $TotPrice;
                        $STotPrice = ($STotPrice >= 0) ? $STotPrice : 0;
                        ?>
                        <tr class="clickable">
                            <td><b>Surplus funds</b></td>
                            <td class="col-sm-2"><b class="grantSSetupTotalPrice"><?php echo number_format($STotPrice, 2); ?></b></td>

                        </tr>
                        <?php
                        $BTotPrice = $TotPrice - $cTotPrice;
                        $BTotPrice = ($BTotPrice >= 0) ? $BTotPrice : 0;
                        ?>
                        <tr class="clickable">
                            <td><b>Borrowings required</b></td>
                            <td class="col-sm-2"><b class="grantBSetupTotalPrice"><?php echo number_format($BTotPrice, 2); ?></b></td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>