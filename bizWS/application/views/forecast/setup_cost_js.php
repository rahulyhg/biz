<script>
    var sectionArray = ['<?php echo implode("','", $sectionArray[0]); ?>'];
    var sectionArray1 = ['<?php echo implode("','", $sectionArray[1]); ?>'];
    var totalYear = '<?php echo $totalYear; ?>';
    var companyid = '<?php echo $companyid; ?>';
    var baseUrl = '<?php echo base_url(); ?>';
    $(document).ready(function () {
        var tdClass = (totalYear > 3) ? 'col-sm-1' : 'col-sm-2';
        $('.setupAddMoreLink').click(function (e) {
            var setup = $(this).data('setup');
            var tr = '<tr class="text-center ' + setup + 'Setup">\
                        <td class="col-sm-2" align="center">\
                                <div class="form-group" style="width:70%; margin-top:5%; ">\
                                        <input type="text" name="' + setup + 'SetupName[]" value="" class="form-control" placeholder="Name"/>\
                                </div>\
                        </td>\
                        <td align="center" class="col-sm-2" >\
                                <div class="form-group" style="width:70%; margin-top:5%;">\
                                        <input type="text" name="' + setup + 'SetupPrice[]" class="form-control onlyNumbers setupPrice" data-setup="' + setup + '" placeholder="Amount">\
                                </div>\
                        </td>\
                        <td class="col-sm-2" align="center">\
                                <a href="javascript:void(0);" class="table_edit trSignChange" data-setup="' + setup + '"><em class="fa fa-plus"></em></a>\
                                <a href="javascript:void(0);"class="table_edit no_action trAddMore"><em class="fa fa-pencil"></em></a>\
                                <a href="javascript:void(0);" class="table_delet trDelete" data-setup="' + setup + '"><em class="fa fa-trash"></em></a>\
                        </td>\
                </tr>';
            $('.' + setup + 'SetupAddMore').prev().after(tr);
        });
        //setup generic function
        $(document).on('change', 'input.setupPrice', function (e) {
            var ele = $(this);
            var setup = ele.data('setup');
            var price = numberFormat(ele);
            //children('.'+setup+'SetupPriceTd').html(price);
            totalSetup(setup);
        });
        //generic delete
        $(document).on('click', '.trDelete', function () {
            var ele = $(this);
            if (confirm('Are you sure?')) {
                ele.parents('tr').slideUp('slow').remove();
                totalSetup(ele.data('setup'));
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
            totalSetup(ele.data('setup'));
        });
        $('.setupNext').click(function () {
            var errorFlag = false;
            $('input[name*="SetupName"]').each(function () {
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
            $('.setupPrice').each(function () {
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
                            business: generateAjaxData('business'),
                            premises: generateAjaxData('premises'),
                            equipment: generateAjaxData('equipment'),
                            operations: generateAjaxData('operations'),
                            capital: generateAjaxData('capital'),
                        },
                        total: {
                            SSetup: generateAjaxTotal('SSetup'),
                            BSetup: generateAjaxTotal('BSetup'),
                        }
                    },
                    beforeSend: function () {
                        $('.setupNext').html('Loading');
                        if ($('.setupnxt').length > 0) {
                            $('.setupnxt').remove();
                        }
                    },
                    success: function (data) {
                        $('.setupNext').html(data);
                        var html = '&nbsp<a href="' + baseUrl + 'forecast/statement/' + companyid + '"><button class="btn btn-warning setupnxt">Next</button></a>';
                        $('.setupNext').after(html);
                    }
                });
            }
        });
    });
    //generic functions
    ////generate ajax total data
    function generateAjaxTotal(setup) {
        var ajaxObj = {
            price: $('b.grant' + setup + 'TotalPrice').html(),
            fy1: 0,
            fy2: 0,
            fy3: 0,
            fy4: 0,
            fy5: 0,
        };
        return ajaxObj;
    }
    //generate ajax data
    function generateAjaxData(setup) {
        var ajaxObj = {};
        $('tr.' + setup + 'Setup').each(function (i, j) {
            var ele = $(this);
            ajaxObj[i] = {
                name: ele.find('input[name^="' + setup + 'SetupName"]').val(),
                price: ele.find('input[name^="' + setup + 'SetupPrice"]').val(),
                fy1: 0,
                fy2: 0,
                fy3: 0,
                fy4: 0,
                fy5: 0,
                sign: ele.find('input[name^="' + setup + 'SetupName"]').hasClass('minusInp') ? 1 : 0,
            };
        });
        return ajaxObj;
    }
    //total for Setup
    function totalSetup(setup) {
        columnTotal(setup, 'Price', 1);
        var index = 1;
        if ($.inArray(setup, sectionArray) !== -1) {
            index = 0;
        }
        grantSetupTotal(index);
    }
    //all total setup
    function grantSetupTotal(index) {
        setupTotal(index, 'Price');
    }
    function setupTotal(index, tag) {
        var setupArr = [sectionArray, sectionArray1];
        var grantArr = ['grant', 'grantE']
        var totalSetup = 0;
        $.each(setupArr[index], function (i, j) {
            var inputPrice = parseFloat($('.' + j + 'SetupTotal' + tag).val()).toFixed(2);
            inputPrice = (inputPrice == 'NaN') ? '0.00' : inputPrice;
            totalSetup = totalSetup + +inputPrice;
        });
        totalSetup = totalSetup.toFixed(2);
        $('.' + grantArr[index] + 'SetupTotal' + tag).html(totalSetup);

        var capital = parseFloat($('.capitalSetupTotal' + tag).val()).toFixed(2);
        var total = parseFloat($('.grantSetupTotal' + tag).html()).toFixed(2);

        var sTotal = capital - total;
        sTotal = (sTotal >= 0) ? sTotal : 0;
        sTotal = sTotal.toFixed(2);

        var bTotal = total - capital;
        bTotal = (bTotal >= 0) ? bTotal : 0;
        bTotal = bTotal.toFixed(2);

        $('.grantSSetupTotal' + tag).html(sTotal);
        $('.grantBSetupTotal' + tag).html(bTotal);
    }
    //column total for setup
    function columnTotal(setup, tag, input) {
        var totalSetup = 0;
        var totalMinus = 0;
        $('input[name^="' + setup + 'Setup' + tag + '"]').each(function (i, j) {
            var ele = $(this);
            var inputPrice = parseFloat(ele.val()).toFixed(2);
            inputPrice = (inputPrice == 'NaN') ? '0.00' : inputPrice;
            if (ele.hasClass('minusInp')) {
                totalMinus = totalMinus + +inputPrice;
            } else {
                totalSetup = totalSetup + +inputPrice;
            }
        });
        totalSetup = totalSetup - totalMinus;
        totalSetup = totalSetup.toFixed(2);
        if (input) {
            $('.' + setup + 'SetupTotal' + tag).val(totalSetup);
        } else {
            $('.' + setup + 'SetupTotal' + tag).html(totalSetup);
        }
    }
</script>