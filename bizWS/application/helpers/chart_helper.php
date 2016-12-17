<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function generate_chart($data) {
    $ci = & get_instance();
    $ci->load->library('Forecast_chart');
    $chart = new VerticalBarChart(600, 400);
    $year_length = $data['f_length'];
    $year = explode('/', $data['f_year']);
    $financial_year = $year[1];


    $costs = $data['costs']->row();
    $expense = $data['expense']->row();
    $income = $data['income']->row();
    $revenue = $data['revenue']->row();
    if (!empty($costs->fy1) || !empty($costs->fy2) || !empty($costs->fy3) || !empty($costs->fy4) || !empty($costs->fy5) || !empty($expense->fy1) || !empty($expense->fy2) || !empty($expense->fy3) || !empty($expense->fy4) || !empty($expense->fy5) || !empty($income->fy1) || !empty($income->fy2) || !empty($income->fy3) || !empty($income->fy4) || !empty($income->fy5) || !empty($revenue->fy1) || !empty($revenue->fy2) || !empty($revenue->fy3) || !empty($revenue->fy4) || !empty($revenue->fy5)) {
        if (!empty($costs->fy1) || !empty($costs->fy2) || !empty($costs->fy3) || !empty($costs->fy4) || !empty($costs->fy5)) {
            $serie1 = new XYDataSet();
            $serie1->addPoint(new Point("Fy." . $financial_year, $costs->fy1));
            $serie1->addPoint(new Point("Fy." . ($financial_year + 1), $costs->fy2));
            $serie1->addPoint(new Point("Fy." . ($financial_year + 2), $costs->fy3));
            if ($year_length > 3) {
                $serie1->addPoint(new Point("Fy." . ($financial_year + 3), $costs->fy4));
                $serie1->addPoint(new Point("Fy." . ($financial_year + 4), $costs->fy5));
            }
        }

        if (!empty($expense->fy1) || !empty($expense->fy2) || !empty($expense->fy3) || !empty($expense->fy4) || !empty($expense->fy5)) {
            $serie2 = new XYDataSet();
            $serie2->addPoint(new Point("Fy." . $financial_year, $expense->fy1));
            $serie2->addPoint(new Point("Fy." . ($financial_year + 1), $expense->fy2));
            $serie2->addPoint(new Point("Fy." . ($financial_year + 2), $expense->fy3));
            if ($year_length > 3) {
                $serie2->addPoint(new Point("Fy." . ($financial_year + 3), $expense->fy4));
                $serie2->addPoint(new Point("Fy." . ($financial_year + 4), $expense->fy5));
            }
        }

        if (!empty($income->fy1) || !empty($income->fy2) || !empty($income->fy3) || !empty($income->fy4) || !empty($income->fy5)) {
            $serie3 = new XYDataSet();
            $serie3->addPoint(new Point("Fy." . $financial_year, $income->fy1));
            $serie3->addPoint(new Point("Fy." . ($financial_year + 1), $income->fy2));
            $serie3->addPoint(new Point("Fy." . ($financial_year + 2), $income->fy3));
            if ($year_length > 3) {
                $serie3->addPoint(new Point("Fy." . ($financial_year + 3), $income->fy4));
                $serie3->addPoint(new Point("Fy." . ($financial_year + 4), $income->fy5));
            }
        }

        if (!empty($revenue->fy1) || !empty($revenue->fy2) || !empty($revenue->fy3) || !empty($revenue->fy4) || !empty($revenue->fy5)) {
            $serie4 = new XYDataSet();
            $serie4->addPoint(new Point("Fy." . $financial_year, $revenue->fy1));
            $serie4->addPoint(new Point("Fy." . ($financial_year + 1), $revenue->fy2));
            $serie4->addPoint(new Point("Fy." . ($financial_year + 2), $revenue->fy3));
            if ($year_length > 3) {
                $serie4->addPoint(new Point("Fy." . ($financial_year + 3), $revenue->fy4));
                $serie4->addPoint(new Point("Fy." . ($financial_year + 4), $revenue->fy5));
            }
        }
        $dataSet = new XYSeriesDataSet();
        $dataSet->addSerie("Cost", $serie1);
        $dataSet->addSerie("Expense", $serie2);
        $dataSet->addSerie("Profit", $serie3);
        $dataSet->addSerie("Revenue", $serie4);
        $chart->setDataSet($dataSet);
        $chart->getPlot()->setGraphCaptionRatio(0.70);
        $chart->setTitle('Financial report');
        $imgpath = base_url() . 'assets/image/forecast/forecast_' . $income->cid . '.png';
        if (file_exists($imgpath)) {
            unlink($imgpath);
        }
        $chart->render("assets/image/forecast/forecast_" . $income->cid . '.png');
    }

    if (!empty($income->fy1) || !empty($income->fy2) || !empty($income->fy3) || !empty($income->fy4) || !empty($income->fy5)) {
        $serie3 = new XYDataSet();
        $serie3->addPoint(new Point("Fy." . $financial_year, $income->fy1));
        $serie3->addPoint(new Point("Fy." . ($financial_year + 1), $income->fy2));
        $serie3->addPoint(new Point("Fy." . ($financial_year + 2), $income->fy3));
        if ($year_length > 3) {
            $serie3->addPoint(new Point("Fy." . ($financial_year + 3), $income->fy4));
            $serie3->addPoint(new Point("Fy." . ($financial_year + 4), $income->fy5));
        }
        $dataSet = new XYSeriesDataSet();
        $dataSet->addSerie("Income", $serie3);
        $chart->setDataSet($dataSet);
        $chart->getPlot()->setGraphCaptionRatio(0.65);
        $chart->setTitle('Income');
        $imgpath = base_url() . 'assets/image/forecast/income_' . $income->cid . '.png';
        if (file_exists($imgpath)) {
            unlink($imgpath);
        }
        $chart->render("assets/image/forecast/income_" . $income->cid . '.png');
    }

    if (!empty($expense->fy1) || !empty($expense->fy2) || !empty($expense->fy3) || !empty($expense->fy4) || !empty($expense->fy5)) {
        $serie2 = new XYDataSet();
        $serie2->addPoint(new Point("Fy." . $financial_year, $expense->fy1));
        $serie2->addPoint(new Point("Fy." . ($financial_year + 1), $expense->fy2));
        $serie2->addPoint(new Point("Fy." . ($financial_year + 2), $expense->fy3));
        if ($year_length > 3) {
            $serie2->addPoint(new Point("Fy." . ($financial_year + 3), $expense->fy4));
            $serie2->addPoint(new Point("Fy." . ($financial_year + 4), $expense->fy5));
        }
        $dataSet = new XYSeriesDataSet();
        $dataSet->addSerie("Expense", $serie2);
        $chart->setDataSet($dataSet);
        $chart->getPlot()->setGraphCaptionRatio(0.65);
        $chart->setTitle('Expense');
        $imgpath = base_url() . 'assets/image/forecast/Expense_' . $income->cid . '.png';
        if (file_exists($imgpath)) {
            unlink($imgpath);
        }
        $chart->render("assets/image/forecast/Expense_" . $income->cid . '.png');
    }

//    if (!empty($income->fy1) || !empty($income->fy2) || !empty($income->fy3) || !empty($income->fy4) || !empty($income->fy5)) {
////        $dataSet = new XYDataSet();
////        $dataSet->addPoint(new Point("Fy." . $financial_year, $income->fy1));
////        $dataSet->addPoint(new Point("Fy." . ($financial_year + 1), $income->fy2));
////        $dataSet->addPoint(new Point("Fy." . ($financial_year + 2), $income->fy3));
////        if ($year_length > 3) {
////            $dataSet->addPoint(new Point("Fy." . ($financial_year + 3), $income->fy4));
////            $dataSet->addPoint(new Point("Fy." . ($financial_year + 4), $income->fy5));
////        }
////        $chart->setDataSet($dataSet);
////        $chart->getPlot()->setGraphPadding(new Padding(5, 30, 20, 140));
//        if (!empty($expense->fy1) || !empty($expense->fy2) || !empty($expense->fy3) || !empty($expense->fy4) || !empty($expense->fy5)) {
//            $serie2 = new XYDataSet();
//            $serie2->addPoint(new Point("Fy." . $financial_year, $income->fy1));
//            $serie2->addPoint(new Point("Fy." . ($financial_year + 1), $income->fy2));
//            $serie2->addPoint(new Point("Fy." . ($financial_year + 2), $income->fy3));
//            if ($year_length > 3) {
//                $serie2->addPoint(new Point("Fy." . ($financial_year + 3), $income->fy4));
//                $serie2->addPoint(new Point("Fy." . ($financial_year + 4), $income->fy5));
//            }
//        }
//        $dataSet = new XYSeriesDataSet();
//        $dataSet->addSerie("Income", $serie2);
//        $chart->setDataSet($dataSet);
//        $chart->getPlot()->setGraphCaptionRatio(0.65);
//        $chart->setTitle('Income');
//        $chart->render("assets/image/forecast/income_" . $income->cid . '.png');
//    }

    $revenue = $data['revenue']->row();
    if (!empty($revenue->fy1) || !empty($revenue->fy2) || !empty($revenue->fy3) || !empty($revenue->fy4) || !empty($revenue->fy5)) {
//        $dataSet = new XYDataSet();
//        $dataSet->addPoint(new Point("Fy." . $financial_year, $revenue->fy1));
//        $dataSet->addPoint(new Point("Fy." . ($financial_year + 1), $revenue->fy2));
//        $dataSet->addPoint(new Point("Fy." . ($financial_year + 2), $revenue->fy3));
//        if ($year_length > 3) {
//            $dataSet->addPoint(new Point("Fy." . ($financial_year + 3), $revenue->fy4));
//            $dataSet->addPoint(new Point("Fy." . ($financial_year + 4), $revenue->fy5));
//        }
//        $chart->setDataSet($dataSet);
//        $chart->getPlot()->setGraphPadding(new Padding(5, 30, 20, 140));
        $serie1 = new XYDataSet();
        $serie1->addPoint(new Point("Fy." . $financial_year, $revenue->fy1));
        $serie1->addPoint(new Point("Fy." . ($financial_year + 1), $revenue->fy2));
        $serie1->addPoint(new Point("Fy." . ($financial_year + 2), $revenue->fy3));
        if ($year_length > 3) {
            $serie1->addPoint(new Point("Fy." . ($financial_year + 3), $revenue->fy4));
            $serie1->addPoint(new Point("Fy." . ($financial_year + 4), $revenue->fy5));
        }
        $dataSet = new XYSeriesDataSet();
        $dataSet->addSerie("Revenue", $serie1);
        $chart->setDataSet($dataSet);
        $chart->getPlot()->setGraphCaptionRatio(0.65);
        $chart->setTitle('Revenue');
        $imgpath = base_url() . 'assets/image/forecast/revenue_' . $income->cid . '.png';
        if (file_exists($imgpath)) {
            unlink($imgpath);
        }
        $chart->render("assets/image/forecast/revenue_" . $income->cid . '.png');
    }
}
