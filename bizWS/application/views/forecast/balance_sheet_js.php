<script>
    var sectionArray = ['<?php echo implode("','", $sectionArray[0]); ?>'];
    var sectionArray1 = ['<?php echo implode("','", $sectionArray[1]); ?>'];
    var totalYear = '<?php echo $totalYear; ?>';
    var companyid = '<?php echo $companyid; ?>';
    var baseUrl = '<?php echo base_url(); ?>';
    $(document).ready(function () {
        var tdClass = (totalYear > 3) ? 'col-sm-1' : 'col-sm-2';
        $('.assetsAddMoreLink').click(function (e) {
            var assets = $(this).data('assets');
            var trExtra = '';
            if (totalYear > 3) {
                trExtra = '<td align="center" class="' + tdClass + ' ' + assets + 'AssetsPriceTd">\
                                <div class="form-group trNameInput" style="width:70%; margin-top:5%;">\
                                        <input type="text" name="' + assets + 'AssetsFy4[]" value="" class="form-control ' + assets + 'AssetsFyInput AssetsFyInput onlyNumbers" data-column="Fy4" data-assets="' + assets + '" placeholder="Amount"/>\
                                </div>\
                        </td>\
                        <td align="center" class="' + tdClass + ' ' + assets + 'AssetsPriceTd">\
                                <div class="form-group trNameInput" style="width:70%; margin-top:5%;">\
                                        <input type="text" name="' + assets + 'AssetsFy5[]" value="" class="form-control ' + assets + 'AssetsFyInput AssetsFyInput onlyNumbers" data-column="Fy5" data-assets="' + assets + '" placeholder="Amount"/>\
                                </div>\
                        </td>';
            }
            var tr = '<tr class="text-center ' + assets + 'Assets">\
                        <td class="col-sm-2" align="center">\
                                <div class="form-group" style="width:70%; margin-top:5%; ">\
                                        <input type="text" name="' + assets + 'AssetsName[]" value="" class="form-control" placeholder="Name"/>\
                                </div>\
                        </td>\
                        <td align="center" class="col-sm-2" >\
                                <div class="form-group" style="width:70%; margin-top:5%;">\
                                        <input type="text" name="' + assets + 'AssetsPrice[]" class="form-control onlyNumbers assetsPrice" data-assets="' + assets + '" placeholder="Amount">\
                                </div>\
                        </td>\
                        <td align="center" class="' + tdClass + ' ' + assets + 'AssetsPriceTd">\
                                <div class="form-group trNameInput" style="width:70%; margin-top:5%;">\
                                        <input type="text" name="' + assets + 'AssetsFy1[]" value="" class="form-control ' + assets + 'AssetsFyInput AssetsFyInput onlyNumbers" data-column="Fy1" data-assets="' + assets + '" placeholder="Amount"/>\
                                </div>\
                        </td>\
                        <td align="center" class="' + tdClass + ' ' + assets + 'AssetsPriceTd">\
                                <div class="form-group trNameInput" style="width:70%; margin-top:5%;">\
                                        <input type="text" name="' + assets + 'AssetsFy2[]" value="" class="form-control ' + assets + 'AssetsFyInput AssetsFyInput onlyNumbers" data-column="Fy2" data-assets="' + assets + '" placeholder="Amount"/>\
                                </div>\
                        </td>\
                        <td align="center" class="' + tdClass + ' ' + assets + 'AssetsPriceTd">\
                                <div class="form-group trNameInput" style="width:70%; margin-top:5%;">\
                                        <input type="text" name="' + assets + 'AssetsFy3[]" value="" class="form-control ' + assets + 'AssetsFyInput AssetsFyInput onlyNumbers" data-column="Fy3" data-assets="' + assets + '" placeholder="Amount"/>\
                                </div>\
                        </td>\
                        ' + trExtra + '\
                        <td class="col-sm-2" align="center">\
                                <a href="javascript:void(0);" class="table_edit trSignChange" data-assets="' + assets + '"><em class="fa fa-plus"></em></a>\
                                <a href="javascript:void(0);"class="table_edit no_action trAddMore"><em class="fa fa-pencil"></em></a>\
                                <a href="javascript:void(0);" class="table_delet trDelete" data-assets="' + assets + '"><em class="fa fa-trash"></em></a>\
                        </td>\
                </tr>';
            $('.' + assets + 'AssetsAddMore').prev().after(tr);
        });
        //assets generic function
        $(document).on('change', 'input.AssetsFyInput', function (e) {
            var ele = $(this);
            var assets = ele.data('assets');
            var column = ele.data('column');
            var price = numberFormat(ele);
            columnTotal(assets, column, 0);
            var index = 1;
            if ($.inArray(assets, sectionArray) !== -1) {
                index = 0;
            }
            assetsTotal(index, column);

        });
        $(document).on('change', 'input.assetsPrice', function (e) {
            var ele = $(this);
            var assets = ele.data('assets');
            var price = numberFormat(ele);
            ele.parents('tr').find('.' + assets + 'AssetsFyDiv').html(price);
            ele.parents('tr').find('.' + assets + 'AssetsFyInput').val(price);
            //children('.'+assets+'AssetsPriceTd').html(price);
            totalAssets(assets);
        });
        //generic delete
        $(document).on('click', '.trDelete', function () {
            var ele = $(this);
            if (confirm('Are you sure?')) {
                ele.parents('tr').slideUp('slow').remove();
                totalAssets(ele.data('assets'));
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
            totalAssets(ele.data('assets'));
        });
        $('.assetEquityNext').click(function () {
            var errorFlag = false;
            $('input[name*="AssetsName"]').each(function () {
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
            $('.assetsPrice').each(function () {
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
            $('.AssetsFyInput').each(function () {
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
                            current: generateAjaxData('current'),
                            fixed: generateAjaxData('fixed'),
                            other: generateAjaxData('other'),
                            currentLb: generateAjaxData('currentLb'),
                            longTerm: generateAjaxData('longTerm'),
                            equity: generateAjaxData('equity'),
                        },
                        total: {
                            Assets: generateAjaxTotal('Assets'),
                            EAssets: generateAjaxTotal('EAssets'),
                        }
                    },
                    beforeSend: function () {
                        $('.assetEquityNext').html('Loading');
                        if ($('.assestnext').length > 0) {
                            $('.assestnext').remove();
                        }
                    },
                    success: function (data) {
                        $('.assetEquityNext').html(data);
                        var html = '&nbsp<button class="btn btn-warning redirect assestnext">Next</button>';
                        $('.assetEquityNext').after(html);
                    }
                });
            }
        });
    });
    //generic functions
    ////generate ajax total data
    function generateAjaxTotal(asset) {
        var ajaxObj = {
            fy1: $('b.grant' + asset + 'TotalFy1').html(),
            fy2: $('b.grant' + asset + 'TotalFy2').html(),
            fy3: $('b.grant' + asset + 'TotalFy3').html(),
            fy4: ($('b.grant' + asset + 'TotalFy4').length > 0) ? $('b.grant' + asset + 'TotalFy4').html() : 0,
            fy5: ($('b.grant' + asset + 'TotalFy5').length > 0) ? $('b.grant' + asset + 'TotalFy5').html() : 0,
        };
        return ajaxObj;
    }
    //generate ajax data
    function generateAjaxData(asset) {
        var ajaxObj = {};
        $('tr.' + asset + 'Assets').each(function (i, j) {
            var ele = $(this);
            ajaxObj[i] = {
                name: ele.find('input[name^="' + asset + 'AssetsName"]').val(),
                price: ele.find('input[name^="' + asset + 'AssetsPrice"]').val(),
                fy1: ele.find('input[name^="' + asset + 'AssetsFy1"]').val(),
                fy2: ele.find('input[name^="' + asset + 'AssetsFy2"]').val(),
                fy3: ele.find('input[name^="' + asset + 'AssetsFy3"]').val(),
                fy4: (ele.find('input[name^="' + asset + 'AssetsFy4"]').length > 0) ? ele.find('input[name^="' + asset + 'AssetsFy4"]').val() : 0,
                fy5: (ele.find('input[name^="' + asset + 'AssetsFy5"]').length > 0) ? ele.find('input[name^="' + asset + 'AssetsFy5"]').val() : 0,
                sign: ele.find('input[name^="' + asset + 'AssetsName"]').hasClass('minusInp') ? 1 : 0,
            };
        });
        return ajaxObj;
    }
    //total for Assets
    function totalAssets(assets) {
        columnTotal(assets, 'Price', 1);
        columnTotal(assets, 'Fy1', 0);
        columnTotal(assets, 'Fy2', 0);
        columnTotal(assets, 'Fy3', 0);
        if (totalYear > 3) {
            columnTotal(assets, 'Fy4', 0);
            columnTotal(assets, 'Fy5', 0);
        }
        var index = 1;
        if ($.inArray(assets, sectionArray) !== -1) {
            index = 0;
        }
        grantAssetsTotal(index);
    }
    //all total assets
    function grantAssetsTotal(index) {
        assetsTotal(index, 'Fy1');
        assetsTotal(index, 'Fy2');
        assetsTotal(index, 'Fy3');
        if (totalYear > 3) {
            assetsTotal(index, 'Fy4');
            assetsTotal(index, 'Fy5');
        }
    }
    function assetsTotal(index, tag) {
        var assetsArr = [sectionArray, sectionArray1];
        var grantArr = ['grant', 'grantE']
        var totalAssets = 0;
        $.each(assetsArr[index], function (i, j) {
            var inputPrice = parseFloat($('.' + j + 'AssetsTotal' + tag).html()).toFixed(2);
            inputPrice = (inputPrice == 'NaN') ? '0.00' : inputPrice;
            totalAssets = totalAssets + +inputPrice;
        });
        totalAssets = totalAssets.toFixed(2);
        $('.' + grantArr[index] + 'AssetsTotal' + tag).html(totalAssets);
    }
    //column total for assets
    function columnTotal(assets, tag, input) {
        var totalAssets = 0;
        var totalMinus = 0;
        $('input[name^="' + assets + 'Assets' + tag + '"]').each(function (i, j) {
            var ele = $(this);
            var inputPrice = parseFloat(ele.val()).toFixed(2);
            inputPrice = (inputPrice == 'NaN') ? '0.00' : inputPrice;
            if (ele.hasClass('minusInp')) {
                totalMinus = totalMinus + +inputPrice;
            } else {
                totalAssets = totalAssets + +inputPrice;
            }
        });
        totalAssets = totalAssets - totalMinus;
        totalAssets = totalAssets.toFixed(2);
        if (input) {
            $('.' + assets + 'AssetsTotal' + tag).val(totalAssets);
        } else {
            $('.' + assets + 'AssetsTotal' + tag).html(totalAssets);
        }
    }
</script>