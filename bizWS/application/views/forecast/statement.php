<div class="col-md-12" style="margin: 2% 0;">
    <div class="pull-right">
        <button class="btn btn-warning statementNext">Submit</button>
        <!--<a href="<?php echo base_url() ?>forecast/cashflow/<?php echo $companyid; ?>"><button class="btn btn-warning ">Next</button></a>-->
    </div>
</div>
<div class="balance_sheet">
    <h3><b></b></h3>
    <!--Income Profit and Loss Statement-->
    <div class="col-md-12 ">
        <div class="panel panel-default panel-table">
            <div class="panel-heading">
                <div class="row">
                    <div class="col col-xs-6">
                        <h3 class="panel-title"><b>Revenues:</b></h3>
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
                        $rTotPrice = 0;
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
                            <tr class="text-center revenuesStatement">
                                <td align="center" class="col-sm-2">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="revenuesStatementName[]" value="<?php echo $revenues['name']; ?>" class="form-control <?php echo $minCls; ?>" placeholder="Name" <?php echo $readonly; ?>/>
                                    </div>
                                    <div class="text-center trNameTag" >
                                        <?php echo $revenues['name']; ?>
                                    </div>
                                </td>
                                <td align="center" class="col-sm-2" >
                                    <div class="form-group" style="width:70%; margin-top:5%;">
                                        <input type="text" name="revenuesStatementPrice[]" value="<?php echo number_format($revenues['price'], 2, '.', ''); ?>" class="form-control onlyNumbers statementPrice <?php echo $minCls; ?>" data-statement="revenues" placeholder="Amount">
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> revenuesStatementPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="revenuesStatementFy1[]" value="<?php echo number_format($revenues['fy1'], 2, '.', ''); ?>" class="form-control revenuesStatementFyInput StatementFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy1" data-statement="revenues" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag revenuesStatementFyDiv" >
                                        <?php echo number_format($revenues['fy1'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> revenuesStatementPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="revenuesStatementFy2[]" value="<?php echo number_format($revenues['fy2'], 2, '.', ''); ?>" class="form-control revenuesStatementFyInput StatementFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy2" data-statement="revenues" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag revenuesStatementFyDiv" >
                                        <?php echo number_format($revenues['fy2'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> revenuesStatementPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="revenuesStatementFy3[]" value="<?php echo number_format($revenues['fy3'], 2, '.', ''); ?>" class="form-control revenuesStatementFyInput StatementFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy3" data-statement="revenues" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag revenuesStatementFyDiv" >
                                        <?php echo number_format($revenues['fy3'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <?php if ($totalYear > 3) { ?>
                                    <td align="center" class="<?php echo $tdClass; ?> revenuesStatementPriceTd">
                                        <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                            <input type="text" name="revenuesStatementFy4[]" value="<?php echo number_format($revenues['fy4'], 2); ?>" class="form-control revenuesStatementFyInput StatementFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy4" data-statement="revenues" placeholder="Amount"/>
                                        </div>
                                        <div class="trNameTag revenuesStatementFyDiv" >
                                            <?php echo number_format($revenues['fy4'], 2, '.', ''); ?>
                                        </div>
                                    </td>
                                    <td align="center" class="<?php echo $tdClass; ?> revenuesStatementPriceTd">
                                        <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                            <input type="text" name="revenuesStatementFy5[]" value="<?php echo number_format($revenues['fy5'], 2); ?>" class="form-control revenuesStatementFyInput StatementFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy5" data-statement="revenues" placeholder="Amount"/>									
                                        </div>
                                        <div class="trNameTag revenuesStatementFyDiv" >
                                            <?php echo number_format($revenues['fy5'], 2, '.', ''); ?>
                                        </div>
                                    </td>
                                <?php } ?>
                                <td class="col-sm-2" align="center">
                                    <a href="javascript:void(0);" class="table_edit trSignChange" data-statement="revenues" <?php echo $style; ?>><em class="fa fa-<?php echo $signArr[$revenues['sign']] ?>"></em></a>
                                    <a href="javascript:void(0);" class="table_edit trEditMore"><em class="fa fa-pencil"></em></a>
                                    <!--  data-toggle="modal" data-target="#EditModal"  -->
                                    <a href="javascript:void(0);" class="table_delet trDelete" data-statement="revenues" <?php echo $style; ?>><em class="fa fa-trash"></em></a>
                                </td>
                            </tr>
                            <?php
                            if ($revenues['sign']) {
                                $rTotPrice -= $revenues['price'];
                                $rTotFy1 -= $revenues['fy1'];
                                $rTotFy2 -= $revenues['fy2'];
                                $rTotFy3 -= $revenues['fy3'];
                                $rTotFy4 -= $revenues['fy4'];
                                $rTotFy5 -= $revenues['fy5'];
                            } else {
                                $rTotPrice += $revenues['price'];
                                $rTotFy1 += $revenues['fy1'];
                                $rTotFy2 += $revenues['fy2'];
                                $rTotFy3 += $revenues['fy3'];
                                $rTotFy4 += $revenues['fy4'];
                                $rTotFy5 += $revenues['fy5'];
                            }
                        }
                        ?>
                        <tr class="text-center revenuesStatementAddMore">
                            <td class="text-center col-sm-2">
                                <a class="table_edit statementAddMoreLink" data-statement="revenues" href="javascript:void(0);"><em class="fa fa-plus-circle">&nbsp;<b>Add More</b></em></a>
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
                            <td class="text-center col-sm-2"><b>Total Revenues</b></td>
                            <td align="center" class="col-sm-2" >
                                <div class="form-group" style="width:70%; margin-top:5%;">
                                    <input type="text" class="form-control revenuesStatementTotalPrice" value="<?php echo number_format($rTotPrice, 2, '.', ''); ?>" disabled="true">
                                </div>
                            </td>
                            <td class="<?php echo $tdClass; ?> revenuesStatementTotalFy1"><?php echo number_format($rTotFy1, 2, '.', ''); ?></td>
                            <td class="<?php echo $tdClass; ?> revenuesStatementTotalFy2"><?php echo number_format($rTotFy2, 2, '.', ''); ?></td>
                            <td class="<?php echo $tdClass; ?> revenuesStatementTotalFy3"><?php echo number_format($rTotFy3, 2, '.', ''); ?></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?> revenuesStatementTotalFy4"><?php echo number_format($rTotFy4, 2, '.', ''); ?></td>
                                <td class="<?php echo $tdClass; ?> revenuesStatementTotalFy5"><?php echo number_format($rTotFy5, 2, '.', ''); ?></td>
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
                        <h3 class="panel-title"><b>Cost of Goods Sold:</b></h3>
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
                        $gTotPrice = 0;
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
                            <tr class="text-center goodsStatement">
                                <td align="center" class="col-sm-2">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="goodsStatementName[]" value="<?php echo $goods['name']; ?>" class="form-control <?php echo $minCls; ?>" placeholder="Name" <?php echo $readonly; ?>/>
                                    </div>
                                    <div class="text-center trNameTag" >
                                        <?php echo $goods['name']; ?>
                                    </div>
                                </td>
                                <td align="center" class="col-sm-2" >
                                    <div class="form-group" style="width:70%; margin-top:5%;">
                                        <input type="text" name="goodsStatementPrice[]" value="<?php echo number_format($goods['price'], 2, '.', ''); ?>" class="form-control onlyNumbers statementPrice <?php echo $minCls; ?>" data-statement="goods" placeholder="Amount">
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> goodsStatementPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="goodsStatementFy1[]" value="<?php echo number_format($goods['fy1'], 2, '.', ''); ?>" class="form-control goodsStatementFyInput StatementFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy1" data-statement="goods" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag goodsStatementFyDiv" >
                                        <?php echo number_format($goods['fy1'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> goodsStatementPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="goodsStatementFy2[]" value="<?php echo number_format($goods['fy2'], 2, '.', ''); ?>" class="form-control goodsStatementFyInput StatementFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy2" data-statement="goods" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag goodsStatementFyDiv" >
                                        <?php echo number_format($goods['fy2'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> goodsStatementPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="goodsStatementFy3[]" value="<?php echo number_format($goods['fy3'], 2, '.', ''); ?>" class="form-control goodsStatementFyInput StatementFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy3" data-statement="goods" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag goodsStatementFyDiv" >
                                        <?php echo number_format($goods['fy3'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <?php if ($totalYear > 3) { ?>
                                    <td align="center" class="<?php echo $tdClass; ?> goodsStatementPriceTd">
                                        <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                            <input type="text" name="goodsStatementFy4[]" value="<?php echo number_format($goods['fy4'], 2, '.', ''); ?>" class="form-control goodsStatementFyInput StatementFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy4" data-statement="goods" placeholder="Amount"/>
                                        </div>
                                        <div class="trNameTag goodsStatementFyDiv" >
                                            <?php echo number_format($goods['fy4'], 2, '.', ''); ?>
                                        </div>
                                    </td>
                                    <td align="center" class="<?php echo $tdClass; ?> goodsStatementPriceTd">
                                        <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                            <input type="text" name="goodsStatementFy5[]" value="<?php echo number_format($goods['fy5'], 2, '.', ''); ?>" class="form-control goodsStatementFyInput StatementFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy5" data-statement="goods" placeholder="Amount"/>									
                                        </div>
                                        <div class="trNameTag goodsStatementFyDiv" >
                                            <?php echo number_format($goods['fy5'], 2, '.', ''); ?>
                                        </div>
                                    </td>
                                <?php } ?>
                                <td class="col-sm-2" align="center">
                                    <a href="javascript:void(0);" class="table_edit trSignChange" data-statement="goods" <?php echo $style; ?>><em class="fa fa-<?php echo $signArr[$goods['sign']] ?>"></em></a>
                                    <a href="javascript:void(0);" class="table_edit trEditMore"><em class="fa fa-pencil"></em></a>
                                    <!--  data-toggle="modal" data-target="#EditModal"  -->
                                    <a href="javascript:void(0);" class="table_delet trDelete" data-statement="goods" <?php echo $style; ?>><em class="fa fa-trash"></em></a>
                                </td>
                            </tr>
                            <?php
                            if ($goods['sign']) {
                                $gTotPrice -= $goods['price'];
                                $gTotFy1 -= $goods['fy1'];
                                $gTotFy2 -= $goods['fy2'];
                                $gTotFy3 -= $goods['fy3'];
                                $gTotFy4 -= $goods['fy4'];
                                $gTotFy5 -= $goods['fy5'];
                            } else {
                                $gTotPrice += $goods['price'];
                                $gTotFy1 += $goods['fy1'];
                                $gTotFy2 += $goods['fy2'];
                                $gTotFy3 += $goods['fy3'];
                                $gTotFy4 += $goods['fy4'];
                                $gTotFy5 += $goods['fy5'];
                            }
                        }
                        ?>
                        <tr class="text-center goodsStatementAddMore">
                            <td class="text-center col-sm-2">
                                <a class="table_edit statementAddMoreLink" data-statement="goods" href="javascript:void(0);"><em class="fa fa-plus-circle">&nbsp;<b>Add More</b></em></a>
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
                            <td class="text-center col-sm-2"><b>Total Cost of Goods Sold</b></td>
                            <td align="center" class="col-sm-2" >
                                <div class="form-group" style="width:70%; margin-top:5%;">
                                    <input type="text" class="form-control goodsStatementTotalPrice" value="<?php echo number_format($gTotPrice, 2, '.', ''); ?>" disabled="true">
                                </div>
                            </td>
                            <td class="<?php echo $tdClass; ?> goodsStatementTotalFy1"><?php echo number_format($gTotFy1, 2, '.', ''); ?></td>
                            <td class="<?php echo $tdClass; ?> goodsStatementTotalFy2"><?php echo number_format($gTotFy2, 2, '.', ''); ?></td>
                            <td class="<?php echo $tdClass; ?> goodsStatementTotalFy3"><?php echo number_format($gTotFy3, 2, '.', ''); ?></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?> goodsStatementTotalFy4"><?php echo number_format($gTotFy4, 2, '.', ''); ?></td>
                                <td class="<?php echo $tdClass; ?> goodsStatementTotalFy5"><?php echo number_format($gTotFy5, 2, '.', ''); ?></td>
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
            $TotFy1 = $rTotFy1 - $gTotFy1;
            $TotFy2 = $rTotFy2 - $gTotFy2;
            $TotFy3 = $rTotFy3 - $gTotFy3;
            ?>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                    <tbody>
                        <tr class="text-center danger">
                            <td class="text-center col-sm-4"><h4><b>Gross Profit</b></h4></td>
                            <td class="<?php echo $tdClass; ?>"><h4><b class="grantStatementTotalFy1"><?php echo number_format($TotFy1, 2, '.', ''); ?></b></h4></td>
                            <td class="<?php echo $tdClass; ?>"><h4><b class="grantStatementTotalFy2"><?php echo number_format($TotFy2, 2, '.', ''); ?></b></h4></td>
                            <td class="<?php echo $tdClass; ?>"><h4><b class="grantStatementTotalFy3"><?php echo number_format($TotFy3, 2, '.', ''); ?></b></h4></td>
                            <?php
                            if ($totalYear > 3) {
                                $TotFy4 = $rTotFy4 - $gTotFy4;
                                $TotFy5 = $rTotFy5 - $gTotFy5;
                                ?>
                                <td class="<?php echo $tdClass; ?>"><h4><b class="grantStatementTotalFy4"><?php echo number_format($TotFy4, 2, '.', ''); ?></b></h4></td>
                                <td class="<?php echo $tdClass; ?>"><h4><b class="grantStatementTotalFy5"><?php echo number_format($TotFy5, 2, '.', ''); ?></b></h4></td>
                            <?php } ?>
                            <td class="col-sm-2" align="center"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel panel-default panel-table">
            <div class="panel-heading">
                <div class="row">
                    <div class="col col-xs-6">
                        <h3 class="panel-title"><b>Operating Expenses:</b></h3>
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
                        foreach ($operatingStatement as $operating) {
                            $minCls = ($operating['sign']) ? 'minusInp' : '';

                            $readonly = '';
                            $style = '';
                            if (key_exists($operating['name'], $fOS)) {
                                $readonly = 'readonly="readonly"';
                                $style = 'style="display:none !important;"';
                            }
                            ?>
                            <tr class="text-center operatingStatement">
                                <td align="center" class="col-sm-2">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="operatingStatementName[]" value="<?php echo $operating['name']; ?>" class="form-control <?php echo $minCls; ?>" placeholder="Name" <?php echo $readonly; ?>/>
                                    </div>
                                    <div class="text-center trNameTag" >
                                        <?php echo $operating['name']; ?>
                                    </div>
                                </td>
                                <td align="center" class="col-sm-2" >
                                    <div class="form-group" style="width:70%; margin-top:5%;">
                                        <input type="text" name="operatingStatementPrice[]" value="<?php echo number_format($operating['price'], 2, '.', ''); ?>" class="form-control onlyNumbers statementPrice <?php echo $minCls; ?>" data-statement="operating" placeholder="Amount">
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> operatingStatementPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="operatingStatementFy1[]" value="<?php echo number_format($operating['fy1'], 2, '.', ''); ?>" class="form-control operatingStatementFyInput StatementFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy1" data-statement="operating" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag operatingStatementFyDiv" >
                                        <?php echo number_format($operating['fy1'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> operatingStatementPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="operatingStatementFy2[]" value="<?php echo number_format($operating['fy2'], 2, '.', ''); ?>" class="form-control operatingStatementFyInput StatementFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy2" data-statement="operating" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag operatingStatementFyDiv" >
                                        <?php echo number_format($operating['fy2'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> operatingStatementPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="operatingStatementFy3[]" value="<?php echo number_format($operating['fy3'], 2, '.', ''); ?>" class="form-control operatingStatementFyInput StatementFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy3" data-statement="operating" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag operatingStatementFyDiv" >
                                        <?php echo number_format($operating['fy3'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <?php if ($totalYear > 3) { ?>
                                    <td align="center" class="<?php echo $tdClass; ?> operatingStatementPriceTd">
                                        <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                            <input type="text" name="operatingStatementFy4[]" value="<?php echo number_format($operating['fy4'], 2, '.', ''); ?>" class="form-control operatingStatementFyInput StatementFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy4" data-statement="operating" placeholder="Amount"/>
                                        </div>
                                        <div class="trNameTag operatingStatementFyDiv" >
                                            <?php echo number_format($operating['fy4'], 2, '.', ''); ?>
                                        </div>
                                    </td>
                                    <td align="center" class="<?php echo $tdClass; ?> operatingStatementPriceTd">
                                        <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                            <input type="text" name="operatingStatementFy5[]" value="<?php echo number_format($operating['fy5'], 2, '.', ''); ?>" class="form-control operatingStatementFyInput StatementFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy5" data-statement="operating" placeholder="Amount"/>									
                                        </div>
                                        <div class="trNameTag operatingStatementFyDiv" >
                                            <?php echo number_format($operating['fy5'], 2, '.', ''); ?>
                                        </div>
                                    </td>
                                <?php } ?>
                                <td class="col-sm-2" align="center">
                                    <a href="javascript:void(0);" class="table_edit trSignChange" data-statement="operating" <?php echo $style; ?>><em class="fa fa-<?php echo $signArr[$operating['sign']] ?>"></em></a>
                                    <a href="javascript:void(0);" class="table_edit trEditMore"><em class="fa fa-pencil"></em></a>
                                    <!--  data-toggle="modal" data-target="#EditModal"  -->
                                    <a href="javascript:void(0);" class="table_delet trDelete" data-statement="operating" <?php echo $style; ?>><em class="fa fa-trash"></em></a>
                                </td>
                            </tr>
                            <?php
                            if ($operating['sign']) {
                                $oTotPrice -= $operating['price'];
                                $oTotFy1 -= $operating['fy1'];
                                $oTotFy2 -= $operating['fy2'];
                                $oTotFy3 -= $operating['fy3'];
                                $oTotFy4 -= $operating['fy4'];
                                $oTotFy5 -= $operating['fy5'];
                            } else {
                                $oTotPrice += $operating['price'];
                                $oTotFy1 += $operating['fy1'];
                                $oTotFy2 += $operating['fy2'];
                                $oTotFy3 += $operating['fy3'];
                                $oTotFy4 += $operating['fy4'];
                                $oTotFy5 += $operating['fy5'];
                            }
                        }
                        ?>
                        <tr class="text-center operatingStatementAddMore">
                            <td class="text-center col-sm-2">
                                <a class="table_edit statementAddMoreLink" data-statement="operating" href="javascript:void(0);"><em class="fa fa-plus-circle">&nbsp;<b>Add More</b></em></a>
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
                            <td class="text-center col-sm-2"><b>Total Operating Expenses</b></td>
                            <td align="center" class="col-sm-2" >
                                <div class="form-group" style="width:70%; margin-top:5%;">
                                    <input type="text" class="form-control operatingStatementTotalPrice" value="<?php echo number_format($oTotPrice, 2, '.', ''); ?>" disabled="true">
                                </div>
                            </td>
                            <td class="<?php echo $tdClass; ?> operatingStatementTotalFy1"><?php echo number_format($oTotFy1, 2, '.', ''); ?></td>
                            <td class="<?php echo $tdClass; ?> operatingStatementTotalFy2"><?php echo number_format($oTotFy2, 2, '.', ''); ?></td>
                            <td class="<?php echo $tdClass; ?> operatingStatementTotalFy3"><?php echo number_format($oTotFy3, 2, '.', ''); ?></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?> operatingStatementTotalFy4"><?php echo number_format($oTotFy4, 2, '.', ''); ?></td>
                                <td class="<?php echo $tdClass; ?> operatingStatementTotalFy5"><?php echo number_format($oTotFy5, 2, '.', ''); ?></td>
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
            $opTotFy1 = $TotFy1 - $oTotFy1;
            $opTotFy2 = $TotFy2 - $oTotFy2;
            $opTotFy3 = $TotFy3 - $oTotFy3;
            ?>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                    <tbody>
                        <tr class="text-center danger">
                            <td class="text-center col-sm-4"><h4><b>Operating Profit </b></h4></td>
                            <td class="<?php echo $tdClass; ?>"><h4><b class="grantOPStatementTotalFy1"><?php echo number_format($opTotFy1, 2, '.', ''); ?></b></h4></td>
                            <td class="<?php echo $tdClass; ?>"><h4><b class="grantOPStatementTotalFy2"><?php echo number_format($opTotFy2, 2, '.', ''); ?></b></h4></td>
                            <td class="<?php echo $tdClass; ?>"><h4><b class="grantOPStatementTotalFy3"><?php echo number_format($opTotFy3, 2, '.', ''); ?></b></h4></td>
                            <?php
                            if ($totalYear > 3) {
                                $opTotFy4 = $TotFy4 - $oTotFy4;
                                $opTotFy5 = $TotFy5 - $oTotFy5;
                                ?>
                                <td class="<?php echo $tdClass; ?>"><h4><b class="grantOPStatementTotalFy4"><?php echo number_format($opTotFy4, 2, '.', ''); ?></b></h4></td>
                                <td class="<?php echo $tdClass; ?>"><h4><b class="grantOPStatementTotalFy5"><?php echo number_format($opTotFy5, 2, '.', ''); ?></b></h4></td>
                            <?php } ?>
                            <td class="col-sm-2" align="center"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel panel-default panel-table">
            <div class="panel-heading">
                <div class="row">
                    <div class="col col-xs-6">
                        <h3 class="panel-title"><b>Interest (Income), Expense & Taxes:</b></h3>
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
                        $iTotPrice = 0;
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
                            <tr class="text-center interestStatement">
                                <td align="center" class="col-sm-2">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="interestStatementName[]" value="<?php echo $interest['name']; ?>" class="form-control <?php echo $minCls; ?>" placeholder="Name" <?php echo $readonly; ?>/>
                                    </div>
                                    <div class="text-center trNameTag" >
                                        <?php echo $interest['name']; ?>
                                    </div>
                                </td>
                                <td align="center" class="col-sm-2" >
                                    <div class="form-group" style="width:70%; margin-top:5%;">
                                        <input type="text" name="interestStatementPrice[]" value="<?php echo number_format($interest['price'], 2, '.', ''); ?>" class="form-control onlyNumbers statementPrice <?php echo $minCls; ?>" data-statement="interest" placeholder="Amount">
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> interestStatementPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="interestStatementFy1[]" value="<?php echo number_format($interest['fy1'], 2, '.', ''); ?>" class="form-control interestStatementFyInput StatementFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy1" data-statement="interest" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag interestStatementFyDiv" >
                                        <?php echo number_format($interest['fy1'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> interestStatementPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="interestStatementFy2[]" value="<?php echo number_format($interest['fy2'], 2, '.', ''); ?>" class="form-control interestStatementFyInput StatementFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy2" data-statement="interest" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag interestStatementFyDiv" >
                                        <?php echo number_format($interest['fy2'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <td align="center" class="<?php echo $tdClass; ?> interestStatementPriceTd">
                                    <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                        <input type="text" name="interestStatementFy3[]" value="<?php echo number_format($interest['fy3'], 2, '.', ''); ?>" class="form-control interestStatementFyInput StatementFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy3" data-statement="interest" placeholder="Amount"/>
                                    </div>
                                    <div class="trNameTag interestStatementFyDiv" >
                                        <?php echo number_format($interest['fy3'], 2, '.', ''); ?>
                                    </div>
                                </td>
                                <?php if ($totalYear > 3) { ?>
                                    <td align="center" class="<?php echo $tdClass; ?> interestStatementPriceTd">
                                        <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                            <input type="text" name="interestStatementFy4[]" value="<?php echo number_format($interest['fy4'], 2, '.', ''); ?>" class="form-control interestStatementFyInput StatementFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy4" data-statement="interest" placeholder="Amount"/>
                                        </div>
                                        <div class="trNameTag interestStatementFyDiv" >
                                            <?php echo number_format($interest['fy4'], 2, '.', ''); ?>
                                        </div>
                                    </td>
                                    <td align="center" class="<?php echo $tdClass; ?> interestStatementPriceTd">
                                        <div class="form-group trNameInput" style="width:70%; margin-top:5%; display:none;">
                                            <input type="text" name="interestStatementFy5[]" value="<?php echo number_format($interest['fy5'], 2, '.', ''); ?>" class="form-control interestStatementFyInput StatementFyInput onlyNumbers <?php echo $minCls; ?>" data-column="Fy5" data-statement="interest" placeholder="Amount"/>									
                                        </div>
                                        <div class="trNameTag interestStatementFyDiv" >
                                            <?php echo number_format($interest['fy5'], 2, '.', ''); ?>
                                        </div>
                                    </td>
                                <?php } ?>
                                <td class="col-sm-2" align="center">
                                    <a href="javascript:void(0);" class="table_edit trSignChange" data-statement="interest" <?php echo $style; ?>><em class="fa fa-<?php echo $signArr[$interest['sign']] ?>"></em></a>
                                    <a href="javascript:void(0);" class="table_edit trEditMore"><em class="fa fa-pencil"></em></a>
                                    <!--  data-toggle="modal" data-target="#EditModal"  -->
                                    <a href="javascript:void(0);" class="table_delet trDelete" data-statement="interest" <?php echo $style; ?>><em class="fa fa-trash"></em></a>
                                </td>
                            </tr>
                            <?php
                            if ($interest['sign']) {
                                $iTotPrice -= $interest['price'];
                                $iTotFy1 -= $interest['fy1'];
                                $iTotFy2 -= $interest['fy2'];
                                $iTotFy3 -= $interest['fy3'];
                                $iTotFy4 -= $interest['fy4'];
                                $iTotFy5 -= $interest['fy5'];
                            } else {
                                $iTotPrice += $interest['price'];
                                $iTotFy1 += $interest['fy1'];
                                $iTotFy2 += $interest['fy2'];
                                $iTotFy3 += $interest['fy3'];
                                $iTotFy4 += $interest['fy4'];
                                $iTotFy5 += $interest['fy5'];
                            }
                        }
                        ?>
                        <tr class="text-center interestStatementAddMore">
                            <td class="text-center col-sm-2">
                                <a class="table_edit statementAddMoreLink" data-statement="interest" href="javascript:void(0);"><em class="fa fa-plus-circle">&nbsp;<b>Add More</b></em></a>
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
                            <td class="text-center col-sm-2"><b>Total Interest (Income), Expense & Taxes</b></td>
                            <td align="center" class="col-sm-2" >
                                <div class="form-group" style="width:70%; margin-top:5%;">
                                    <input type="text" class="form-control interestStatementTotalPrice" value="<?php echo number_format($iTotPrice, 2, '.', ''); ?>" disabled="true">
                                </div>
                            </td>
                            <td class="<?php echo $tdClass; ?> interestStatementTotalFy1"><?php echo number_format($iTotFy1, 2, '.', ''); ?></td>
                            <td class="<?php echo $tdClass; ?> interestStatementTotalFy2"><?php echo number_format($iTotFy2, 2, '.', ''); ?></td>
                            <td class="<?php echo $tdClass; ?> interestStatementTotalFy3"><?php echo number_format($iTotFy3, 2, '.', ''); ?></td>
                            <?php if ($totalYear > 3) { ?>
                                <td class="<?php echo $tdClass; ?> interestStatementTotalFy4"><?php echo number_format($iTotFy4, 2, '.', ''); ?></td>
                                <td class="<?php echo $tdClass; ?> interestStatementTotalFy5"><?php echo number_format($iTotFy5, 2, '.', ''); ?></td>
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
            $niTotFy1 = $opTotFy1 - $iTotFy1;
            $niTotFy2 = $opTotFy2 - $iTotFy2;
            $niTotFy3 = $opTotFy3 - $iTotFy3;
            ?>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                    <tbody>
                        <tr class="text-center danger">
                            <td class="text-center col-sm-4"><h4><b>Net Income </b></h4></td>
                            <td class="<?php echo $tdClass; ?>"><h4><b class="grantNIStatementTotalFy1"><?php echo number_format($niTotFy1, 2, '.', ''); ?></b></h4></td>
                            <td class="<?php echo $tdClass; ?>"><h4><b class="grantNIStatementTotalFy2"><?php echo number_format($niTotFy2, 2, '.', ''); ?></b></h4></td>
                            <td class="<?php echo $tdClass; ?>"><h4><b class="grantNIStatementTotalFy3"><?php echo number_format($niTotFy3, 2, '.', ''); ?></b></h4></td>
                            <?php
                            if ($totalYear > 3) {
                                $niTotFy4 = $opTotFy4 - $iTotFy4;
                                $niTotFy5 = $opTotFy5 - $iTotFy5;
                                ?>
                                <td class="<?php echo $tdClass; ?>"><h4><b class="grantNIStatementTotalFy4"><?php echo number_format($niTotFy4, 2, '.', ''); ?></b></h4></td>
                                <td class="<?php echo $tdClass; ?>"><h4><b class="grantNIStatementTotalFy5"><?php echo number_format($niTotFy5, 2, '.', ''); ?></b></h4></td>
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
        <button class="btn btn-warning statementNext">Submit</button>
        <!--<a href="<?php echo base_url() ?>forecast/cashflow/<?php echo $companyid; ?>"><button class="btn btn-warning ">Next</button></a>-->
    </div>
</div>