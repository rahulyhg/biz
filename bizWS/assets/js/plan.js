
function plan_menu($id, $name, $cid) {
    var url = base_url + 'plan/ajax';
    $.ajax({
        type: 'POST',
        data: 'id=' + $id + '&companyid=' + $cid,
        url: url,
        dataType: 'JSON',
        async: false,
        beforeSend: function () {
            $('table#plan-' + $id).empty();
        },
        success: function (data) {
            if (data.flag == '1') {
                var encoded = encodeURIComponent($name);
                var html = '';
                $.each(data.data, function (i, j) {
                    html += '<tr>\n\
                                <td><a href="' + base_url + 'plan/summery/' + $cid + '/' + j.name + '/' + j.id + '"><i class="fa fa-check-square" aria-hidden="true"></i>&nbsp;  ' + j.name + ' </a>\n\
                                </td>\n\
                            </tr>';
                });
                html += '<tr>\n\
                                <td><a href="' + base_url + 'plan/chapter/' + parameter + '/' + encoded + '/' + $id + '"><i class="fa fa-check-square" aria-hidden="true"></i>&nbsp; Add More...</a>\n\
                                </td>\n\
                            </tr>';
                $('table#plan-' + $id).append(html);
            }
        }
    });
    return false;
}

function edittitle($id, $name) {
    $('input[name="topic_name"]').val($name);
    $('input[name="type"]').val('edit');
    $('input[name="id"]').val($id);
}

function hide($id) {
    var url = base_url + 'plan/hide_title';
    $.ajax({
        type: 'POST',
        data: 'id=' + $id,
        url: url,
        success: function (data) {
            if (data == '1') {

            }
        }
    });
}

$(document).ready(function () {
    $('.topic_name').submit(function () {
        var data = $('.topic_name').serialize();
        var pid = $('input[name="chapter_title"]').attr('data-id');
        var url = base_url + 'plan/edit_chapter/' + pid;
        $.ajax({
            type: 'POST',
            data: data,
            url: url,
            dataType: 'JSON',
            beforeSend: function () {
            },
            success: function (data) {
                if (data.flag == '1') {
                    $('#topic_title').empty();
                    $.each(data.data, function (i, j) {
                        var html = '<div class="form-group">\n\
                                   <div class="input-group col-md-6 col-xs-6">\n\
                                   <span class="input-group-addon " id="start-date"><span class="glyphicon glyphicon-list-alt"></span></span>\n\
                                        <input type="text" class="form-control"  value="' + j.name + '"  aria-describedby="start-date" placeholder="Enter Your Topic Name">\n\
                                   </div>\n\
                                   <div class="input-group col-md-5 col-xs-5">\n\
                                        <a class="table_edit edit_chapter" data-target="#EditModal" data-toggle="modal" onclick="edittitle(' + j.id + ', ' + j.name + ')"><em class="fa fa-pencil"></em></a>\n\
                                    </div>\n\
                                    </div>';
                        $('#topic_title').append(html);
                        $('#EditModal,.modal-backdrop ').fadeOut();
                    })
                } else {
                    alert('Not Working');
                    return false;
                }
            }
        });
        return false;
    });
});