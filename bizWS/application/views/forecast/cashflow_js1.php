<script>
    var sectionArray = ['<?php echo implode("','", $sectionArray[0]); ?>'];
    var sectionArray1 = ['<?php echo implode("','", $sectionArray[1]); ?>'];
        var totalYear = '<?php echo $totalYear; ?>';
        var companyid = '<?php echo $companyid; ?>';
    var baseUrl = '<?php echo base_url(); ?>';
    $(document).ready(function () {
        var tdClass = (totalYear > 3) ? 'col-sm-1' : 'col-sm-2';
        $('.cashflowAddMoreLink').click(function (e) {
            var cashflow = $(this).data('cashflow');
            var trExtra = '';
            if (totalYear > 3) {
                trExtra = '<td align="center" class="' + tdClass + ' ' + cashflow + 'CashflowPriceTd">\
                                <div class="form-group trNameInput" style="width:70%; margin-top:5%;">\
                                        <input type="text" name="' + cashflow + 'CashflowFy4[]" value="" class="form-control ' + cashflow + 'CashflowFyInput CashflowFyInput onlyNumbers" data-column="Fy4" data-cashflow="' + cashflow + '" placeholder="Amount"/>\
                                </div>\
                        </td>\
                        <td align="center" class="' + tdClass + ' ' + cashflow + 'CashflowPriceTd">\
                                <div class="form-group trNameInput" style="width:70%; margin-top:5%;">\
                                        <input type="text" name="' + cashflow + 'CashflowFy5[]" value="" class="form-control ' + cashflow + 'CashflowFyInput CashflowFyInput onlyNumbers" data-column="Fy5" data-cashflow="' + cashflow + '" placeholder="Amount"/>\
                                </div>\
                        </td>';
            }
            var tr = '<tr class="text-center ' + cashflow + 'Cashflow">\
                        <td class="col-sm-2" align="center">\
                                <div class="form-group" style="width:70%; margin-top:5%; ">\
                                        <input type="text" name="' + cashflow + 'CashflowName[]" value="" class="form-control" placeholder="Name"/>\
                                </div>\
                        </td>\
                        <td align="center" class="col-sm-2" >\
                                <div class="form-group" style="width:70%; margin-top:5%;">\
                                        <input type="text" name="' + cashflow + 'CashflowPrice[]" class="form-control onlyNumbers cashflowPrice" data-cashflow="' + cashflow + '" placeholder="Amount">\
                                </div>\
                        </td>\
                        <td align="center" class="' + tdClass + ' ' + cashflow + 'CashflowPriceTd">\
                                <div class="form-group trNameInput" style="width:70%; margin-top:5%;">\
                                        <input type="text" name="' + cashflow + 'CashflowFy1[]" value="" class="form-control ' + cashflow + 'CashflowFyInput CashflowFyInput onlyNumbers" data-column="Fy1" data-cashflow="' + cashflow + '" placeholder="Amount"/>\
                                </div>\
                        </td>\
                        <td align="center" class="' + tdClass + ' ' + cashflow + 'CashflowPriceTd">\
                                <div class="form-group trNameInput" style="width:70%; margin-top:5%;">\
                                        <input type="text" name="' + cashflow + 'CashflowFy2[]" value="" class="form-control ' + cashflow + 'CashflowFyInput CashflowFyInput onlyNumbers" data-column="Fy2" data-cashflow="' + cashflow + '" placeholder="Amount"/>\
                                </div>\
                        </td>\
                        <td align="center" class="' + tdClass + ' ' + cashflow + 'CashflowPriceTd">\
                                <div class="form-group trNameInput" style="width:70%; margin-top:5%;">\
                                        <input type="text" name="' + cashflow + 'CashflowFy3[]" value="" class="form-control ' + cashflow + 'CashflowFyInput CashflowFyInput onlyNumbers" data-column="Fy3" data-cashflow="' + cashflow + '" placeholder="Amount"/>\
                                </div>\
                        </td>\
                        ' + trExtra + '\
                        <td class="col-sm-2" align="center">\
                                <a href="javascript:void(0);" class="table_edit trSignChange" data-cashflow="' + cashflow + '"><em class="fa fa-plus"></em></a>\
                                <a href="javascript:void(0);"class="table_edit no_action trAddMore"><em class="fa fa-pencil"></em></a>\
                                <a href="javascript:void(0);" class="table_delet trDelete" data-cashflow="' + cashflow + '"><em class="fa fa-trash"></em></a>\
                        </td>\
                </tr>';
            $('.' + cashflow + 'CashflowAddMore').prev().after(tr);
        });
        //cashflow generic function
        $(document).on('change', 'input.CashflowFyInput', function (e) {
            var ele = $(this);
            var cashflow = ele.data('cashflow');
            var column = ele.data('column');
            var price = numberFormat(ele);
            columnTotal(cashflow, column, 0);
            var index = 1;
            if ($.inArray(cashflow, sectionArray) !== -1) {
                index = 0;
            }
            cashflowTotal(index, column);

        });
        $(document).on('change', 'input.cashflowPrice', function (e) {
            var ele = $(this);
            var cashflow = ele.data('cashflow');
            var price = numberFormat(ele);
            ele.parents('tr').find('.' + cashflow + 'CashflowFyDiv').html(price);
            ele.parents('tr').find('.' + cashflow + 'CashflowFyInput').val(price);
            //children('.'+cashflow+'CashflowPriceTd').html(price);
            totalCashflow(cashflow);
        });
        //generic delete
        $(document).on('click', '.trDelete', function () {
            var ele = $(this);
            if (confirm('Are you sure?')) {
                ele.parents('tr').slideUp('slow').remove();
                totalCashflow(ele.data('cashflow'));
            }
        });
        $(document).on('click', '.trSignChange', function () {
            var ele = $(this);
            var children = ele.children('em');
            if (children.hasClass('fa-plus')) {
                children.removeClass('fa-plus').addClass('fa-minus');
                ele.parents('tr').find('input').addClass('minusInp');
            } else {
                children.removeClass('fa-minus').addClass('fa-plus');
                ele.parents('tr').find('input').removeClass('minusInp');
            }
            totalCashflow(ele.data('cashflow'));
        });
        $('.cashflowNext').click(function () {
            var errorFlag = false;
            $('input[name*="CashflowName"]').each(function () {
                var ele = $(this);
                var amt = ele.val().trim();
                if (amt == '') {
                    errorFlag = true;
                    ele.css('border', '1px solid red');
                    ele.focus();
                } else {
                    ele.css('border', 'none');
                }
            });
            $('.cashflowPrice').each(function () {
                var ele = $(this);
                var amt = ele.val().trim();
                if (amt == '') {
                    errorFlag = true;
                    ele.css('border', '1px solid red');
                    ele.focus();
                } else {
                    ele.css('border', 'none');
                }
            });
            $('.CashflowFyInput').each(function () {
                var ele = $(this);
                var amt = ele.val().trim();
                if (amt == '') {
                    errorFlag = true;
                    ele.css('border', '1px solid red');
                    ele.focus();
                } else {
                    ele.css('border', 'none');
                }
            });
            if (errorFlag) {
                $('html,body').animate({scrollTop: $('body').offset().top}, "slow");
            } else {
                $.ajax({
                    url: baseUrl + 'Forecast/ajax/' + companyid,
                    method: 'post',
                    data: {
                        forecast: {
                            handcf: generateAjaxData('handcf'),
                            receiptscf: generateAjaxData('receiptscf'),
                            goodscf: generateAjaxData('goodscf'),
                            operatingcf: generateAjaxData('operatingcf'),
                            othercf: generateAjaxData('othercf'),
                        },
                        total: {
                            NCCashflow: generateAjaxTotal('NCCashflow'),
                            CPCashflow: generateAjaxTotal('CPCashflow'),
                        }
                    },
                    beforeSend: function () {
                        $('.cashflowNext').html('Loading');
                    },
                    success: function (data) {
                        $('.cashflowNext').html(data);
                    }
                });
            }
        });
    });
    //generic functions
    ////generate ajax total data
    function generateAjaxTotal(cashflow) {
        var ajaxObj = {
            fy1: $('b.grant' + cashflow + 'TotalFy1').html(),
            fy2: $('b.grant' + cashflow + 'TotalFy2').html(),
            fy3: $('b.grant' + cashflow + 'TotalFy3').html(),
            fy4: $('b.grant' + cashflow + 'TotalFy4').html(),
            fy5: $('b.grant' + cashflow + 'TotalFy5').html(),
        };
        return ajaxObj;
    }
    //generate ajax data
    function generateAjaxData(cashflow) {
        var ajaxObj = {};
        $('tr.' + cashflow + 'Cashflow').each(function (i, j) {
            var ele = $(this);
            ajaxObj[i] = {
                name: ele.find('input[name^="' + cashflow + 'CashflowName"]').val(),
                price: ele.find('input[name^="' + cashflow + 'CashflowPrice"]').val(),
                fy1: ele.find('input[name^="' + cashflow + 'CashflowFy1"]').val(),
                fy2: ele.find('input[name^="' + cashflow + 'CashflowFy2"]').val(),
                fy3: ele.find('input[name^="' + cashflow + 'CashflowFy3"]').val(),
                fy4: ele.find('input[name^="' + cashflow + 'CashflowFy4"]').val(),
                fy5: ele.find('input[name^="' + cashflow + 'CashflowFy5"]').val(),
                sign: ele.find('input[name^="' + cashflow + 'CashflowName"]').hasClass('minusInp') ? 1 : 0,
            };
        });
        return ajaxObj;
    }
    //total for Cashflow
    function totalCashflow(cashflow) {
        columnTotal(cashflow, 'Price', 1);
        columnTotal(cashflow, 'Fy1', 0);
        columnTotal(cashflow, 'Fy2', 0);
        columnTotal(cashflow, 'Fy3', 0);
        if (totalYear > 3) {
            columnTotal(cashflow, 'Fy4', 0);
            columnTotal(cashflow, 'Fy5', 0);
        }
        var index = 1;
        if ($.inArray(cashflow, sectionArray) !== -1) {
            index = 0;
        }
        grantCashflowTotal(index);
    }
    //all total cashflow
    function grantCashflowTotal(index) {
        cashflowTotal(index, 'Fy1');
        cashflowTotal(index, 'Fy2');
        cashflowTotal(index, 'Fy3');
        if (totalYear > 3) {
            cashflowTotal(index, 'Fy4');
            cashflowTotal(index, 'Fy5');
        }
    }
    function cashflowTotal(index, tag) {
        var cashflowArr = [sectionArray, sectionArray1];
        var grantArr = ['grant', 'grantE']
        var totalCashflow = 0;
        $.each(cashflowArr[index], function (i, j) {
            var inputPrice = parseFloat($('.' + j + 'CashflowTotal' + tag).html()).toFixed(2);
            inputPrice = (inputPrice == 'NaN') ? '0.00' : inputPrice;
            totalCashflow = totalCashflow + +inputPrice;
        });
        totalCashflow = totalCashflow.toFixed(2);
        var receiptsTotal = parseFloat($('.receiptscfCashflowTotal' + tag).html()).toFixed(2);
        var handTotal = parseFloat($('.handcfCashflowTotal' + tag).html()).toFixed(2);
        var NCTotal = receiptsTotal - totalCashflow;
        var CPTotal = NCTotal + +handTotal;
        NCTotal = NCTotal.toFixed(2);
        CPTotal = CPTotal.toFixed(2);
        $('.' + grantArr[index] + 'CashflowTotal' + tag).html(totalCashflow);
        $('.grantNCCashflowTotal' + tag).html(NCTotal);
        $('.grantCPCashflowTotal' + tag).html(CPTotal);
    }
    //column total for cashflow
    function columnTotal(cashflow, tag, input) {
        var totalCashflow = 0;
        var totalMinus = 0;
        $('input[name^="' + cashflow + 'Cashflow' + tag + '"]').each(function (i, j) {
            var ele = $(this);
            var inputPrice = parseFloat(ele.val()).toFixed(2);
            inputPrice = (inputPrice == 'NaN') ? '0.00' : inputPrice;
            if (ele.hasClass('minusInp')) {
                totalMinus = totalMinus + +inputPrice;
            } else {
                totalCashflow = totalCashflow + +inputPrice;
            }
        });
        totalCashflow = totalCashflow - totalMinus;
        totalCashflow = totalCashflow.toFixed(2);
        if (input) {
            $('.' + cashflow + 'CashflowTotal' + tag).val(totalCashflow);
        } else {
            $('.' + cashflow + 'CashflowTotal' + tag).html(totalCashflow);
        }
    }
</script>