<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('common/include'); ?>
    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/css/pitch_view.css" rel="stylesheet">

    <body>
        <?php $nocontent = $this->lang->line('content_view'); ?>
        <div id="bizjumper-main-content">
            <!-- Navigation -->
            <?php // $this->load->view('common/header'); ?>
            <div class="main_container">
                <?php
                $name = (!empty($pitch_details[0]['name'])) ? $pitch_details[0]['name'] : 'Company Name';
                $filepath = 'assets/image/logo/';
                $logo = $pitch_details[0]['logo'];
                $img = (file_exists($filepath . $logo) & !empty($logo)) ? $filepath . $logo : $filepath . 'logo.png';
                $link = base_url() . $img;
                ?>
                <div class="container">
                    <div class="col-md-6 col-sm-6 user_logo">
                        <img alt="Company Logo" class="img-responsive" src="<?php echo $link; ?>">
                    </div>
                    <div class="col-md-6 col-sm-6 user_com">
                        <h1 class="comp-name pull-right"><?php echo ucfirst($name); ?></h1>
                    </div>

                </div>
                <?php
                $headline = strip_tags($pitch_details[0]['headline']);
                $headline = (!empty($headline)) ? $headline : $nocontent;
//                if (!empty($headline)) {
                ?>
                <div class="container wat-we-do">
                    <div class="col-md-2 col-lg-2 col-sm-6" style="text-align: center;">
                        <p style=" color: #2ea194 !important;">
                            <i class="fa fa-microphone" aria-hidden="true" style="display: inline-block;font-size: 52px;padding-left: 25%;text-align: center;"></i>
                        </p>
                    </div>
                    <div class="col-md-10 col-lg-10 col-sm-6">
                        <p><?php echo $headline; ?></p>
                    </div>
                </div>
                <?php // } ?>



                <?php
                $problem = strip_tags($pitch_details[0]['problem']);
                $problem = (!empty($problem)) ? $problem : $nocontent;
                $solution = strip_tags($pitch_details[0]['solution']);
                $solution = (!empty($solution)) ? $solution : $nocontent;
                ?>
                <div class="container part_1">
                    <div class="col-md-6 col-lg-6 col-sm-6 part part_1_1">
                        <h3>Problem Statement</h3>
                        <p><?php echo $problem; ?></p>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 part part_1_2">
                        <h3>The Solution</h3>
                        <p><?php echo $solution; ?></p>
                    </div>
                </div>




                <?php
                $target = strip_tags($pitch_details[0]['target']);
                $target = (!empty($target)) ? $target : $nocontent;
                $count = $competitors->num_rows();
                ?>
                <div class="container part_2">
                    <div class="col-md-6 col-lg-6 col-sm-6 part part_2_1">
                        <h3>Market Opportunity</h3>
                        <!--<div class="col-xs-12 male">-->
                        <p><?php echo $target; ?></p>
                        <!--</div>-->
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 part part_2_2">
                        <h3>Competitive Landscape</h3>
                        <?php if ($count != '0') { ?>
                            <table class="table table-striped table-bordered land">
                                <thead>
                                    <tr>
                                        <th>Competitor Name</th>
                                        <th>Advantage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($competitors->result_object() as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row->competitor_name; ?></td>
                                            <td><?php echo $row->advantage; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php
                        } else {
                            echo '<p>' . $nocontent . '</p>';
                        }
                        ?>
                    </div>
                </div>




                <?php
                $fund_use = strip_tags($pitch_details[0]['fund_use']);
                $n = (!empty($pitch_details[0]['fund_amount'])) ? $pitch_details[0]['fund_amount'] : '00';
                $fund_use = (!empty($fund_use)) ? $pitch_details[0]['fund_use'] : $nocontent;
                switch ($currency) {
                    case '1':
                        $curr_type = 'fa-inr';
                        break;
                    case '2':
                        $curr_type = 'fa-usd';
                        break;
                    case '3':
                        $curr_type = 'fa-yen';
                        break;
                    case '4':
                        $curr_type = 'fa-gbp';
                        break;
                    default:
                        break;
                }
                ?>
                <div class="container part part_3">
                    <div class="col-md-4 col-lg-4 col-sm-6 text-center">
                        <div class="col-sm-4">
                            <p class="dollar"><i class="fa <?php echo $curr_type; ?>" aria-hidden="true"></i></p>
                        </div>

                        <div class="col-sm-8">
                            <div id="hexagon"><span><?php echo $fund_amt; ?></span> </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-8 col-sm-6 landscape">
                        <h3>Funding Needs</h3>
                        <p><?php echo $fund_use; ?></p>
                    </div>
                </div>

                <?php
                $sales = strip_tags($pitch_details[0]['sales']);
                $sales = (!empty($sales)) ? $sales : $nocontent;
                $marketing = strip_tags($pitch_details[0]['marketing']);
                $marketing = (!empty($marketing)) ? $marketing : $nocontent;
                ?>
                <div class="container part part_5 text-center">
                    <h3>Sales and Marketing</h3>
                </div>
                <div class="container part_1">
                    <div class="col-md-6 col-lg-6 col-sm-6 part">
                        <h3>Sales Channels</h3>
                        <p><?php echo $sales; ?></p>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 part part_2_2">
                        <h3>Marketing Activities</h3>
                        <p><?php echo $marketing; ?></p>
                    </div>
                </div>


                <div class="container part_5 text-center">
                    <h3>Financial Projections</h3>
                </div>
                <div class="container part_6">
                    <div class="col-md-4 col-sm-4">
                        <!--                        <div id="chartdiv"></div> -->
                        <div id="chart_div" style="width: 400px !important; height: 300px;"></div>

                        <h4 class="text-center"> Revenue</h4>   
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <div id="chartdiv_3" style="width: 400px !important; height: 300px;"></div> 
                        <h4 class="text-center"> Cost & Expense</h4>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div id="chartdiv_4" style="width: 400px !important; height: 300px;"></div> 
                        <h4 class="text-center"> Profit & Loss</h4>
                    </div>
                </div>



                <?php
                $milestone = $milestones->num_rows();
                ?>
                <div class="container part_5 text-center">
                    <h3>Traction</h3>
                </div>
                <div class="container part_1 mile">
                    <?php
                    if ($milestone != '0') {
                        ?>
                        <table class="table table-striped table-bordered land ">
                            <thead>
                                <tr>
                                    <th class="col-sm-6"><h4>DATE</h4></th>
                                    <th class="col-sm-6"><h4>MILESTONES</h4></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($milestones->result_object() as $row) {
                                    ?>
                                    <tr>
                                        <td class="col-sm-6"><?php echo $row->date; ?></td>
                                        <td class="col-sm-6"><?php echo $row->name; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php
                    } else {
                        echo '<p class="text-center">' . $nocontent . '</p>';
                    }
                    ?>
                </div>


                <?php
                $count = $team->num_rows();
                ?>
                <div class="container part_5 text-center">
                    <h3>Our Team</h3>
                </div>
                <div class="team">
                    <?php if ($count != '0') { ?>
                        <div class="container">
                            <?php
                            foreach ($team->result_object() as $row) {

                                $url = "assets/image/pitch/$row->image";
                                if (!empty($row->image) && file_exists($url)) {
                                    $img = base_url() . $url;
                                } else {
                                    $img = base_url() . 'assets/image/man.png';
                                }
                                ?>
                                <div class=" col-md-3 col-sm-3 col-xs-12">
                                    <div class="card hovercard">
                                        <div class="cardheader">
                                        </div>
                                        <div class="avatar">
                                            <img alt="" src="<?php echo $img; ?>">
                                        </div>
                                        <div class="info">
                                            <div class="title">
                                                <a><?php echo $row->name ?></a>
                                            </div>
                                            <div class="desc"><?php echo $row->role; ?></div>
                                            <div class="desc"><?php echo $row->description ?></div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <?php
                    } else {
                        echo '<p class="text-center">' . $nocontent . '</p>';
                    }
                    ?>
                </div>


                <?php
                $count = $partner->num_rows();
                ?>
                <div class="container part_5 text-center">
                    <h3>Partners or Suppliers</h3>
                </div>
                <div class="team">
                    <?php if ($count > 0) { ?>
                        <div class="container">
                            <?php
                            foreach ($partner->result_object() as $row) {

                                $url = "assets/image/pitch/$row->image";
                                if (!empty($row->image) && file_exists($url)) {
                                    $img = base_url() . $url;
                                } else {
                                    $img = base_url() . 'assets/image/man.png';
                                }
                                ?>
                                <div class=" col-md-3 col-sm-3 col-xs-12">
                                    <div class="card hovercard">
                                        <div class="cardheader">
                                        </div>
                                        <div class="avatar">
                                            <img alt="" src="<?php echo $img; ?>">
                                        </div>
                                        <div class="info">
                                            <div class="title">
                                                <a><?php echo $row->partner_name ?></a>
                                            </div>
                                            <div class="desc"><?php echo $row->description ?></div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <?php
                    } else {
                        echo '<p class="text-center">' . $nocontent . '</p>';
                    }
                    ?>
                </div>
            </div>
            <!-- Footer -->
            <?php $this->load->view('common/footer'); ?>
        </div>
        <!-- /.container -->
    </div>
    <!-- /bizjumper-main-content -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
    <!--<script src="<?php echo base_url() ?>assets/js/view.js"></script>-->
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <!-- Custom JavaScript -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/biz_jumper.js"></script>

    <script src="<?php echo base_url() ?>assets/charts/amcharts.js"></script>
    <script src="<?php echo base_url() ?>assets/charts/serial.js"></script>
    <script src="<?php echo base_url() ?>assets/charts//export.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/charts/export.css" type="text/css" media="all" />
    <script src="<?php echo base_url() ?>assets/charts/light.js"></script>
</body>
</html>
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
                        fontName: 'Times-Roman',
                        fontSize: 13,
                        bold: true,
                        color: '#000', // The color of the text outline.
                        opacity: 0.9          // The transparency of the text.
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
            var chart = new google.visualization.ColumnChart(document.getElementById("chart_div"));
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
                ["Element", "Revenue", {role: "annotations"}],
                ["Fy" + duedate1, <?php echo $cost_fy1 ?>, number_format(<?php echo $cost_fy1 ?>, currency)],
                ["Fy" + duedate2, <?php echo $cost_fy2 ?>, number_format(<?php echo $cost_fy2 ?>, currency)],
                ["Fy" + duedate3, <?php echo $cost_fy3 ?>, number_format(<?php echo $cost_fy3 ?>, currency)]
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
                        fontName: 'Times-Roman',
                        fontSize: 13,
                        bold: true,
                        color: '#000', // The color of the text outline.
                        opacity: 0.9          // The transparency of the text.
                    },
                    alwaysOutside: true
                }
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("chartdiv_3"));

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
                ["Element", "Revenue", {role: "annotations"}],
                ["Fy" + duedate1, <?php echo $inc_fy1 ?>, number_format(<?php echo $inc_fy1 ?>, currency)],
                ["Fy" + duedate2, <?php echo $inc_fy2 ?>, number_format(<?php echo $inc_fy2 ?>, currency)],
                ["Fy" + duedate3, <?php echo $inc_fy3 ?>, number_format(<?php echo $inc_fy3 ?>, currency)]
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
                        fontName: 'Times-Roman',
                        fontSize: 13,
                        bold: true,
                        color: '#000000', // The color of the text outline.
                        opacity: 0.9          // The transparency of the text.
                    },
                    alwaysOutside: true
                }
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("chartdiv_4"));

            chart.draw(view, options);
        }
    }

</script>
<script language="javascript">
    document.onmousedown = disableclick;
    var status = "Right Click Disabled";
    function disableclick(event)
    {
        if (event.button == 2)
        {
            alert(status);
            return false;
        }
    }

    $(document).keydown(function (e) {
        if (e.ctrlKey) {
            return false;
        }
    });
</script>