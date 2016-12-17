<div id="chart_div1" style="width: 400px !important; height: 300px;display: none;"></div>

<div id="chart_div2" style="width: 400px !important; height: 300px;display: none;"></div>

<div id="chart_div3" style="width: 400px !important; height: 300px;display: none;"></div> 


<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/biz_jumper.js"></script>






<?php
$revenue_count = $revenue->num_rows();
if (!empty($revenue_count)) {
    $revenue = $revenue->row();
    $rev_fy1 = $revenue->fy1;
    $rev_fy2 = $revenue->fy2;
    $rev_fy3 = $revenue->fy3;
    $rev_fy4 = $revenue->fy4;
    $rev_fy5 = $revenue->fy5;
} else {
    $rev_fy1 = '0';
    $rev_fy2 = '0';
    $rev_fy3 = '0';
    $rev_fy4 = '0';
    $rev_fy5 = '0';
}
$income_count = $income->num_rows();
if (!empty($income_count)) {
    $income = $income->row();
    $inc_fy1 = floatval($income->fy1);
    $inc_fy2 = floatval($income->fy2);
    $inc_fy3 = floatval($income->fy3);
    $inc_fy4 = floatval($income->fy4);
    $inc_fy5 = floatval($income->fy5);
} else {
    $inc_fy1 = '0';
    $inc_fy2 = '0';
    $inc_fy3 = '0';
    $inc_fy4 = '0';
    $inc_fy5 = '0';
}
$cost_count = $costs->num_rows();
if (!empty($cost_count)) {
    $costs = $costs->row();
    $cost_fy1 = $costs->fy1;
    $cost_fy2 = $costs->fy2;
    $cost_fy3 = $costs->fy3;
    $cost_fy4 = $costs->fy4;
    $cost_fy5 = $costs->fy5;
} else {
    $cost_fy1 = '0';
    $cost_fy2 = '0';
    $cost_fy3 = '0';
    $cost_fy4 = '0';
    $cost_fy5 = '0';
}
$year = explode('/', $f_date);
$financial_year = $year[1];
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    var companyid = '<?php echo $company_id; ?>';
    var duedate1 = '<?php echo $financial_year; ?>';
    var duedate2 = parseInt(duedate1) + parseInt('1');
    var duedate3 = parseInt(duedate2) + parseInt('1');
    var currency = 'Rs.';
    var rev1 =<?php echo $rev_fy1 ?>;
    var rev2 = <?php echo $rev_fy2 ?>;
    var rev3 = <?php echo $rev_fy1 ?>;
    google.charts.load("current", {packages: ['corechart']});
    if ((rev1 != '0.00') || (rev2 != '0.00') || (rev3 != '0.00')) {
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Element", "Revenue", {role: "annotations"}],
                ["FY" + duedate1, <?php echo $rev_fy1 ?>, number_format(<?php echo $rev_fy1 ?>, currency)],
                ["FY" + duedate2, <?php echo $rev_fy1 ?>, number_format(<?php echo $rev_fy1 ?>, currency)],
                ["FY" + duedate3, <?php echo $rev_fy1 ?>, number_format(<?php echo $rev_fy1 ?>, currency)]
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                {calc: "stringify",
                    sourceColumn: 2,
                    type: "string",
                    role: "annotation"
                },
                2]);

            var options = {
                width: 400,
                height: 300,
                bar: {groupWidth: "60%"},
                legend: {position: "none"},
                colors: ['#E1AEF2'],
                annotations: {
                    textStyle: {
                        fontName: 'Trebuchet MS',
                        fontSize: 13,
                        bold: true,
                        color: '#000', // The transparency of the text.
                    },
                    alwaysOutside: true
                },
                vAxis: {
                    gridlines: {color: 'transparent'},
                    textPosition: 'none'
                },
                hAxis: {
                    textStyle: {
                        color: 'black',
                        fontName: 'Arial Black',
                        fontSize: 13,
                        bold: true
                    }
                }
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("chart_div1"));
            google.visualization.events.addListener(chart, 'ready', function () {
                var chart_value = chart.getImageURI();
                var type = 'revenue';
                chartimage(chart_value, type);
            });

            chart.draw(view, options);
        }
    }
    var cost1 = <?php echo $cost_fy1 ?>;
    var cost2 = <?php echo $cost_fy2 ?>;
    var cost3 = <?php echo $cost_fy3 ?>;
    if ((cost1 != '0.00') || (cost2 != '0.00') || (cost3 != '0.00')) {
        google.charts.setOnLoadCallback(drawChart2);
        function drawChart2() {
            var data = google.visualization.arrayToDataTable([
                ["Element", "Cost & Expense", {role: "annotations"}],
                ["FY" + duedate1, <?php echo $cost_fy1 ?>, number_format(<?php echo $cost_fy1 ?>, currency)],
                ["FY" + duedate2, <?php echo $cost_fy2 ?>, number_format(<?php echo $cost_fy2 ?>, currency)],
                ["FY" + duedate3, <?php echo $cost_fy3 ?>, number_format(<?php echo $cost_fy3 ?>, currency)]
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                {calc: "stringify",
                    sourceColumn: 2,
                    type: "string",
                    role: "annotation"
                },
                2]);

            var options = {
                width: 400,
                height: 300,
                bar: {groupWidth: "60%"},
                legend: {position: "none"},
                vAxis: {
//                baselineColor: '#fff',
                    gridlines: {color: 'transparent'},
                    textPosition: 'none'
                },
                hAxis: {
                    textStyle: {
                        color: 'black',
                        fontName: 'Arial Black',
                        fontSize: 13,
                        bold: true
                    }
                },
                colors: ["#A9E858"],
                annotations: {
                    textStyle: {
                        fontName: 'Trebuchet MS',
                        fontSize: 13,
                        bold: true,
                        color: '#000'         // The transparency of the text.
                    },
                    alwaysOutside: true
                }
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("chart_div2"));
            google.visualization.events.addListener(chart, 'ready', function () {
                var chart_value = chart.getImageURI();
                var type = 'cost';
                chartimage(chart_value, type);
            });
            chart.draw(view, options);
        }
    }
    var profit1 = <?php echo $inc_fy1 ?>;
    var profit2 = <?php echo $inc_fy2 ?>;
    var profit3 = <?php echo $inc_fy3 ?>;
    if ((profit1 != '0.00') || (profit2 != '0.00') || (profit3 != '0.00')) {
        google.charts.setOnLoadCallback(drawChart4);
        function drawChart4() {
            var data = google.visualization.arrayToDataTable([
                ["Element", "Profit & Loss", {role: "annotations"}],
                ["FY" + duedate1, <?php echo $inc_fy1 ?>, number_format(<?php echo $inc_fy1 ?>, currency)],
                ["FY" + duedate2, <?php echo $inc_fy2 ?>, number_format(<?php echo $inc_fy2 ?>, currency)],
                ["FY" + duedate3, <?php echo $inc_fy3 ?>, number_format(<?php echo $inc_fy3 ?>, currency)]
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                {calc: "stringify",
                    sourceColumn: 2,
                    type: "string",
                    role: "annotation"
                },
                2]);

            var options = {
                width: 400,
                height: 300,
                bar: {groupWidth: "60%"},
                legend: {position: "none"},
                vAxis: {
//                baselineColor: '#fff',
                    gridlines: {color: 'transparent'},
                    textPosition: 'none'
                },
                hAxis: {
                    textStyle: {
                        color: 'black',
                        fontName: 'Arial Black',
                        fontSize: 13,
                        bold: true
                    }
                },
                colors: ["#6AE89E"],
                annotations: {
                    textStyle: {
                        fontName: 'Trebuchet MS',
                        fontSize: 13,
                        bold: true,
                        color: '#000000'        // The transparency of the text.
                    },
                    alwaysOutside: true
                }
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("chart_div3"));
            google.visualization.events.addListener(chart, 'ready', function () {
                var chart_value = chart.getImageURI();
                var type = 'profit';
                chartimage(chart_value, type);
            });
            chart.draw(view, options);
        }
    }
    function chartimage(chart_value, type) {
        $.ajax({
            url: base_url + 'pitch/create_chart',
            method: 'post',
            async: false,
            data: "imageData=" + encodeURIComponent(chart_value) + '&type=' + type + '&company=' + companyid,
            contentType: 'application/x-www-form-urlencoded',
            success: function (data) {
                console.log(data);
            }
        });
    }
</script>