
// $(document).ready(function(){
//     $(".dropdown").onclick(            
//         function() {
//             $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
//             $(this).toggleClass('open');        
//         },
//         function() {
//             $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
//             $(this).toggleClass('open');       
//         }
//     );
// });







$(document).ready(function () {



    jQuery(".dropdown-menu li.dropdown").on("mouseenter", function () {

        jQuery(this).find(".dropdown-menu").css({"display": "inline-block"}, "slow");

    }).on("mouseleave", function () {

        jQuery(this).find(".dropdown-menu").css({"display": "none"}, "slow");

    });


    $(".com-btnn").click(function (e) {
        e.preventDefault();
        $(".com-left").removeClass("active");
        $(".logo-left").addClass("active");

        $(".com-right").removeClass("active");
        $(".logo-right").addClass("active");
    });

    $(".logo-pbtnn").click(function (e) {
        e.preventDefault();
        $(".logo-left").removeClass("active");
        $(".com-left").addClass("active");

        $(".logo-right").removeClass("active");
        $(".com-right").addClass("active");
    });

    $(".logo-btnn").click(function (e) {
        e.preventDefault();
        $(".logo-left").removeClass("active");
        $(".prb-left").addClass("active");

        $(".logo-right").removeClass("active");
        $(".prb-right").addClass("active");
    });

    $(".prb-pbtnn").click(function (e) {
        e.preventDefault();
        $(".prb-left").removeClass("active");
        $(".com-left").addClass("active");

        $(".prb-right").removeClass("active");
        $(".com-right").addClass("active");
    });

    $(".prb-btnn").click(function (e) {
        e.preventDefault();
        $(".prb-left").removeClass("active");
        $(".sol-left").addClass("active");

        $(".prb-right").removeClass("active");
        $(".sol-right").addClass("active");
    });



    $(".sol-pbtnn").click(function (e) {
        e.preventDefault();
        $(".sol-left").removeClass("active");
        $(".prb-left").addClass("active");

        $(".sol-right").removeClass("active");
        $(".prb-right").addClass("active");
    });

    $(".sol-btnn").click(function (e) {
        e.preventDefault();
        $(".sol-left").removeClass("active");
        $(".tar-left").addClass("active");

        $(".sol-right").removeClass("active");
        $(".tar-right").addClass("active");
    });


    $(".tar-pbtnn").click(function (e) {
        e.preventDefault();
        $(".tar-left").removeClass("active");
        $(".sol-left").addClass("active");

        $(".tar-right").removeClass("active");
        $(".sol-right").addClass("active");
    });

    $(".tar-btnn").click(function (e) {
        e.preventDefault();
        $(".tar-left").removeClass("active");
        $(".cpt-left").addClass("active");

        $(".tar-right").removeClass("active");
        $(".cpt-right").addClass("active");
    });


    $(".cpt-pbtnn").click(function (e) {
        e.preventDefault();
        $(".cpt-left").removeClass("active");
        $(".tar-left").addClass("active");

        $(".cpt-right").removeClass("active");
        $(".tar-right").addClass("active");
    });

    $(".cpt-btnn").click(function (e) {
        e.preventDefault();
        $(".cpt-left").removeClass("active");
        $(".fund-left").addClass("active");

        $(".cpt-right").removeClass("active");
        $(".fund-right").addClass("active");
    });



    $(".fund-pbtnn").click(function (e) {
        e.preventDefault();
        $(".fund-left").removeClass("active");
        $(".cpt-left").addClass("active");

        $(".fund-right").removeClass("active");
        $(".cpt-right").addClass("active");
    });

    $(".fund-btnn").click(function (e) {
        e.preventDefault();
        $(".fund-left").removeClass("active");
        $(".sal-left").addClass("active");

        $(".fund-right").removeClass("active");
        $(".sal-right").addClass("active");
    });



    $(".sal-pbtnn").click(function (e) {
        e.preventDefault();
        $(".sal-left").removeClass("active");
        $(".fund-left").addClass("active");

        $(".sal-right").removeClass("active");
        $(".fund-right").addClass("active");
    });

    $(".sal-btnn").click(function (e) {
        e.preventDefault();
        $(".sal-left").removeClass("active");
        $(".mar-left").addClass("active");
//        $(".mil-left").addClass("active");

        $(".sal-right").removeClass("active");
        $(".mar-right").addClass("active");
    });

    $(".mar-btnn").click(function (e) {
        e.preventDefault();
        $(".mar-left").removeClass("active");
        $(".mil-left").addClass("active");
//        $(".mil-left").addClass("active");

        $(".mar-right").removeClass("active");
        $(".mil-right").addClass("active");
    });



    $(".mil-pbtnn").click(function (e) {
        e.preventDefault();
        $(".mil-left").removeClass("active");
        $(".sal-left").addClass("active");

        $(".mil-right").removeClass("active");
        $(".sal-right").addClass("active");
    });

    $(".mil-btnn").click(function (e) {
        e.preventDefault();
        $(".mil-left").removeClass("active");
        $(".for-left").addClass("active");

        $(".mil-right").removeClass("active");
        $(".for-right").addClass("active");
    });


    $(".for-pbtnn").click(function (e) {
        e.preventDefault();
        $(".for-left").removeClass("active");
        $(".mil-left").addClass("active");

        $(".for-right").removeClass("active");
        $(".mil-right").addClass("active");
    });

    $(".for-btnn").click(function () {
        e.preventDefault();
        $(".for-left").removeClass("active");
        $(".team-left").addClass("active");

        $(".for-right").removeClass("active");
        $(".team-right").addClass("active");
    });


    $(".team-pbtnn").click(function (e) {
        e.preventDefault();
        $(".team-left").removeClass("active");
        $(".for-left").addClass("active");

        $(".team-right").removeClass("active");
        $(".for-right").addClass("active");
    });

    $(".team-btnn").click(function (e) {
        e.preventDefault();
        $(".team-left").removeClass("active");
        $(".ptn-left").addClass("active");

        $(".team-right").removeClass("active");
        $(".ptn-right").addClass("active");
    });


    $(".ptn-pbtnn").click(function (e) {
        e.preventDefault();
        $(".ptn-left").removeClass("active");
        $(".team-left").addClass("active");

        $(".ptn-right").removeClass("active");
        $(".team-right").addClass("active");
    });

    $(".ptn-btnn").click(function (e) {
        e.preventDefault();
        $(".ptn-left").removeClass("active");
        $(".com-left").addClass("active");

        $(".ptn-right").removeClass("active");
        $(".com-right").addClass("active");
    });








    $('.pitch-active').on('hide.bs.dropdown', function () {
        return false;
    });



    $(document).on('click', '.browse', function () {
        var file = $(this).parent().parent().parent().find('.file');
        file.trigger('click');
    });
    $(document).on('change', '.file', function () {
        $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });




});








$(document).ready(function () {




    /* Pitch menu HERF Section*/

    $('.pitch_pitch').click(function () {
        window.location.href = '#';
        return false;
    });

    $('.plan_pitch').click(function () {
        window.location.href = '../plan/plan.html';
        return false;
    });

    $('.forecast_pitch').click(function () {
        window.location.href = '../forecast/forecast.html';
        return false;
    });

//    $('.planing_pitch').click(function () {
//        window.location.href = '../planing/planing.html';
//        return false;
//    });


    /* Plan menu HERF Section*/

    $('.pitch_plan').click(function () {
        window.location.href = '../pitch/pitch.html';
        return false;
    });

    $('.plan_plan').click(function () {
        window.location.href = '#';
        return false;
    });

    $('.forecast_plan').click(function () {
        window.location.href = '../forecast/forecast.html';
        return false;
    });

    $('.planing_plan').click(function () {
        window.location.href = '../planing/planing.html';
        return false;
    });




    /* Forecast menu HERF Section*/

    $('.pitch_forecast').click(function () {
        window.location.href = '../pitch/pitch.html';
        return false;
    });

    $('.plan_forecast').click(function () {
        window.location.href = '../plan/plan.html';
        return false;
    });

    $('.forecast_forecast').click(function () {
        window.location.href = '#';
        return false;
    });

    $('.planing_forecast').click(function () {
        window.location.href = '../planing/planing.html';
        return false;
    });


    /* Planing menu HERF Section*/
    $('.pitch_planing').click(function () {
        window.location.href = '../pitch/pitch.html';
        return false;
    });

    $('.plan_planing').click(function () {
        window.location.href = '../plan/plan.html';
        return false;
    });

    $('.forecast_planing').click(function () {
        window.location.href = '../forecast/forecast.html';
        return false;
    });

    $('.planing_planing').click(function () {
        window.location.href = '#';
        return false;
    });


});

function number_format(val, currency) {
    var n = Math.abs(val);
    if (n >= 1000000000000) {
        var value = (n / 1000000000000);
        var num = value.toFixed(2) + ' T';
    } else if (n >= 1000000000) {
        var value = (n / 1000000000);
        var num = value.toFixed(2) + ' B';
    } else if (n >= 1000000) {
        var value = (n / 1000000);
        var num = value.toFixed(2) + ' M';
    } else if (n >= 1000) {
        var value = (n / 1000);
        var num = value.toFixed(2) + ' K';
    } else {
        var value = '00';
        var num = '00';
    }
    return (val < 0) ? "(" + currency + num + ")" : currency + num;
}











