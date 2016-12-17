<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function getPpt($data) {
    $CI = &get_instance();
    $CI->load->library('PHPPowerPoint');

    /** PHPPowerpoint_Slide */
    require_once 'PHPPowerPoint/IOFactory.php';

// Set properties
    $objPHPPowerPoint = new PHPPowerPoint();

    $objPHPPowerPoint->removeSlideByIndex(0);

// Create templated slide
    date('H:i:s') . " Create templated slide\n";
//$currentSlide = createTemplatedSlide($objPHPPowerPoint , $logo); // local function
    $logo = $data['logo'];
    $currentSlide = get_logo($objPHPPowerPoint, $logo);
// Create a shape (text)
    date('H:i:s') . " Create a shape (rich text)\n";
    $shape = $currentSlide->createRichTextShape();
    $shape->setHeight(200);
    $shape->setWidth(600);
    $shape->setOffsetX(150);
    $shape->setOffsetY(350);
    $shape->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_CENTER);
    $shape->createBreak();
    $company = (!empty($data['pitch'][0]['name'])) ? $data['pitch'][0]['name'] : '';
    $textRun = $shape->createTextRun(ucfirst($company));
    $textRun->getFont()->setBold(true);
    $textRun->getFont()->setSize(45);
    $textRun->getFont()->setName('Trebuchet MS');
    $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('000000'));


// HEADLINE
    $head = (!empty($data['pitch'][0]['headline'])) ? $data['pitch'][0]['headline'] : '';
    $headline = strip_tags($head);
    if (!empty($headline)) {
// Create templated slide
        date('H:i:s') . " Create templated slide\n";
        $currentSlide = createTemplatedSlide($objPHPPowerPoint, $logo); // local function
// Create a shape (text)
        date('H:i:s') . " Create a shape (rich text)\n";
        $shape = $currentSlide->createRichTextShape();
        $shape->setHeight(100);
        $shape->setWidth(860);
        $shape->setOffsetX(50);
        $shape->setOffsetY(60);
        $shape->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);
        $textRun = $shape->createTextRun('Elevator Pitch');
        $textRun->getFont()->setBold(true);
        $textRun->getFont()->setSize(50);
        $textRun->getFont()->setName('Trebuchet MS');
        $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('C6C6C6'));
// Create a shape (text)
        date('H:i:s') . " Create a shape (rich text)\n";
        $shape = $currentSlide->createRichTextShape();
        $shape->setHeight(400);
        $shape->setWidth(790);
        $shape->setOffsetX(50);
        $shape->setOffsetY(200);
        $shape->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);
        $textRun = $shape->createTextRun($headline);
        $textRun->getFont()->setSize(32);
        $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('3C3D3F'));
//        $textRun->getFont()->setName('Trebuchet MS');
    }

// PROBLEM    
    $prob = (!empty($data['pitch'][0]['problem'])) ? $data['pitch'][0]['problem'] : '';
    $problem = strip_tags($prob);
    if (!empty($problem)) {
// Create templated slide
        date('H:i:s') . " Create templated slide\n";
        $currentSlide = createTemplatedSlide($objPHPPowerPoint, $logo); // local function
// Create a shape (text)
        date('H:i:s') . " Create a shape (rich text)\n";
        $shape = $currentSlide->createRichTextShape();
        $shape->setHeight(100);
        $shape->setWidth(860);
        $shape->setOffsetX(50);
        $shape->setOffsetY(60);
        $shape->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);
        $textRun = $shape->createTextRun('Problem Statement');
        $textRun->getFont()->setBold(true);
        $textRun->getFont()->setSize(50);
        $textRun->getFont()->setName('Trebuchet MS');
        $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('C6C6C6'));
// Create a shape (text)
        date('H:i:s') . " Create a shape (rich text)\n";
        $shape = $currentSlide->createRichTextShape();
        $shape->setHeight(400);
        $shape->setWidth(790);
        $shape->setOffsetX(50);
        $shape->setOffsetY(200);
        $shape->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);
        $textRun = $shape->createTextRun($problem);
        $textRun->getFont()->setSize(32);
        $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('000000'));
    }

// SOLUTION    
    $sol = (!empty($data['pitch'][0]['solution'])) ? $data['pitch'][0]['solution'] : '';
    $solution = strip_tags($sol);
    if (!empty($solution)) {
        // Create templated slide
        date('H:i:s') . " Create templated slide\n";
        $currentSlide = createTemplatedSlide($objPHPPowerPoint, $logo); // local function
// Create a shape (text)
        date('H:i:s') . " Create a shape (rich text)\n";
        $shape = $currentSlide->createRichTextShape();
        $shape->setHeight(100);
        $shape->setWidth(860);
        $shape->setOffsetX(50);
        $shape->setOffsetY(60);
        $shape->setWidthAndHeight(500, 50);
        $shape->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);
        $textRun = $shape->createTextRun('The Solution');
        $textRun->getFont()->setBold(true);
        $textRun->getFont()->setSize(50);
        $textRun->getFont()->setName('Trebuchet MS');
        $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('C6C6C6'));
// Create a shape (text)
        date('H:i:s') . " Create a shape (rich text)\n";
        $shape = $currentSlide->createRichTextShape();
        $shape->setHeight(400);
        $shape->setWidth(790);
        $shape->setOffsetX(50);
        $shape->setOffsetY(200);
        $shape->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);
        $textRun = $shape->createTextRun($solution);
        $textRun->getFont()->setSize(32);
        $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('000000'));
    }

// TARGET    
    $tar = (!empty($data['pitch'][0]['target'])) ? $data['pitch'][0]['target'] : '';
    $target = strip_tags($tar);
    if (!empty($target)) {
        // Create templated slide
        date('H:i:s') . " Create templated slide\n";
        $currentSlide = createTemplatedSlide($objPHPPowerPoint, $logo); // local function
// Create a shape (text)
        date('H:i:s') . " Create a shape (rich text)\n";
        $shape = $currentSlide->createRichTextShape();
        $shape->setHeight(100);
        $shape->setWidth(860);
        $shape->setOffsetX(50);
        $shape->setOffsetY(60);
        $shape->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);
        $textRun = $shape->createTextRun('Market Opportunity');
        $textRun->getFont()->setBold(true);
        $textRun->getFont()->setSize(50);
        $textRun->getFont()->setName('Trebuchet MS');
        $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('C6C6C6'));
// Create a shape (text)
        date('H:i:s') . " Create a shape (rich text)\n";
        $shape1 = $currentSlide->createRichTextShape();
        $shape1->setHeight(400);
        $shape1->setWidth(790);
        $shape1->setOffsetX(50);
        $shape1->setOffsetY(200);
        $shape1->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);
        $textRun = $shape1->createTextRun($target);
        $textRun->getFont()->setSize(32);
        $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('000000'));
    }


// Competitors
    $competitors = $data['competitors']->result();
    $competitors_count = count($competitors);
    if (!empty($competitors_count)) {
        // Create templated slide
        date('H:i:s') . " Create templated slide\n";
        $currentSlide = createTemplatedSlide($objPHPPowerPoint, $logo); // local function
// Create a shape (text)
        date('H:i:s') . " Create a shape (rich text)\n";
        $shape5 = $currentSlide->createRichTextShape();
        $shape5->setHeight(100);
        $shape5->setWidth(860);
        $shape5->setOffsetX(50);
        $shape5->setOffsetY(60);
        $shape5->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);
        $textRun5 = $shape5->createTextRun('Competitive Landscape');
        $textRun5->getFont()->setBold(true);
        $textRun5->getFont()->setSize(50);
        $textRun5->getFont()->setName('Trebuchet MS');
        $textRun5->getFont()->setColor(new PHPPowerPoint_Style_Color('C6C6C6'));
// Create a shape (text)
        $shapetext1 = $currentSlide->createRichTextShape();
        $textRun = $shapetext1->createTextRun('Competitors');
        $textRun->getFont()->setBold(true);
        $textRun->getFont()->setSize(22);
        $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('000000'));
        $shapetext1->createBreak();
        $shapetext1->setHeight(10);
        $shapetext1->setWidth(350);
        $shapetext1->setOffsetX(150);
        $shapetext1->setOffsetY(720 - 460 - 50);
        $shapetext1->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);

        $shapetext1 = $currentSlide->createRichTextShape();
        $textRun = $shapetext1->createTextRun('Advantages');
        $textRun->getFont()->setBold(true);
        $textRun->getFont()->setSize(22);
        $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('000000'));
        $shapetext1->createBreak();
        $shapetext1->setHeight(10);
        $shapetext1->setWidth(450);
        $shapetext1->setOffsetX(350);
        $shapetext1->setOffsetY(720 - 460 - 50);
        $shapetext1->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);

        $length = '400';
        $val = '1';
        foreach ($competitors as $row) {
//            $shapetext1 = $currentSlide->createRichTextShape();
//            $textRun = $shapetext1->createTextRun($val);
//            $textRun->getFont()->setBold(false);
//            $textRun->getFont()->setSize(18);
//            $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('000000'));
//            $shapetext1->createBreak();
//            $shapetext1->setHeight(10);
//            $shapetext1->setWidth(300);
//            $shapetext1->setOffsetX(150);
//            $shapetext1->setOffsetY(720 - $length - 50);
//            $shapetext1->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);

            $shapetext1 = $currentSlide->createRichTextShape();
            $textRun = $shapetext1->createTextRun($row->competitor_name);
            $textRun->getFont()->setBold(false);
            $textRun->getFont()->setSize(18);
            $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('000000'));
            $shapetext1->createBreak();
            $shapetext1->setHeight(10);
            $shapetext1->setWidth(450);
            $shapetext1->setOffsetX(150);
            $shapetext1->setOffsetY(720 - $length - 50);
            $shapetext1->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);

            $shapetext1 = $currentSlide->createRichTextShape();
            $textRun = $shapetext1->createTextRun($row->advantage);
            $textRun->getFont()->setBold(false);
            $textRun->getFont()->setSize(20);
            $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('000000'));
            $shapetext1->createBreak();
            $shapetext1->setHeight(10);
            $shapetext1->setWidth(550);
            $shapetext1->setOffsetX(350);
            $shapetext1->setOffsetY(720 - $length - 50);
            $shapetext1->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);
            $length = $length - 60;
            $val++;
        }
    }

// FUNDS    
    $fund_use = (!empty($data['pitch'][0]['fund_use'])) ? $data['pitch'][0]['fund_use'] : '';
    $funds = strip_tags($fund_use);
    $fund_amt = (!empty($data['pitch'][0]['fund_amount'])) ? $data['pitch'][0]['fund_amount'] : '';
    $n = $fund_amt;

    if ($n >= 1000000000000) {
        $val = round(($n / 1000000000000), 1) . ' T';
    } else if ($n >= 1000000000) {
        $val = round(($n / 1000000000), 1) . ' B';
    } else if ($n >= 1000000) {
        $val = round(($n / 1000000), 1) . ' M';
    } else if ($n >= 1000) {
        $val = round(($n / 1000), 1) . ' K';
    } else {
        $val = '';
    }
    if (!empty($funds)) {
// Create templated slide
        date('H:i:s') . " Create templated slide\n";
        $currentSlide = createTemplatedSlide($objPHPPowerPoint, $logo); // local function
// Create a shape (text)
        date('H:i:s') . " Create a shape (rich text)\n";
        $shape = $currentSlide->createRichTextShape();
        $shape->setHeight(100);
        $shape->setWidth(630);
        $shape->setOffsetX(50);
        $shape->setOffsetY(60);
        $shape->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);
        $textRun = $shape->createTextRun('Funding Needs');
        $textRun->getFont()->setBold(true);
        $textRun->getFont()->setSize(50);
        $textRun->getFont()->setName('Trebuchet MS');
        $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('C6C6C6'));
        date('H:i:s') . " Create a shape (rich text)\n";
        $shape = $currentSlide->createRichTextShape();
        $shape->setHeight(100);
        $shape->setWidth(630);
        $shape->setOffsetX(630);
        $shape->setOffsetY(60);
        $shape->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);
        $textRun = $shape->createTextRun('Rs' . $val);
        $textRun->getFont()->setBold(true);
        $textRun->getFont()->setSize(50);
        $textRun->getFont()->setName('Trebuchet MS');
        $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('000000'));

// Create a shape (text)
        date('H:i:s') . " Create a shape (rich text)\n";
        $shape = $currentSlide->createRichTextShape();
        $shape->setHeight(400);
        $shape->setWidth(790);
        $shape->setOffsetX(50);
        $shape->setOffsetY(200);
        $shape->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);
        $textRun = $shape->createTextRun($funds);
        $textRun->getFont()->setSize(32);
        $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('000000'));
    }


//SALES    
    $sal = (!empty($data['pitch'][0]['sales'])) ? $data['pitch'][0]['sales'] : '';
    $sales = strip_tags($sal);
    if (!empty($sales)) {
// Create templated slide
        date('H:i:s') . " Create templated slide\n";
        $currentSlide = createTemplatedSlide($objPHPPowerPoint, $logo); // local function
// Create a shape (text)
        date('H:i:s') . " Create a shape (rich text)\n";
        $shape = $currentSlide->createRichTextShape();
        $shape->setHeight(100);
        $shape->setWidth(860);
        $shape->setOffsetX(50);
        $shape->setOffsetY(60);
        $shape->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);
        $textRun = $shape->createTextRun('Sales Channels');
        $textRun->getFont()->setBold(true);
        $textRun->getFont()->setSize(50);
        $textRun->getFont()->setName('Trebuchet MS');
        $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('C6C6C6'));
// Create a shape (text)
        date('H:i:s') . " Create a shape (rich text)\n";
        $shape = $currentSlide->createRichTextShape();
        $shape->setHeight(400);
        $shape->setWidth(790);
        $shape->setOffsetX(50);
        $shape->setOffsetY(200);
        $shape->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);
        $textRun = $shape->createTextRun($sales);
        $textRun->getFont()->setSize(32);
        $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('000000'));
    }

//MARKETING
    $mark = (!empty($data['pitch'][0]['marketing'])) ? $data['pitch'][0]['marketing'] : '';
    $marketing = strip_tags($mark);
    if (!empty($marketing)) {
// Create templated slide
        date('H:i:s') . " Create templated slide\n";
        $currentSlide = createTemplatedSlide($objPHPPowerPoint, $logo); // local function
// Create a shape (text)
        date('H:i:s') . " Create a shape (rich text)\n";
        $shape5 = $currentSlide->createRichTextShape();
        $shape5->setHeight(100);
        $shape5->setWidth(860);
        $shape5->setOffsetX(50);
        $shape5->setOffsetY(60);
        $shape5->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);
        $textRun5 = $shape5->createTextRun('Marketing Activities');
        $textRun5->getFont()->setBold(true);
        $textRun5->getFont()->setSize(50);
        $textRun5->getFont()->setName('Trebuchet MS');
        $textRun5->getFont()->setColor(new PHPPowerPoint_Style_Color('C6C6C6'));
// Create a shape (text)
        date('H:i:s') . " Create a shape (rich text)\n";
        $shape = $currentSlide->createRichTextShape();
        $shape->setHeight(400);
        $shape->setWidth(790);
        $shape->setOffsetX(50);
        $shape->setOffsetY(200);
        $shape->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);
        $textRun = $shape->createTextRun($marketing);
        $textRun->getFont()->setSize(32);
        $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('000000'));
    }





//For Financial Projection
    $forecast = 'assets/image/forecast/forecast_' . $data['company_id'] . '.png';
    $revenue = 'assets/image/forecast/revenue_' . $data['company_id'] . '.png';
    $income = 'assets/image/forecast/income_' . $data['company_id'] . '.png';
    $expense = 'assets/image/forecast/expense_' . $data['company_id'] . '.png';
    if (file_exists($revenue) || file_exists($income) || file_exists($expense)) {
        date('H:i:s') . " Create templated slide\n";
        $currentSlide = createTemplatedSlide($objPHPPowerPoint, $logo); // local function
//for showing images
        $count = '100';
        if (file_exists($forecast)) {
            $shapepic3 = $currentSlide->createDrawingShape();
            $shapepic3->setName('PHPPowerPoint logo');
            $shapepic3->setPath('assets/image/forecast/forecast_' . $data['company_id'] . '.png');
            $shapepic3->setHeight(600);
            $shapepic3->setwidth(700);
            $shapepic3->setOffsetX(100);
            $shapepic3->setOffsetY(720 - 340 - 230);
            $count = $count + 250;
        }

//        if (file_exists($income)) {
//            $shapepic3 = $currentSlide->createDrawingShape();
//            $shapepic3->setName('PHPPowerPoint logo');
//            $shapepic3->setPath('assets/image/forecast/income_' . $data['company_id'] . '.png');
//            $shapepic3->setHeight(600);
//            $shapepic3->setwidth(300);
//            $shapepic3->setOffsetX(330);
//            $shapepic3->setOffsetY(720 - 380 - 100);
//            $count = $count + 250;
//        }
//
//        if (file_exists($expense)) {
//            $shapepic3 = $currentSlide->createDrawingShape();
//            $shapepic3->setName('PHPPowerPoint logo');
//            $shapepic3->setPath('assets/image/forecast/expense_' . $data['company_id'] . '.png');
//            $shapepic3->setHeight(600);
//            $shapepic3->setwidth(300);
//            $shapepic3->setOffsetX(640);
//            $shapepic3->setOffsetY(720 - 380 - 100);
//            $count = $count + 250;
//        }
//For title
        $shapetitle = $currentSlide->createRichTextShape();
        $shapetitle->setHeight(100);
        $shapetitle->setWidth(930);
        $shapetitle->setOffsetX(60);
        $shapetitle->setOffsetY(720 - 600 - 100);
        $shapetitle->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);
        $textRun2 = $shapetitle->createTextRun('Financial Projections');
        $textRun2->getFont()->setBold(true);
        $textRun2->getFont()->setSize(50);
        $textRun2->getFont()->setName('Trebuchet MS');
        $textRun2->getFont()->setColor(new PHPPowerPoint_Style_Color('C6C6C6'));
    }





//Milestones
    $Mil = $data['milestones']->result();
    $milestones_count = count($Mil);
    if (!empty($milestones_count)) {
        // Create templated slide
        date('H:i:s') . " Create templated slide\n";
        $currentSlide = createTemplatedSlide($objPHPPowerPoint, $logo); // local function
// Create a shape (text)
        date('H:i:s') . " Create a shape (rich text)\n";
        $shape5 = $currentSlide->createRichTextShape();
        $shape5->setHeight(100);
        $shape5->setWidth(860);
        $shape5->setOffsetX(50);
        $shape5->setOffsetY(60);
        $shape5->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);
        $textRun5 = $shape5->createTextRun('Traction');
        $textRun5->getFont()->setBold(true);
        $textRun5->getFont()->setSize(50);
        $textRun5->getFont()->setName('Trebuchet MS');
        $textRun5->getFont()->setColor(new PHPPowerPoint_Style_Color('C6C6C6'));
// Create a shape (text)
        $shapetext1 = $currentSlide->createRichTextShape();
        $textRun = $shapetext1->createTextRun('Date');
        $textRun->getFont()->setBold(true);
        $textRun->getFont()->setSize(30);
        $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('000000'));
        $shapetext1->createBreak();
        $shapetext1->setHeight(10);
        $shapetext1->setWidth(300);
        $shapetext1->setOffsetX(200);
        $shapetext1->setOffsetY(720 - 460 - 50);
        $shapetext1->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);

        $shapetext1 = $currentSlide->createRichTextShape();
        $textRun = $shapetext1->createTextRun('Milestones');
        $textRun->getFont()->setBold(true);
        $textRun->getFont()->setSize(30);
        $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('000000'));
        $shapetext1->createBreak();
        $shapetext1->setHeight(10);
        $shapetext1->setWidth(300);
        $shapetext1->setOffsetX(450);
        $shapetext1->setOffsetY(720 - 460 - 50);
        $shapetext1->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);

        $length = '400';
        $val = '1';
        foreach ($Mil as $row) {
//Step 1 for milestones
            $shapetext1 = $currentSlide->createRichTextShape();
            $textRun = $shapetext1->createTextRun($val);
            $textRun->getFont()->setBold(false);
            $textRun->getFont()->setSize(20);
            $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('000000'));
            $shapetext1->createBreak();
            $shapetext1->setHeight(10);
            $shapetext1->setWidth(300);
            $shapetext1->setOffsetX(150);
            $shapetext1->setOffsetY(720 - $length - 50);
            $shapetext1->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);

            $shapetext1 = $currentSlide->createRichTextShape();
            $textRun = $shapetext1->createTextRun($row->date);
            $textRun->getFont()->setBold(false);
            $textRun->getFont()->setSize(20);
            $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('000000'));
            $shapetext1->createBreak();
            $shapetext1->setHeight(10);
            $shapetext1->setWidth(300);
            $shapetext1->setOffsetX(200);
            $shapetext1->setOffsetY(720 - $length - 50);
            $shapetext1->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);

            $shapetext1 = $currentSlide->createRichTextShape();
            $textRun = $shapetext1->createTextRun($row->name);
            $textRun->getFont()->setBold(false);
            $textRun->getFont()->setSize(20);
            $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('000000'));
            $shapetext1->createBreak();
            $shapetext1->setHeight(10);
            $shapetext1->setWidth(450);
            $shapetext1->setOffsetX(450);
            $shapetext1->setOffsetY(720 - $length - 50);
            $shapetext1->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);
            $length = $length - 40;
            $val++;
        }
    }


//For team and resources
    $team_data = $data['team']->result();
    $team = count($team_data);
    if (!empty($team)) {
        date('H:i:s') . " Create templated slide\n";
        $currentSlide = createTemplatedSlide($objPHPPowerPoint, $logo); // local function
//for showing images
        $count = '50';
        foreach ($team_data as $row) {
            $filepath = 'assets/image/pitch/';
            $img = (file_exists($filepath . $row->image) & !empty($row->image)) ? $filepath . $row->image : $filepath . 'partner.png';
            $shapepic3 = $currentSlide->createDrawingShape();
            $shapepic3->setName('PHPPowerPoint logo');
            $shapepic3->setPath($img);
            $shapepic3->setHeight(100);
            $shapepic3->setWidth(100);
            $shapepic3->setOffsetX($count);
            $shapepic3->setOffsetY(720 - 380 - 100);
            $count = $count + 200;
        }
//for showing name and role
        $count = '50';
        foreach ($team_data as $row) {
            $shapetext1 = $currentSlide->createRichTextShape();
            $textRun = $shapetext1->createTextRun($row->name);
            $textRun->getFont()->setBold(true);
            $textRun->getFont()->setSize(15);
            $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('000000'));
            $shapetext1->createBreak();
            $shapetext1->setHeight(10);
            $shapetext1->setWidth(300);
            $shapetext1->setOffsetX($count);
            $shapetext1->setOffsetY(720 - 310 - 50);
            $shapetext1->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);
            $textRun1 = $shapetext1->createTextRun($row->role);
            $textRun1->getFont()->setBold(false);
            $textRun1->getFont()->setSize(11);
            $textRun1->getFont()->setColor(new PHPPowerPoint_Style_Color('000000'));
            $count = $count + 200;
        }
//For title
        $shapetitle = $currentSlide->createRichTextShape();
        $shapetitle->setHeight(100);
        $shapetitle->setWidth(930);
        $shapetitle->setOffsetX(50);
        $shapetitle->setOffsetY(50);
        $shapetitle->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);
        $textRun2 = $shapetitle->createTextRun('Our Team');
        $textRun2->getFont()->setBold(true);
        $textRun2->getFont()->setSize(50);
        $textRun2->getFont()->setName('Trebuchet MS');
        $textRun2->getFont()->setColor(new PHPPowerPoint_Style_Color('C6C6C6'));
    }

//For Partners and their roles

    $partners_data = $data['partner']->result();
    $partner = count($partners_data);
    if (!empty($partner)) {
        // Create templated slide
        date('H:i:s') . " Create templated slide\n";
        $currentSlide = createTemplatedSlide($objPHPPowerPoint, $logo); // local function
        $count = '50';
        foreach ($partners_data as $row) {
//for showing images
            $filepath = 'assets/image/pitch/';
            $img = (file_exists($filepath . $row->image) & !empty($row->image)) ? $filepath . $row->image : $filepath . 'partner.png';
            $shapepic3 = $currentSlide->createDrawingShape();
            $shapepic3->setName('PHPPowerPoint logo');
            $shapepic3->setPath($img);
            $shapepic3->setHeight(100);
            $shapepic3->setWidth(100);
            $shapepic3->setOffsetX($count);
            $shapepic3->setOffsetY(720 - 380 - 100);
            $count = $count + 200;
        }
//for showing name and role
        $count = '50';
        foreach ($partners_data as $row) {
            $shapetext1 = $currentSlide->createRichTextShape();
            $textRun = $shapetext1->createTextRun($row->partner_name);
            $textRun->getFont()->setBold(true);
            $textRun->getFont()->setSize(15);
            $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('000000'));
            $shapetext1->createBreak();
            $shapetext1->setHeight(10);
            $shapetext1->setWidth(300);
            $shapetext1->setOffsetX($count);
            $shapetext1->setOffsetY(720 - 310 - 50);
            $shapetext1->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);
            $count = $count + 200;
        }
//For title
        $shapetitle = $currentSlide->createRichTextShape();
        $shapetitle->setHeight(100);
        $shapetitle->setWidth(930);
        $shapetitle->setOffsetX(50);
        $shapetitle->setOffsetY(50);
        $shapetitle->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);
        $textRun2 = $shapetitle->createTextRun('Partners or Suppliers');
        $textRun2->getFont()->setBold(true);
        $textRun2->getFont()->setSize(50);
        $textRun2->getFont()->setName('Trebuchet MS');
        $textRun2->getFont()->setColor(new PHPPowerPoint_Style_Color('C6C6C6'));
    }




    $shape->createBreak();

    $currentSlide = createTemplatedSlide($objPHPPowerPoint, $logo); // local function
//    echo date('H:i:s') . " Create a shape (rich text)\n";
    $shape = $currentSlide->createRichTextShape();
    $shape->setHeight(100);
    $shape->setWidth(860);
    $shape->setOffsetX(50);
    $shape->setOffsetY(10);
    $shape->getAlignment()->setHorizontal(PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT);
    $textRun = $shape->createTextRun('Thank You');
    $textRun->getFont()->setBold(true);
    $textRun->getFont()->setSize(50);
    $textRun->getFont()->setName('Trebuchet MS');
    $textRun->getFont()->setColor(new PHPPowerPoint_Style_Color('C6C6C6'));

    // Save PowerPoint 2007 file
    $file = preg_replace('/\s+/', '', $company);
    date('H:i:s') . " Save PowerPoint2007 format\n";
    $objWriter = PHPPowerPoint_IOFactory::createWriter($objPHPPowerPoint, 'PowerPoint2007');
    $objWriter->save('assets/ppt/' . $file . '.pptx');
}

/**
 * Creates a templated slide
 * 
 * @param PHPPowerPoint $objPHPPowerPoint
 * @return PHPPowerPoint_Slide
 */
function createTemplatedSlide(PHPPowerPoint $objPHPPowerPoint, $logo) {
    // Create slide
    $slide = $objPHPPowerPoint->createSlide();

    // Add background image
    $shape = $slide->createDrawingShape();
    $shape->setName('Background');
    $shape->setDescription('Background');
    $shape->setPath('assets/image/ppt_image/realdolmen_bg.jpg');
    $shape->setWidth(950);
    $shape->setHeight(720);
    $shape->setOffsetX(0);
    $shape->setOffsetY(0);

    $shape = $slide->createDrawingShape();
    $shape->setName('Background');
    $shape->setDescription('Background');
    $shape->setPath('assets/image/ppt_image/ppt_border.png');
    $shape->setWidth(970);
    $shape->setOffsetX(-5);
    $shape->setOffsetY(720 - 10 - 40);

    $filepath = 'assets/image/logo/';
    $img = (file_exists($filepath . $logo) & !empty($logo)) ? $filepath . $logo : $filepath . 'logo.png';
    // Add logo
    $shape = $slide->createDrawingShape();
    $shape->setName('PHPPowerPoint logo');
    $shape->setDescription('PHPPowerPoint logo');
    $shape->setPath($img);
    $shape->setHeight(40);
    $shape->setOffsetX(50);
    $shape->setOffsetY(720 - 5 - 40);

    // Return slide
    return $slide;
}

function get_logo(PHPPowerPoint $objPHPPowerPoint, $logo) {
    // Create slide
    $slide = $objPHPPowerPoint->createSlide();

    $shape = $slide->createDrawingShape();
    $shape->setName('Background');
    $shape->setDescription('Background');
    $shape->setPath('assets/image/ppt_image/realdolmen_bg.jpg');
    $shape->setWidth(950);
    $shape->setHeight(720);
    $shape->setOffsetX(0);
    $shape->setOffsetY(0);

    $filepath = 'assets/image/logo/';
    $img = (file_exists($filepath . $logo) & !empty($logo)) ? $filepath . $logo : $filepath . 'logo.png';
    // Add logo
    $shape = $slide->createDrawingShape();
    $shape->setName('PHPPowerPoint logo');
    $shape->setDescription('PHPPowerPoint logo');
    $shape->setPath($img);
    $shape->setHeight(80);
    $shape->setOffsetX(400);
    $shape->setOffsetY(250);

    // Return slide
    return $slide;
}
