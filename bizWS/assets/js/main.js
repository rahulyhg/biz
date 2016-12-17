$(document).ready(function () {

    $('.mile_button').click(function () {
        $('.milestone_det')[0].reset();
    });

    $('.elevator').click(function () {
        $('.head_desc').val('');
        $val = $('.elevator_sample').clone();
        $('.head_desc').val($val.html());
    });
    $('.clone_problem').click(function () {
        $('.prob_desc').val('');
        $val = $('.problem_sample').clone();
        $('.prob_desc').val($val.html());
    });
    $('.clone_solution').click(function () {
        $('.sol_desc').val('');
        $val = $('.solution_sample').clone();
        $('.sol_desc').val($val.html());
    });
    $('.clone_target').click(function () {
        $('.tar_desc').val('');
        $val = $('.target_sample').clone();
        $('.tar_desc').val($val.html());
    });
    $('.clone_funds').click(function () {
        $('.fund_desc').val('');
        $val = $('.funds_sample').clone();
        $('.fund_desc').val($val.html());
    });
    $('.clone_sales').click(function () {
        $('.sal_desc').val('');
        $val = $('.sales_sample').clone();
        $('.sal_desc').val($val.html());
    });
    $('.clone_market').click(function () {
        $('.mar_desc').val('');
        $val = $('.market_sample').clone();
        $('.mar_desc').val($val.html());
    });

    $('.check_company').click(function () {
        var name = $('input[name="company"]').val();
        if (name == '') {
            var html = "Plaese Enter company name";
            error_msg(html);
            return false;
        } else {
            $('.mail-error').css('display', 'none');
            $('.error_msg').text('');
            $('body').prepend('<div class="popup_back"></div>');
            $('.popup_cont').fadeIn();
            return false;
        }
    });
    $('.popup_close').click(function () {
        $('.popup_back').fadeOut(function () {
            $(this).remove();
        });
        $('.popup_cont').fadeOut();
        $('.popup_sub').fadeOut();
    });
    $('.submit_company').click(function () {
//        $('.create_company').submit();
        var name = $('input[name="company"]').val();
        if (name != '') {
            var data = new FormData($('#create_company')[0]);
            var url = base_url + 'createcompany';
            $.ajax({
                url: url,
                data: data,
                type: 'POST',
                mimeType: "multipart/form-data",
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                async: false,
                beforeSend: function (data) {
                    $('.submit_company').attr("disabled", true);
                    $('.popup_close').click();
                },
                success: function (data) {
                    if (data.flag == 1) {
                        $('#warning').modal('show');
                        $('.company_rand').val(data.company_id);
                        var pitch_redirect = base_url + 'pitch/company/' + data.company_id;
                        var plan_redirect = base_url + 'plan/company/' + data.company_id;
                        $('.pitch_redirect').attr('href', pitch_redirect);
                        $('.plan_redirect').attr('href', plan_redirect);
                        $('.create_company').prop('disabled', false);
                        $('.submit_company').attr("disabled", false);
                        return false;
                    } else {
                        $('body').prepend('<div class="popup_back"></div>');
                        $('.popup_sub').fadeIn();
                    }
                    return false;
                }
            });
            $('.mail-error').css('display', 'none');
            $('.error_msg').text('');
        } else {
            var html = "Plaese Enter company name";
            error_msg(html);
            return false;
        }
        return false;
    });
    $('.remove_popup').click(function () {
        $('.popup_close').click();
    });
//    $('.create_company').submit(function () {
//        var name = $('input[name="company"]').val();
//        if (name != '') {
//            var data = new FormData($('#create_company')[0]);
//            var url = base_url + 'createcompany';
//            $.ajax({
//                url: url,
//                data: data,
//                type: 'POST',
//                mimeType: "multipart/form-data",
//                dataType: 'json',
//                contentType: false,
//                cache: false,
//                processData: false,
//                async: true,
//                beforeSend: function (data) {
//                    $('.create_company').prop('disabled', true);
//                    $('.popup_close').click();
//                },
//                success: function (data) {
//                    if (data.flag == 1) {
//                        $('#warning').modal('show');
//                        $('.company_rand').val(data.company_id);
//                        var pitch_redirect = base_url + 'pitch/company/' + data.company_id;
//                        var plan_redirect = base_url + 'plan/company/' + data.company_id;
//                        $('.pitch_redirect').attr('href', pitch_redirect);
//                        $('.plan_redirect').attr('href', plan_redirect);
//                        $('.create_company').prop('disabled', false);
//                        return false;
//                    } else {
//                        var url = base_url + '/settings/subscription';
//                        window.location.href = url;
//                    }
//                    return false;
//                }
//            });
//            $('.mail-error').css('display', 'none');
//            $('.error_msg').text('');
//        } else {
//            var html = "Plaese Enter company name";
//            error_msg(html);
//            return false;
//        }
//        return false;
//    });

    $('.comp_delete').click(function () {
        var company_id = $('.comp_delete').attr('data-id');
        var url = base_url + '/dashboard/company_delete';
        $.ajax({
            url: url,
            type: 'POST',
            data: 'company_id=' + company_id,
            dataType: 'json',
            beforeSend: function (xhr) {
                bodyfadein();
            },
            success: function (data) {
                bodyfadeout();
                $('table#example tbody').empty();
                if (data.flag == 1) {

                } else {
                    alert("oops!! Something wrong");
                }
            }
        });
    });
    $('.biz_pitch').click(function () {
        var headline = $('.head_desc').val();
        var problem = $('.prob_desc').val();
        var solution = $('.sol_desc').val();
        var target = $('.tar_desc').val();
        var sales = $('.sal_desc').val();
        var marketing = $('.mar_desc').val();
        var comp_id = $('.company_rand').val();
        var url = base_url + 'pitch/update_pitch/' + parameter;
        $.ajax({
            url: url,
            type: 'POST',
            data: 'headline=' + encodeURIComponent(headline) + '&problem=' + encodeURIComponent(problem) + '&solution=' + encodeURIComponent(solution) + '&target=' + encodeURIComponent(target) + '&sales=' + encodeURIComponent(sales) + '&marketing=' + encodeURIComponent(marketing),
            dataType: 'JSON',
            contentType: 'application/x-www-form-urlencoded',
            success: function (data) {
                if (data.flag != 1) {
                    alert("oops!! Something wrong");
                    return false;
                }
            }
        });
    });
//    $('.pitch').click(function () {
//        var url = base_url + '/pitch/view/' + parameter;
//        window.lowindowcation.href = url;
//    });

    $('.competitor_det').submit(function () {
        var data = $('form').serialize();
        var url = base_url + '/pitch/competitor/' + parameter;
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            dataType: 'json',
            async: false,
            beforeSend: function (xhr) {
                $("#competitor_btt").html('Loader').attr('disabled', 'disabled');
            },
            success: function (data) {
                $("#competitor_btt").html('Submit').attr("disabled", false);
                $('table#competitor_table tbody').empty();
                if (data.flag == 1) {
                    if (jQuery.isEmptyObject(data.data))
                    {
                        $('table#competitor_table thead').remove();
                        var html = '<tr class="text-center empty_comp"><td> No Competitors records found!!</td></tr>';
                        $('table#competitor_table tbody').append(html);
                    } else {
                        var count = 1;
                        $.each(data.data, function (i, j) {
                            var html = '<tr data-status="disabled" id="comp_tr_' + j.id + '">\n\
                                    <td class="hidden-xs text-center">' + count + '</td>\n\
                                    <td>' + j.competitor_name + '</td><td>' + j.advantage + '</td>\n\
                                <td align="center" class="text-left">\n\
                                <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Edit" onclick="comp_edit(this,' + j.id + ')"  data-id="' + j.id + '"><em class="fa fa-pencil"></em></a>\n\
                                <a class="btn btn-default" data-toggle = "tooltip" data-placement = "top" title = "Delete" onclick = "comp_delete(' + j.id + ')" data-id = "' + j.id + '" ><em class="fa fa-trash"></em></a>\n\
                                </td>\n\
                                < /tr>';
                            $('table#competitor_table tbody').append(html);
                            count++;
                        });
                    }
                    $('#competitors').modal('hide');
                    $('input[name="competitor"]').val('');
                    $('input[name="advantage"]').val('');
                } else {
                    alert("oops!! Something wrong");
                }
            }
        });
        return false;
    });
    $('.team_details').submit(function () {
        var data = new FormData($('#team_details')[0]);
        var url = base_url + 'pitch/team/' + parameter;
        $.ajax({
            url: url,
            data: data,
            type: 'POST',
            mimeType: "multipart/form-data",
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function (xhr) {
                $("#team_btt").html('Loader').attr('disabled', 'disabled');
            },
            success: function (data) {
                $("#team_btt").html('Submit').attr("disabled", false);
                if (data.flag == '1') {
                    $('table#team_table tbody').empty();
                    var count = '1';
                    var rehtml = '';
                    $.each(data.data, function (i, j) {
                        var img = (j.image != '') ? j.image : 'partner.png';
                        rehtml += '<tr data-status="disabled" class="team_' + j.id + '">\n\
                            <td class="hidden-xs text-center">' + count + '</td>\n\
                            <td class="text-center"><h4>' + j.name + '</h4><h5>' + j.role + '</h5></td>\n\
                            <td class="text-center">\n\
                            <img alt="' + j.image + '" class="img-responsive img-thumbnail da-img" src="' + base_url + 'assets/image/pitch/' + img + '" />\n\
                            </td>\n\
                            <td>' + j.description + '</td>\n\
                            <td align="center" class="text-left">\n\
                            <a class="btn btn-default" onclick="team_edit(' + j.id + ')" data-toggle="tooltip" data-placement="top" title="Edit"><em class="fa fa-pencil"></em></a>\n\
                            <a class="btn btn-default" onclick="team_delete(' + j.id + ')" data-toggle="tooltip" data-placement="top" title="Delete"><em class="fa fa-trash"></em></a>\n\
                            </td>\n\
                            </tr>';
                        count++;
                    })
                    $('table#team_table tbody').html(rehtml);

                    $('.team_details')[0].reset();
                    $('.team_desc').empty();
                    $('.team_desc').limit('200', '.team_desc_limit');
                    $('#team').modal('hide');
                } else {
                    alert("oops!! Something wrong");
                }
            }
        });
        return false;
    });

    $('.partner_details').submit(function () {
        var data = new FormData($('#partner_details')[0]);
        var url = base_url + 'pitch/partner/' + parameter;
        $.ajax({
            url: url,
            data: data,
            type: 'POST',
            mimeType: "multipart/form-data",
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function (xhr) {
                $("#partner_btt").html('Loader').attr('disabled', 'disabled');
            },
            success: function (data) {
                $("#partner_btt").html('Submit').attr("disabled", false);
                if (data.flag == '1') {
                    $('table#partner_table tbody').empty();
                    var count = '1';
                    var rehtml = '';
                    $.each(data.data, function (i, j) {
                        var img = (j.image != '') ? j.image : 'partner.png';
                        rehtml += '<tr data-status="disabled" class="partner_' + j.id + '">\n\
                            <td class="hidden-xs text-center">' + count + '</td>\n\
                            <td class="text-center"><h4>' + j.partner_name + '</h4></td>\n\
                            <td class="text-center">\n\
                            <img alt="' + j.image + '" class="img-responsive img-thumbnail da-img" src="' + base_url + 'assets/image/pitch/' + img + '" />\n\
                            </td>\n\
                            <td>' + j.description + '</td>\n\
                            <td align="center" class="text-left">\n\
                            <a class="btn btn-default" onclick="partner_edit(' + j.id + ')" data-toggle="tooltip" data-placement="top" title="Edit"><em class="fa fa-pencil"></em></a>\n\
                            <a class="btn btn-default" onclick="partner_delete(' + j.id + ')" data-toggle="tooltip" data-placement="top" title="Delete"><em class="fa fa-trash"></em></a>\n\
                            </td>\n\
                            </tr>';
                        count++;
                    })
                    $('table#partner_table tbody').html(rehtml);

                    $('.partner_details')[0].reset();
                    $('.partner_desc').empty();
                    $('.partner_desc').limit('200', '.partner_desc_limit');
                    $('#partner').modal('hide');
                } else {
                    alert("oops!! Something wrong");
                }
            }
        });
        return false;
    });



    $('.milestone_det').submit(function () {
        var name = $('input[name="name"]').val();
        var date = $('input[name="date"]').val();
        var desc = $('.mil_desc').val();
        var type = $('input[name="type"]').val();
        var id = $('input[name="milestone_id"]').val();
        var group = $('input[name="group"]').val();
        var url = base_url + 'pitch/milestones/' + parameter;
        $.ajax({
            url: url,
            data: 'name=' + name + '&date=' + date + '&description=' + encodeURIComponent(desc) + '&type=' + type + '&id=' + id,
            dataType: 'json',
            type: 'POST',
            contentType: 'application/x-www-form-urlencoded',
            beforeSend: function (xhr) {
                $("#milestone_btt").html('Loader').attr('disabled', 'disabled');
            },
            success: function (data) {
                $("#milestone_btt").html('Submit').attr('disabled', false);
                if (data.flag == 1) {
                    $('table#milestones tbody').empty();
                    if (jQuery.isEmptyObject(data.data))
                    {
                        var html = '<tr><td id="ext-gen1019" class=" text-center" valign="top" colspan="5">No Milestones found!!</td></tr>';
                        $('table#milestones tbody').append(html);
                        $('.team_disp').remove();
                    } else {
                        var count = 1;
                        $.each(data.data, function (i, j) {
                            var html = '<tr data-status="disabled">\n\
                                <td class="hidden-xs text-center">' + count + '</td>\n\
                                <td>' + j.name + '</td>\n\
                                <td>' + j.date + '</td>\n\
                                <td>' + j.description + '</td>\n\
                                        <td align="center" class="text-left">\n\
                                        <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Edit" onclick="milestone_edit(this,' + j.id + ')"><em class="fa fa-pencil"></em></a>\n\
                                        <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Delete" onclick="milestone_delete(' + j.id + ',' + group + ')"><em class="fa fa-trash"></em></a>';
                            if (group == '1') {
                                html += '<a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Click to complete milestone" onclick="milestone_complete(this,' + j.id + ')"><em class="glyphicon glyphicon-ok"></em></a>';
                            }
                            html += '</td>\n\
                                        </tr>';
                            $('table#milestones tbody').append(html);
                            ++count;
                        });
                    }
                    $('input[name="name"]').val('');
                    $('input[name="date"]').val('');
                    $('.mil_desc').val('');
                    $('input[name="id"]').val('');
                    $('input[name="type"]').val('add');
                    $('.charsLeft').text('150');
                    $('#milestone').modal('hide');
                } else {
                    alert("oops Something is wrong!!!");
                }
            }
        })
        return false;
    });
    $('.add_comp').click(function () {
        var url1 = base_url + 'get_leads';
        $.ajax({
            url: url1,
            success: function (data) {
                if (data == '2') {
                    var url = base_url + 'new_company';
                    window.location.href = url;
                } else if (data == '1') {
                    $('body').prepend('<div class="popup_back"></div>');
                    $('.popup_cont').fadeIn();
                    return false;
                } else {
                    var redirect = base_url + 'login/logout';
                    window.location.href = redirect;
                }
            }
        });
    });
});
function milestone_edit(ele, id) {
    var company_id = parameter;
    var url = base_url + 'pitch/get_milestones';
    $.ajax({
        data: 'id=' + id + '&company_id=' + company_id,
        url: url,
        type: 'post',
        dataType: 'json',
        async: false,
        success: function (data) {
            if (data.flag == '1') {
                $('input[name="name"]').val(data.name);
                $('input[name="date"]').val(data.date);
                $('.mil_desc').val(data.desc);
                $('input[name="type"]').val('edit');
                $('input[name="milestone_id"]').val(id);
                $('#milestone').modal('show');
            }
        }
    });

}

function milestone_complete(ele, id) {
//        var id = $(this).attr('data-id');
    var company_id = parameter;
    $(ele).closest('tr').remove();
    var url = base_url + 'pitch/complete_milestone/' + id;
    $.ajax({
        url: url,
        data: 'id=' + id + '&company_id=' + company_id,
        type: 'post',
        dataType: 'json',
        async: false,
        beforeSend: function (xhr) {
            bodyfadein();
        },
        success: function (data) {
            bodyfadeout();
            if (data.flag == 1) {
                $('table#completed_milestone tbody').empty();
                if (jQuery.isEmptyObject(data.data))
                {
                    var html = '<tr><td id="ext-gen1019" class=" text-center" valign="top" colspan="5">No Milestones found!!</td></tr>';
                    $('table#milestones tbody').append(html);
                    $('.team_disp').remove();
                } else {
                    var count = 1;
                    $.each(data.data, function (i, j) {
                        var html = '<tr>\n\
                                    <td>' + count + '</td>\n\
                                    <td>' + j.name + '</td>\n\
                                <td>' + j.date + '</td>\n\
                                    <td>' + j.description + '</td>\n\
                                    <td><a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Delete" onclick="milestone_comp_delete(this,' + j.id + ')"><em class="fa fa-trash"></em></a>&nbsp;</td>\n\
                                    </tr>';
                        $('table#completed_milestone tbody').append(html);
                        ++count;
                    });
                }
                $('input[name="name"]').val('');
                $('.desc').val('');
                $('input[name="date"]').val('');
            } else {
                alert("oops!! Something wrong");
            }
        }
    });
}

function milestone_delete(id, type) {
    var company_id = parameter;
    var url = base_url + 'pitch/delete_milestone/' + id;
    $.ajax({
        url: url,
        data: 'id=' + id + '&company_id=' + company_id,
        type: 'post',
        dataType: 'json',
        async: false,
        beforeSend: function (xhr) {
            bodyfadein();
        },
        success: function (data) {
            bodyfadeout();
            if (data.flag == 1) {
                $('table#milestones tbody').empty();
                if (jQuery.isEmptyObject(data.data))
                {
                    var html = '<tr><td id="ext-gen1019" class=" text-center" valign="top" colspan="5">No Milestones found!!</td></tr>';
                    $('table#milestones tbody').append(html);
                    $('.team_disp').remove();
                } else {
                    var count = 1;
                    $.each(data.data, function (i, j) {
                        var html = '<tr data-status="disabled">\n\
                                <td class="hidden-xs text-center">' + count + '</td>\n\
                                <td>' + j.name + '</td>\n\
                                <td>' + j.date + '</td>\n\
                                <td>' + j.description + '</td>\n\
                                        <td align="center" class="text-left">\n\
                                        <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Edit" onclick="milestone_edit(this,' + j.id + ')"><em class="fa fa-pencil"></em></a>\n\
                                        <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Delete" onclick="milestone_delete(' + j.id + ',' + type + ')"><em class="fa fa-trash"></em></a>';
                        if (type == '1') {
                            html += '<a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Click to complete milestone" onclick="milestone_complete(this,' + j.id + ')"><em class="glyphicon glyphicon-ok"></em></a>';
                        }
                        html += '</td>\n\
                                        </tr>';
                        $('table#milestones tbody').append(html);
                        ++count;
                    });
                }
                $('.popup_mask').fadeOut(function () {
                    $(this).remove();
                });
                $('.arrow_box').fadeOut();
                $('input[name="name"]').val('');
                $('.desc').val('');
                $('input[name="date"]').val('');
            } else {
                alert("oops!! Something wrong");
            }
        }
    });
    return false;
}


//delete completed milestone
function milestone_comp_delete(ele, id) {
    $(ele).closest('tr').remove();
    var company_id = parameter;
    var url = base_url + 'pitch/delete_comp_milestone/' + id;
    $.ajax({
        url: url,
        data: 'id=' + id + '&company_id=' + company_id,
        type: 'post',
        dataType: 'json',
        async: false,
        beforeSend: function (xhr) {
            bodyfadein();
        },
        success: function (data) {
            bodyfadeout();
            if (data.flag == 1) {
                $('table#completed_milestone tbody').empty();
                var count = 1;
                if (jQuery.isEmptyObject(data.data))
                {
                    var html = '<tr><td id="ext-gen1019" class=" text-center" valign="top" colspan="5">No Completed Milestones found!!</td></tr>';
                    $('table#completed_milestone tbody').append(html);
                } else {
                    $.each(data.data, function (i, j) {
                        var html = '<tr>\
                                                        <td>' + count + '</td>\
                                                        <td>' + j.name + '</td>\
                                                        <td>' + j.date + '</td>\\n\
                                                            <td>' + j.description + '</td>\
                                                        <td><a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Delete" onclick="milestone_comp_delete(this,' + j.id + ')"><em class="fa fa-trash"></em></a>&nbsp;</td>\
                                                        </tr>';
                        $('table#completed_milestone tbody').append(html);
                        ++count;
                    });
                }
                $('.popup_mask').fadeOut(function () {
                    $(this).remove();
                });
                $('.arrow_box').fadeOut();
                $('input[name="name"]').val('');
                $('.desc').val('');
                $('input[name="date"]').val('');
            } else {
                alert("oops!! Something wrong");
            }
        }
    });
    return false;
}

function team_delete(id) {
    var company_id = parameter;
    var url = base_url + 'pitch/delete_teamdetail/' + id;
    $.ajax({
        url: url,
        data: 'id=' + id + '&company_id=' + company_id,
        type: 'post',
        dataType: 'json',
        beforeSend: function (xhr) {
            bodyfadein();
        },
        success: function (data) {
            bodyfadeout();
            if (data.flag == 1) {
                if (jQuery.isEmptyObject(data.data))
                {
                    $('table#team_table tbody').empty();
                    var html = '<tr><td id="ext-gen1019" class=" text-center" valign="top" colspan="5">No Team Members found!!</td></tr>';
                    $('table#team_table tbody').append(html);
                } else {
                    $('.team_' + id).remove();
                    return false;
                }
            } else {
                alert("oops!! Something wrong");
            }
        }
    });
    return false;
}

function subscription() {
    alert('Have to click button to upgrade your account!!!');
}

function error_msg(value) {
    $('.mail-error').css('display', 'block');
    $('.error_msg').text(value);
}

function exportpdf() {
    var id = parameter;
    var url = base_url + 'plan/pdf/' + id;
    var url1 = base_url + 'subscription/get_sub_detail';
    if (id != '') {
        $.ajax({
            url: url1,
            beforeSend: function (xhr) {
                bodyfadein();
            },
            success: function (data) {
                bodyfadeout();
                if (data == '2') {
                    $('#pdf').submit();
                } else if (data == '1') {
                    $('body').prepend('<div class="popup_back"></div>');
                    $('.popup_cont').fadeIn();
                    return false;
                } else {
                    var redirect = base_url + 'login/logout';
                    window.location.href = redirect;
                }
            }
        });
    } else {
        alert('Something wrong');
        return false;
    }
}

function exportppt() {
    var id = parameter;
    var url = base_url + 'create_ppt/' + id;
    var url1 = base_url + 'subscription/get_sub_detail';
    if (id != '') {
        $.ajax({
            url: url1,
            beforeSend: function (xhr) {
                bodyfadein();
            },
            success: function (data) {
                if (data == '2') {
                    $.ajax({
                        url: url,
                        data: 'id=' + id,
                        type: 'post',
                        dataType: 'json',
                        success: function (data) {
                            bodyfadeout();
                            if (data.flag == '1') {
                                var url = base_url + 'pitch/downloadppt/' + encodeURIComponent(data.title) + '/vnd.openxmlformats-officedocument.presentationml.presentation';
                                window.location.href = url;
                            } else {
                                alert('Something wrong!!!');
                                return false;
                            }
                        }
                    });
                } else if (data == '1') {
                    $('body').prepend('<div class="popup_back"></div>');
                    $('.popup_cont').fadeIn();
                    return false;
                } else {
                    var redirect = base_url + 'login/logout';
                    window.location.href = redirect;
                }
            }
        });
    } else {
        alert('Something wrong');
        return false;
    }
}


function publish() {
    var id = parameter;
    var url = base_url + 'pitch/publish/' + id;
    var url1 = base_url + 'subscription/get_sub_detail';
    $.ajax({
        url: url1,
        beforeSend: function (xhr) {
            bodyfadein();
        },
        success: function (data) {
            if (data == '2') {
                $.ajax({
                    url: url,
                    data: 'id=' + id,
                    type: 'post',
                    dataType: 'json',
                    success: function (data) {
                        bodyfadeout();
                        $.each(data.data, function (i, j) {
                            if (j.flag == '1') {
                                var url = base_url + 'template/pitch/' + j.company_id + '/' + j.publish_id;
                                $('input[name="link"]').val(url).css('display', 'block');
                                $('.btn_publish').html('Stop Publishing My Pitch');
//                                                $('.link').append($('a').prop('href', url));
                            } else if (j.flag == '0') {
                                $('input[name="link"]').val('').css('display', 'none');
                                $('.btn_publish').html('Publish My Pitch');
                            }
                        })

                    }
                });
            } else if (data == '1') {
                bodyfadeout();
                $('body').prepend('<div class="popup_back"></div>');
                $('.popup_cont').fadeIn();
                return false;
                return false;
            } else {
                var redirect = base_url + 'login/logout';
                window.location.href = redirect;
            }
        }
    });
}

function deletecompany($id) {
    var url = base_url + 'companydelete/' + $id;
    $('.delete').attr('href', url)
}

function bodyfadein() {
    $('body').prepend('<div class="popup_back" style="text-align: center;"><img src="' + base_url + 'assets/image/loader.gif" style="position: relative;top:40%;"/></div>');
}

function bodyfadeout() {
    $('.popup_back').fadeOut(function () {
        $(this).remove();
    });
}