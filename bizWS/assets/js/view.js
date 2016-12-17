$(document).ready(function () {

    $(".amcharts-chart-div a").css("display", "none");

//    var chart = AmCharts.makeChart("chartdiv", {
//        "type": "serial",
//        "theme": "light",
//        "dataProvider": [{
//                "country": "USA",
//                "visits": 2025
//            }, {
//                "country": "China",
//                "visits": 1882
//            }, {
//                "country": "Japan",
//                "visits": 1809
//            }, {
//                "country": "Germany",
//                "visits": 1322
//            }],
//        "valueAxes": [{
//                "gridColor": "#FFFFFF",
//                "gridAlpha": 0.2,
//                "dashLength": 0
//            }],
//        "gridAboveGraphs": true,
//        "startDuration": 1,
//        "graphs": [{
//                "balloonText": "[[category]]: <b>[[value]]</b>",
//                "fillAlphas": 0.8,
//                "lineAlpha": 0.2,
//                "type": "column",
//                "valueField": "visits"
//            }],
//        "chartCursor": {
//            "categoryBalloonEnabled": false,
//            "cursorAlpha": 0,
//            "zoomable": false
//        },
//        "categoryField": "country",
//        "categoryAxis": {
//            "gridPosition": "start",
//            "gridAlpha": 0,
//            "tickPosition": "start",
//            "tickLength": 20
//        },
//        "export": {
//            "enabled": true
//        }
//
//    });



    var chart = AmCharts.makeChart("chartdiv", {
        "type": "serial",
        "theme": "light",
        "dataProvider": [{
                "year": "2016",
                "visits": 50000
            }, {
                "country": "China",
                "visits": 1882
            }, {
                "country": "Japan",
                "visits": 1809
            }, {
                "country": "Germany",
                "visits": 1322
            }],
        "valueAxes": [{
                "gridColor": "#FFFFFF",
                "gridAlpha": 0.2,
                "dashLength": 0
            }],
        "gridAboveGraphs": true,
        "startDuration": 1,
        "graphs": [{
                "balloonText": "[[category]]: <b>[[value]]</b>",
                "fillAlphas": 0.8,
                "lineAlpha": 0.2,
                "type": "column",
                "valueField": "visits"
            }],
        "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "country",
        "categoryAxis": {
            "gridPosition": "start",
            "gridAlpha": 0,
            "tickPosition": "start",
            "tickLength": 20
        },
        "export": {
            "enabled": true
        }

    });


    var chart = AmCharts.makeChart("chartdiv_2", {
        "theme": "light",
        "type": "serial",
        "dataProvider": [{
                "country": "2016",
                "year2004": 50000,
                "year2005": 600000
            }, {
                "country": "2017",
                "year2004": 500000,
                "year2005": 300000
            }, {
                "country": "2018",
                "year2004": 800000,
                "year2005": 900000
            }],
        "valueAxes": [{
                "unit": "",
                "position": "left"
            }],
        "startDuration": 1,
        "graphs": [{
                "balloonText": "Expense: <b>[[value]]</b>",
                "fillAlphas": 0.9,
                "lineAlpha": 0.2,
                "title": "2004",
                "type": "column",
                "valueField": "year2004"
            }, {
                "balloonText": "Cost: <b>[[value]]</b>",
                "fillAlphas": 0.9,
                "lineAlpha": 0.2,
                "title": "2005",
                "type": "column",
                "clustered": false,
                "columnWidth": 0.5,
                "valueField": "year2005"
            }],
        "plotAreaFillAlphas": 0.1,
        "categoryField": "country",
        "categoryAxis": {
            "gridPosition": "start"
        },
        "export": {
            "enabled": false
        }

    });


//    var chart = AmCharts.makeChart("chartdiv", {
//        "type": "serial",
//        "theme": "light",
//        "dataProvider": [{
//                "country": "USA",
//                "visits": 2025
//            }, {
//                "country": "China",
//                "visits": 1882
//            }, {
//                "country": "Japan",
//                "visits": 1809
//            }, {
//                "country": "Germany",
//                "visits": 1322
//            }],
//        "valueAxes": [{
//                "gridColor": "#FFFFFF",
//                "gridAlpha": 0.2,
//                "dashLength": 0
//            }],
//        "gridAboveGraphs": true,
//        "startDuration": 1,
//        "graphs": [{
//                "balloonText": "[[category]]: <b>[[value]]</b>",
//                "fillAlphas": 0.8,
//                "lineAlpha": 0.2,
//                "type": "column",
//                "valueField": "visits"
//            }],
//        "chartCursor": {
//            "categoryBalloonEnabled": false,
//            "cursorAlpha": 0,
//            "zoomable": false
//        },
//        "categoryField": "country",
//        "categoryAxis": {
//            "gridPosition": "start",
//            "gridAlpha": 0,
//            "tickPosition": "start",
//            "tickLength": 20
//        },
//        "export": {
//            "enabled": true
//        }
//
//    });


});







 