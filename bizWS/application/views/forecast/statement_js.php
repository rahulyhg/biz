<script>
//    var sectionArray = ['<?php // echo implode("','", $sectionArray[0]);          ?>'];
//    var sectionArray1 = ['<?php // echo implode("','", $sectionArray[1]);          ?>'];
    var totalYear = '<?php echo $totalYear; ?>';
    var companyid = '<?php echo $companyid; ?>';
    var baseUrl = '<?php echo base_url(); ?>';
    $(document).ready(function () {
        var tdClass = (totalYear > 3) ? 'col-sm-1' : 'col-sm-2';
        $('.statementAddMoreLink').click(function (e) {
            var statement = $(this).data('statement');
            var trExtra = '';
            if (totalYear > 3) {
                trExtra = '<td align="center" class="' + tdClass + ' ' + statement + 'StatementPriceTd">\
                                <div class="form-group trNameInput" style="width:70%; margin-top:5%;">\
                                        <input type="text" name="' + statement + 'StatementFy4[]" value="" class="form-control ' + statement + 'StatementFyInput StatementFyInput onlyNumbers" data-column="Fy4" data-statement="' + statement + '" placeholder="Amount"/>\
                                </div>\
                        </td>\
                        <td align="center" class="' + tdClass + ' ' + statement + 'StatementPriceTd">\
                                <div class="form-group trNameInput" style="width:70%; margin-top:5%;">\
                                        <input type="text" name="' + statement + 'StatementFy5[]" value="" class="form-control ' + statement + 'StatementFyInput StatementFyInput onlyNumbers" data-column="Fy5" data-statement="' + statement + '" placeholder="Amount"/>\
                                </div>\
                        </td>';
            }
            var tr = '<tr class="text-center ' + statement + 'Statement">\
                        <td class="col-sm-2" align="center">\
                                <div class="form-group" style="width:70%; margin-top:5%; ">\
                                        <input type="text" name="' + statement + 'StatementName[]" value="" class="form-control" placeholder="Name"/>\
                                </div>\
                        </td>\
                        <td align="center" class="col-sm-2" >\
                                <div class="form-group" style="width:70%; margin-top:5%;">\
                                        <input type="text" name="' + statement + 'StatementPrice[]" class="form-control onlyNumbers statementPrice" data-statement="' + statement + '" placeholder="Amount">\
                                </div>\
                        </td>\
                        <td align="center" class="' + tdClass + ' ' + statement + 'StatementPriceTd">\
                                <div class="form-group trNameInput" style="width:70%; margin-top:5%;">\
                                        <input type="text" name="' + statement + 'StatementFy1[]" value="" class="form-control ' + statement + 'StatementFyInput StatementFyInput onlyNumbers" data-column="Fy1" data-statement="' + statement + '" placeholder="Amount"/>\
                                </div>\
                        </td>\
                        <td align="center" class="' + tdClass + ' ' + statement + 'StatementPriceTd">\
                                <div class="form-group trNameInput" style="width:70%; margin-top:5%;">\
                                        <input type="text" name="' + statement + 'StatementFy2[]" value="" class="form-control ' + statement + 'StatementFyInput StatementFyInput onlyNumbers" data-column="Fy2" data-statement="' + statement + '" placeholder="Amount"/>\
                                </div>\
                        </td>\
                        <td align="center" class="' + tdClass + ' ' + statement + 'StatementPriceTd">\
                                <div class="form-group trNameInput" style="width:70%; margin-top:5%;">\
                                        <input type="text" name="' + statement + 'StatementFy3[]" value="" class="form-control ' + statement + 'StatementFyInput StatementFyInput onlyNumbers" data-column="Fy3" data-statement="' + statement + '" placeholder="Amount"/>\
                                </div>\
                        </td>\
                        ' + trExtra + '\
                        <td class="col-sm-2" align="center">\
                                <a href="javascript:void(0);" class="table_edit trSignChange" data-statement="' + statement + '"><em class="fa fa-plus"></em></a>\
                                <a href="javascript:void(0);"class="table_edit no_action trAddMore"><em class="fa fa-pencil"></em></a>\
                                <a href="javascript:void(0);" class="table_delet trDelete" data-statement="' + statement + '"><em class="fa fa-trash"></em></a>\
                        </td>\
                </tr>';
            $('.' + statement + 'StatementAddMore').prev().after(tr);
        });
        //statement generic function
        $(document).on('change', 'input.StatementFyInput', function (e) {
            var ele = $(this);
            var statement = ele.data('statement');
            var column = ele.data('column');
            var price = numberFormat(ele);
            columnTotal(statement, column, 0);
            var index = 1;
//            if ($.inArray(statement, sectionArray) !== -1) {
//                index = 0;
//            }
            statementTotal(index, column);

        });
        $(document).on('change', 'input.statementPrice', function (e) {
            var ele = $(this);
            var statement = ele.data('statement');
            var price = numberFormat(ele);
            ele.parents('tr').find('.' + statement + 'StatementFyDiv').html(price);
            ele.parents('tr').find('.' + statement + 'StatementFyInput').val(price);
            //children('.'+statement+'StatementPriceTd').html(price);
            totalStatement(statement);
        });
        //generic delete
        $(document).on('click', '.trDelete', function () {
            var ele = $(this);
            if (confirm('Are you sure?')) {
                ele.parents('tr').slideUp('slow').remove();
                totalStatement(ele.data('statement'));
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
            totalStatement(ele.data('statement'));
        });
        $('.statementNext').click(function () {
            var errorFlag = false;
            $('input[name*="StatementName"]').each(function () {
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
            $('.statementPrice').each(function () {
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
            $('.StatementFyInput').each(function () {
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
                            revenues: generateAjaxData('revenues'),
                            goods: generateAjaxData('goods'),
                            operating: generateAjaxData('operating'),
                            interest: generateAjaxData('interest'),
                        },
                        total: {
                            OPStatement: generateAjaxTotal('OPStatement'),
                            NIStatement: generateAjaxTotal('NIStatement'),
                        }
                    },
                    beforeSend: function () {
                        $('.statementNext').html('Loading');
                        if ($('.statementnxt').length > 0) {
                            $('.statementnxt').remove();
                        }
                    },
                    success: function (data) {
                        $('.statementNext').html(data);
                        var html = '&nbsp<a href="' + baseUrl + 'forecast/cashflow/' + companyid + '"><button class="btn btn-warning statementnxt">Next</button></a>';
                        $('.statementNext').after(html);
                    }
                });
            }
        });
    });
    //generic functions
    ////generate ajax total data
    function generateAjaxTotal(statement) {
        var ajaxObj = {
            fy1: $('b.grant' + statement + 'TotalFy1').html(),
            fy2: $('b.grant' + statement + 'TotalFy2').html(),
            fy3: $('b.grant' + statement + 'TotalFy3').html(),
            fy4: ($('b.grant' + statement + 'TotalFy4').length > 0) ? $('b.grant' + statement + 'TotalFy4').html() : 0,
            fy5: ($('b.grant' + statement + 'TotalFy5').length > 0) ? $('b.grant' + statement + 'TotalFy5').html() : 0,
        };
        return ajaxObj;
    }
    //generate ajax data
    function generateAjaxData(statement) {
        var ajaxObj = {};
        $('tr.' + statement + 'Statement').each(function (i, j) {
            var ele = $(this);
            ajaxObj[i] = {
                name: ele.find('input[name^="' + statement + 'StatementName"]').val(),
                price: ele.find('input[name^="' + statement + 'StatementPrice"]').val(),
                fy1: ele.find('input[name^="' + statement + 'StatementFy1"]').val(),
                fy2: ele.find('input[name^="' + statement + 'StatementFy2"]').val(),
                fy3: ele.find('input[name^="' + statement + 'StatementFy3"]').val(),
                fy4: (ele.find('input[name^="' + statement + 'StatementFy4"]').length > 0) ? ele.find('input[name^="' + statement + 'StatementFy4"]').val() : 0,
                fy5: (ele.find('input[name^="' + statement + 'StatementFy5"]').length > 0) ? ele.find('input[name^="' + statement + 'StatementFy5"]').val() : 0,
                sign: ele.find('input[name^="' + statement + 'StatementName"]').hasClass('minusInp') ? 1 : 0,
            };
        });
        return ajaxObj;
    }
    //total for Statement
    function totalStatement(statement) {
        columnTotal(statement, 'Price', 1);
        columnTotal(statement, 'Fy1', 0);
        columnTotal(statement, 'Fy2', 0);
        columnTotal(statement, 'Fy3', 0);
        if (totalYear > 3) {
            columnTotal(statement, 'Fy4', 0);
            columnTotal(statement, 'Fy5', 0);
        }
        var index = 1;
//        if ($.inArray(statement, sectionArray) !== -1) {
//            index = 0;
//        }
        grantStatementTotal(index);
    }
    //all total statement
    function grantStatementTotal(index) {
        statementTotal(index, 'Fy1');
        statementTotal(index, 'Fy2');
        statementTotal(index, 'Fy3');
        if (totalYear > 3) {
            statementTotal(index, 'Fy4');
            statementTotal(index, 'Fy5');
        }
    }
    function statementTotal(index, tag) {
//        var statementArr = [sectionArray, sectionArray1];
//        var grantArr = ['grant', 'grantE']
//        var totalStatement = 0;
//        $.each(statementArr[index], function(i, j) {
//            var inputPrice = parseFloat($('.' + j + 'StatementTotal' + tag).html()).toFixed(2);
//            inputPrice = (inputPrice == 'NaN') ? '0.00' : inputPrice;
//            totalStatement = totalStatement - inputPrice;
//        });
//        totalStatement = totalStatement.toFixed(2);
//        $('.' + grantArr[index] + 'StatementTotal' + tag).html(totalStatement);
        var revenues = parseFloat($('.revenuesStatementTotal' + tag).html()).toFixed(2);
        var goods = parseFloat($('.goodsStatementTotal' + tag).html()).toFixed(2);
        var operating = parseFloat($('.operatingStatementTotal' + tag).html()).toFixed(2);
        var interest = parseFloat($('.interestStatementTotal' + tag).html()).toFixed(2);
        var total = revenues - goods;
        total = parseFloat(total).toFixed(2);
        var opTotal = total - operating;
        opTotal = parseFloat(opTotal).toFixed(2);
        var niTotal = opTotal - interest;
        niTotal = parseFloat(niTotal).toFixed(2);

        $('.grantStatementTotal' + tag).html(total);
        $('.grantOPStatementTotal' + tag).html(opTotal);
        $('.grantNIStatementTotal' + tag).html(niTotal);
    }
    //column total for statement
    function columnTotal(statement, tag, input) {
        var totalStatement = 0;
        var totalMinus = 0;
        $('input[name^="' + statement + 'Statement' + tag + '"]').each(function (i, j) {
            var ele = $(this);
            var inputPrice = parseFloat(ele.val()).toFixed(2);
            inputPrice = (inputPrice == 'NaN') ? '0.00' : inputPrice;
            if (ele.hasClass('minusInp')) {
                totalMinus = totalMinus + +inputPrice;
            } else {
                totalStatement = totalStatement + +inputPrice;
            }
        });
        totalStatement = totalStatement - totalMinus;
        totalStatement = totalStatement.toFixed(2);
        if (input) {
            $('.' + statement + 'StatementTotal' + tag).val(totalStatement);
        } else {
            $('.' + statement + 'StatementTotal' + tag).html(totalStatement);
        }
    }
</script>