<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpPresentation\Autoloader;
use PhpOffice\PhpPresentation\Settings;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\Slide;
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\AbstractShape;
use PhpOffice\PhpPresentation\DocumentLayout;
use PhpOffice\PhpPresentation\Shape\Drawing;
use PhpOffice\PhpPresentation\Shape\MemoryDrawing;
use PhpOffice\PhpPresentation\Shape\RichText;
use PhpOffice\PhpPresentation\Shape\RichText\BreakElement;
use PhpOffice\PhpPresentation\Shape\RichText\TextElement;
use PhpOffice\PhpPresentation\Style\Alignment;
use PhpOffice\PhpPresentation\Style\Bullet;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\Style\Border;
use PhpOffice\PhpPresentation\Style\Fill;

class Pptcheck extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('pitch_model', 'b_pitch');
        $this->load->model('company_model', 'b_company');
        $this->load->model('Forecast_model', 'forecast');
        $result = $this->b_company->validate_company();
        if ($result->num_rows() == 0) {
            redirect('dashboard');
        }
    }

    public function ppt() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->load->helper('currencyconv');
            $form['company_id'] = $company_id = $this->input->post('id');
            $pitch = $this->b_pitch->get_alldetails($company_id);
            $competitors = $this->b_pitch->get_competitordetail($company_id);
            $milestones = $this->b_pitch->get_milestonedetail($company_id);
            $team = $this->b_pitch->get_teamdetails($company_id, '4');
            $partner = $this->b_pitch->get_partnerdetails($company_id);
            $form['revenue'] = $data['revenue'] = $this->forecast->gettotal($company_id, '12');
            $form['income'] = $data['income'] = $this->forecast->getincome($company_id, '6');
            $form['costs'] = $data['costs'] = $this->forecast->gettotal($company_id, '13', 'expense');
            $forecast_length = $this->b_company->getcompany($company_id)->row();
            $form['f_length'] = $len = $forecast_length->forecast_length;
            $form['f_date'] = $len = $forecast_length->forecast_date;
            $form['currency'] = $pitch[0]['currency'];
            $logo = $forecast_length->logo;

//            $this->load->library('../controllers/pitch');
//            echo $this->pitch->create_chart_view();
//            $this->load->helper('chart');
//            generate_chart($form);
            $objPHPPowerPoint = new PhpPresentation();
            $writers = array('PowerPoint2007' => 'pptx');
// Set Color for text AND set inputs
            $colorBlack = new Color('FF000000');
            $colortext = new Color('FFBCBABA');
            $colorheading = new Color('FFC2D173');
            $linespacing = '120000';
            $paragraphwidth = '800';
            $paragraphheight = '400';
            $paragraphoffsetx = '50';
            $paragraphoffsety = '200';

            $headingheight = '100';
            $headingwidth = '860';
            $headingoffsetx = '50';
            $headingoffsety = '60';
// Create new PHPPresentation object
            $objPHPPresentation = new PhpPresentation();
            $objPHPPresentation->removeSlideByIndex(0);
// Create templated slide
            $currentSlide = $this->get_logo($objPHPPresentation, $logo);
// Create a shape (text)
            date('H:i:s') . " Create a shape (rich text)\n";
            $shape = $currentSlide->createRichTextShape();
            $shape->setHeight(200);
            $shape->setWidth(600);
            $shape->setOffsetX(150);
            $shape->setOffsetY(350);
            $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $shape->createBreak();
            $company = (!empty($pitch[0]['name'])) ? $pitch[0]['name'] : '';
            $textRun = $shape->createTextRun(ucfirst($company));
            $textRun->getFont()->setBold(true);
            $textRun->getFont()->setSize(45);
            $textRun->getFont()->setName('Trebuchet MS');
            $textRun->getFont()->setColor($colorBlack);

// HEADLINE
            $head = (!empty($pitch[0]['headline'])) ? $pitch[0]['headline'] : '';
            $headline = strip_tags($head);
            if (!empty($headline)) {
// Create templated slide
                date('H:i:s') . " Create templated slide\n";
                $currentSlide = $this->createTemplatedSlide($objPHPPresentation, $logo); // local function
// Create a shape (text)
                date('H:i:s') . " Create a shape (rich text)\n";
                $shape = $currentSlide->createRichTextShape();
                $shape->setHeight($headingheight);
                $shape->setWidth($headingwidth);
                $shape->setOffsetX($headingoffsetx);
                $shape->setOffsetY($headingoffsety);
                $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $textRun = $shape->createTextRun('Elevator Pitch');
                $textRun->getFont()->setBold(true);
                $textRun->getFont()->setSize(50);
                $textRun->getFont()->setName('Trebuchet MS');
                $textRun->getFont()->setColor($colorheading);
// Create a shape (text)
                date('H:i:s') . " Create a shape (rich text)\n";
                $shape = $currentSlide->createRichTextShape();
                $shape->setHeight($paragraphheight);
                $shape->setWidth($paragraphwidth);
                $shape->setOffsetX($paragraphoffsetx);
                $shape->setOffsetY($paragraphoffsety);
                $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $shape->getActiveParagraph()->setSpacing($linespacing);
                $textRun = $shape->createTextRun($headline);
                $textRun->getFont()->setSize(32);
                $textRun->getFont()->setColor($colortext);
//        $textRun->getFont()->setName('Trebuchet MS');
            }

// PROBLEM    
            $prob = (!empty($pitch[0]['problem'])) ? $pitch[0]['problem'] : '';
            $problem = strip_tags($prob);
            if (!empty($problem)) {
// Create templated slide
                date('H:i:s') . " Create templated slide\n";
                $currentSlide = $this->createTemplatedSlide($objPHPPresentation, $logo); // local function
// Create a shape (text)
                date('H:i:s') . " Create a shape (rich text)\n";
                $shape = $currentSlide->createRichTextShape();
                $shape->setHeight($headingheight);
                $shape->setWidth($headingwidth);
                $shape->setOffsetX($headingoffsetx);
                $shape->setOffsetY($headingoffsety);
                $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $textRun = $shape->createTextRun('Problem Statement');
                $textRun->getFont()->setBold(true);
                $textRun->getFont()->setSize(50);
                $textRun->getFont()->setName('Trebuchet MS');
                $textRun->getFont()->setColor($colorheading);
// Create a shape (text)
                date('H:i:s') . " Create a shape (rich text)\n";
                $shape = $currentSlide->createRichTextShape();
                $shape->setHeight($paragraphheight);
                $shape->setWidth($paragraphwidth);
                $shape->setOffsetX($paragraphoffsetx);
                $shape->setOffsetY($paragraphoffsety);
                $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $shape->getActiveParagraph()->setSpacing($linespacing);
                $textRun = $shape->createTextRun($problem);
                $textRun->getFont()->setSize(32);
                $textRun->getFont()->setColor($colortext);
            }

// SOLUTION    
            $sol = (!empty($pitch[0]['solution'])) ? $pitch[0]['solution'] : '';
            $solution = strip_tags($sol);
            if (!empty($solution)) {
                // Create templated slide
                date('H:i:s') . " Create templated slide\n";
                $currentSlide = $this->createTemplatedSlide($objPHPPresentation, $logo); // local function
// Create a shape (text)
                date('H:i:s') . " Create a shape (rich text)\n";
                $shape = $currentSlide->createRichTextShape();
                $shape->setHeight($headingheight);
                $shape->setWidth($headingwidth);
                $shape->setOffsetX($headingoffsetx);
                $shape->setOffsetY($headingoffsety);
                $shape->setWidthAndHeight(500, 50);
                $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $textRun = $shape->createTextRun('The Solution');
                $textRun->getFont()->setBold(true);
                $textRun->getFont()->setSize(50);
                $textRun->getFont()->setName('Trebuchet MS');
                $textRun->getFont()->setColor($colorheading);
// Create a shape (text)
                date('H:i:s') . " Create a shape (rich text)\n";
                $shape = $currentSlide->createRichTextShape();
                $shape->setHeight($paragraphheight);
                $shape->setWidth($paragraphwidth);
                $shape->setOffsetX($paragraphoffsetx);
                $shape->setOffsetY($paragraphoffsety);
                $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $shape->getActiveParagraph()->setSpacing($linespacing);
                $textRun = $shape->createTextRun($solution);
                $textRun->getFont()->setSize(32);
                $textRun->getFont()->setColor($colortext);
            }

// TARGET    
            $tar = (!empty($pitch[0]['target'])) ? $pitch[0]['target'] : '';
            $target = strip_tags($tar);
            if (!empty($target)) {
                // Create templated slide
                date('H:i:s') . " Create templated slide\n";
                $currentSlide = $this->createTemplatedSlide($objPHPPresentation, $logo); // local function
// Create a shape (text)
                date('H:i:s') . " Create a shape (rich text)\n";
                $shape = $currentSlide->createRichTextShape();
                $shape->setHeight($headingheight);
                $shape->setWidth($headingwidth);
                $shape->setOffsetX($headingoffsetx);
                $shape->setOffsetY($headingoffsety);
                $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $textRun = $shape->createTextRun('Market Opportunity');
                $textRun->getFont()->setBold(true);
                $textRun->getFont()->setSize(50);
                $textRun->getFont()->setName('Trebuchet MS');
                $textRun->getFont()->setColor($colorheading);
// Create a shape (text)
                date('H:i:s') . " Create a shape (rich text)\n";
                $shape1 = $currentSlide->createRichTextShape();
                $shape1->setHeight($paragraphheight);
                $shape1->setWidth($paragraphwidth);
                $shape1->setOffsetX($paragraphoffsetx);
                $shape1->setOffsetY($paragraphoffsety);
                $shape1->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $shape1->getActiveParagraph()->setSpacing($linespacing);
                $textRun = $shape1->createTextRun($target);
                $textRun->getFont()->setSize(32);
                $textRun->getFont()->setColor($colortext);
            }


// Competitors
            $competitors = $competitors->result();
            $competitors_count = count($competitors);
            if (!empty($competitors_count)) {
                // Create templated slide
                date('H:i:s') . " Create templated slide\n";
                $currentSlide = $this->createTemplatedSlide($objPHPPresentation, $logo); // local function
// Create a shape (text)
                date('H:i:s') . " Create a shape (rich text)\n";
                $shape5 = $currentSlide->createRichTextShape();
                $shape5->setHeight($headingheight);
                $shape5->setWidth($headingwidth);
                $shape5->setOffsetX($headingoffsetx);
                $shape5->setOffsetY($headingoffsety);
                $shape5->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $textRun5 = $shape5->createTextRun('Competitive Landscape');
                $textRun5->getFont()->setBold(true);
                $textRun5->getFont()->setSize(50);
                $textRun5->getFont()->setName('Trebuchet MS');
                $textRun5->getFont()->setColor($colorheading);
// Create a shape (text)

                $shape = $currentSlide->createTableShape(2);
                $shape->setHeight(600);
                $shape->setWidth(800);
                $shape->setOffsetX(60);
                $shape->setOffsetY(200);

                $row = $shape->createRow();
                $row->getFill()->setFillType(Fill::FILL_SOLID)
                        ->setStartColor(new Color('FFE6F5F7'))
                        ->setEndColor(new Color('FFE6F5F7'));
                $cellA1 = $row->nextCell();
                $cellA1->setWidth(300)->createTextRun('Competitors')->getFont()->setBold(true)->setSize(24)->setName('Trebuchet MS');
                $cellA2 = $row->nextCell();
                $cellA2->setWidth(500)->createTextRun('Advantages')->getFont()->setBold(true)->setSize(24)->setName('Trebuchet MS');
                $cellA2->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);


                foreach ($competitors as $row) {
                    $name = $row->competitor_name;
                    $advantage = urldecode($row->advantage);
                    $row = $shape->createRow();
                    $row->setHeight(50);
                    $row->nextCell()->createTextRun($name)->getFont()->setItalic(true)->setSize(18)->setName('Trebuchet MS')->setColor($colortext);
                    $row->nextCell()->createTextRun($advantage)->getFont()->setItalic(true)->setSize(18)->setName('Trebuchet MS')->setColor($colortext);
                }
            }

// FUNDS    
            $fund_use = (!empty($pitch[0]['fund_use'])) ? $pitch[0]['fund_use'] : '';
            $funds = strip_tags($fund_use);
            $fund_amt = (!empty($pitch[0]['fund_amount'])) ? $pitch[0]['fund_amount'] : '';
            $n = $fund_amt;
            $currency = $pitch[0]['currency'];
            switch ($currency) {
                case '1':
                    $type = 'Rs';
                    break;
                case '2':
                    $type = '$';
                    break;
                case '3':
                    $type = '¥';
                    break;
                case '4':
                    $type = '£';
                    break;
                default:
                    $type = 'Rs';
                    break;
            }
            $val = converter($fund_amt, $currency);
            if (!empty($funds)) {
// Create templated slide
                date('H:i:s') . " Create templated slide\n";
                $currentSlide = $this->createTemplatedSlide($objPHPPresentation, $logo); // local function
// Create a shape (text)
                date('H:i:s') . " Create a shape (rich text)\n";
                $shape = $currentSlide->createRichTextShape();
                $shape->setHeight($headingheight);
                $shape->setWidth(630);
                $shape->setOffsetX($headingoffsetx);
                $shape->setOffsetY($headingoffsety);
                $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $textRun = $shape->createTextRun('Funding Needs');
                $textRun->getFont()->setBold(true);
                $textRun->getFont()->setSize(50);
                $textRun->getFont()->setName('Trebuchet MS');
                $textRun->getFont()->setColor($colorheading);
                date('H:i:s') . " Create a shape (rich text)\n";
                $shape = $currentSlide->createRichTextShape();
                $shape->setHeight($headingheight);
                $shape->setWidth(400);
                $shape->setOffsetX(630);
                $shape->setOffsetY($headingoffsety);
                $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $textRun = $shape->createTextRun($type . ' ' . $val);
                $textRun->getFont()->setBold(true);
                $textRun->getFont()->setSize(50);
                $textRun->getFont()->setName('Trebuchet MS');
                $textRun->getFont()->setColor($colorBlack);

// Create a shape (text)
                date('H:i:s') . " Create a shape (rich text)\n";
                $shape = $currentSlide->createRichTextShape();
                $shape->setHeight($paragraphheight);
                $shape->setWidth($paragraphwidth);
                $shape->setOffsetX($paragraphoffsetx);
                $shape->setOffsetY($paragraphoffsety);
                $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $shape->getActiveParagraph()->setSpacing($linespacing);
                $textRun = $shape->createTextRun($funds);
                $textRun->getFont()->setSize(32);
                $textRun->getFont()->setColor($colortext);
            }


//SALES    
            $sal = (!empty($pitch[0]['sales'])) ? $pitch[0]['sales'] : '';
            $sales = strip_tags($sal);
            if (!empty($sales)) {
// Create templated slide
                date('H:i:s') . " Create templated slide\n";
                $currentSlide = $this->createTemplatedSlide($objPHPPresentation, $logo); // local function
// Create a shape (text)
                date('H:i:s') . " Create a shape (rich text)\n";
                $shape = $currentSlide->createRichTextShape();
                $shape->setHeight($headingheight);
                $shape->setWidth($headingwidth);
                $shape->setOffsetX($headingoffsetx);
                $shape->setOffsetY($headingoffsety);
                $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $textRun = $shape->createTextRun('Sales Channels');
                $textRun->getFont()->setBold(true);
                $textRun->getFont()->setSize(50);
                $textRun->getFont()->setName('Trebuchet MS');
                $textRun->getFont()->setColor($colorheading);
// Create a shape (text)
                date('H:i:s') . " Create a shape (rich text)\n";
                $shape = $currentSlide->createRichTextShape();
                $shape->setHeight($paragraphheight);
                $shape->setWidth($paragraphwidth);
                $shape->setOffsetX($paragraphoffsetx);
                $shape->setOffsetY($paragraphoffsety);
                $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $shape->getActiveParagraph()->setSpacing($linespacing);
                $textRun = $shape->createTextRun($sales);
                $textRun->getFont()->setSize(32);
                $textRun->getFont()->setColor($colortext);
            }

//MARKETING
            $mark = (!empty($pitch[0]['marketing'])) ? $pitch[0]['marketing'] : '';
            $marketing = strip_tags($mark);
            if (!empty($marketing)) {
// Create templated slide
                date('H:i:s') . " Create templated slide\n";
                $currentSlide = $this->createTemplatedSlide($objPHPPresentation, $logo); // local function
// Create a shape (text)
                date('H:i:s') . " Create a shape (rich text)\n";
                $shape5 = $currentSlide->createRichTextShape();
                $shape5->setHeight($headingheight);
                $shape5->setWidth($headingwidth);
                $shape5->setOffsetX($headingoffsetx);
                $shape5->setOffsetY($headingoffsety);
                $shape5->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $textRun5 = $shape5->createTextRun('Marketing Activities');
                $textRun5->getFont()->setBold(true);
                $textRun5->getFont()->setSize(50);
                $textRun5->getFont()->setName('Trebuchet MS');
                $textRun5->getFont()->setColor($colorheading);
// Create a shape (text)
                date('H:i:s') . " Create a shape (rich text)\n";
                $shape = $currentSlide->createRichTextShape();
                $shape->setHeight($paragraphheight);
                $shape->setWidth($paragraphwidth);
                $shape->setOffsetX($paragraphoffsetx);
                $shape->setOffsetY($paragraphoffsety);
                $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $shape->getActiveParagraph()->setSpacing($linespacing);
                $textRun = $shape->createTextRun($marketing);
                $textRun->getFont()->setSize(32);
                $textRun->getFont()->setColor($colortext);
            }





//For Financial Projection
            $cost = 'assets/image/forecast/cost_' . $company_id . '.png';
            $revenue = 'assets/image/forecast/revenue_' . $company_id . '.png';
            $profit = 'assets/image/forecast/profit_' . $company_id . '.png';
            $expense = 'assets/image/forecast/expense_' . $company_id . '.png';
            if (file_exists($revenue) || file_exists($profit) || file_exists($expense)) {
                date('H:i:s') . " Create templated slide\n";
                $currentSlide = $this->createTemplatedSlide($objPHPPresentation, $logo); // local function
//for showing images
                $count = '50';
                if (file_exists($revenue)) {
                    $shapepic3 = $currentSlide->createDrawingShape();
                    $shapepic3->setName('PHPPowerPoint logo');
                    $shapepic3->setPath('assets/image/forecast/revenue_' . $company_id . '.png');
                    $shapepic3->setHeight(500);
                    $shapepic3->setwidth(350);
                    $shapepic3->setOffsetX(0);
                    $shapepic3->setOffsetY(720 - 380 - 100);
                    $count = $count + 250;
                    $shapetext1 = $currentSlide->createRichTextShape();
                    $shapetext1->setHeight(10);
                    $shapetext1->setWidth(250);
                    $shapetext1->setOffsetX(120);
                    $shapetext1->setOffsetY(720 - 120 - 100);
                    $shapetext1->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                    $textRun1 = $shapetext1->createTextRun('Revenue');
                    $textRun1->getFont()->setBold(true);
                    $textRun1->getFont()->setSize(15);
                    $textRun1->getFont()->setColor($colorBlack);
                    $textRun1->getFont()->setName('Trebuchet MS');
                }



                if (file_exists($cost)) {
                    $shapepic3 = $currentSlide->createDrawingShape();
                    $shapepic3->setName('PHPPowerPoint logo');
                    $shapepic3->setPath('assets/image/forecast/cost_' . $company_id . '.png');
                    $shapepic3->setHeight(500);
                    $shapepic3->setwidth(350);
                    $shapepic3->setOffsetX(300);
                    $shapepic3->setOffsetY(720 - 380 - 100);
                    $count = $count + 250;
                    $shapetext1 = $currentSlide->createRichTextShape();
                    $shapetext1->setHeight(10);
                    $shapetext1->setWidth(250);
                    $shapetext1->setOffsetX(400);
                    $shapetext1->setOffsetY(720 - 120 - 100);
                    $shapetext1->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                    $textRun1 = $shapetext1->createTextRun('Cost & Expense');
                    $textRun1->getFont()->setBold(true);
                    $textRun1->getFont()->setSize(15);
                    $textRun1->getFont()->setColor($colorBlack);
                    $textRun1->getFont()->setName('Trebuchet MS');
                }

                if (file_exists($profit)) {
                    $shapepic3 = $currentSlide->createDrawingShape();
                    $shapepic3->setName('PHPPowerPoint logo');
                    $shapepic3->setPath('assets/image/forecast/profit_' . $company_id . '.png');
                    $shapepic3->setHeight(500);
                    $shapepic3->setwidth(350);
                    $shapepic3->setOffsetX(600);
                    $shapepic3->setOffsetY(720 - 380 - 100);
                    $count = $count + 250;
                    $shapetext1 = $currentSlide->createRichTextShape();
                    $shapetext1->setHeight(10);
                    $shapetext1->setWidth(250);
                    $shapetext1->setOffsetX(720);
                    $shapetext1->setOffsetY(720 - 120 - 100);
                    $shapetext1->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                    $textRun1 = $shapetext1->createTextRun('Profit & Loss');
                    $textRun1->getFont()->setBold(true);
                    $textRun1->getFont()->setSize(15);
                    $textRun1->getFont()->setColor($colorBlack);
                    $textRun1->getFont()->setName('Trebuchet MS');
                }
//For title
                $shapetitle = $currentSlide->createRichTextShape();
                $shapetitle->setHeight(100);
                $shapetitle->setWidth(930);
                $shapetitle->setOffsetX(60);
                $shapetitle->setOffsetY(720 - 600 - 100);
                $shapetitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $textRun2 = $shapetitle->createTextRun('Financial Projections');
                $textRun2->getFont()->setBold(true);
                $textRun2->getFont()->setSize(50);
                $textRun2->getFont()->setName('Trebuchet MS');
                $textRun2->getFont()->setColor($colorheading);
            }





//Milestones
            $Mil = $milestones->result();
            $milestones_count = count($Mil);
            if (!empty($milestones_count)) {
                // Create templated slide
                date('H:i:s') . " Create templated slide\n";
                $currentSlide = $this->createTemplatedSlide($objPHPPresentation, $logo); // local function
// Create a shape (text)
                date('H:i:s') . " Create a shape (rich text)\n";
                $shape5 = $currentSlide->createRichTextShape();
                $shape5->setHeight($headingheight);
                $shape5->setWidth($headingwidth);
                $shape5->setOffsetX($headingoffsetx);
                $shape5->setOffsetY($headingoffsety);
                $shape5->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $textRun5 = $shape5->createTextRun('Traction');
                $textRun5->getFont()->setBold(true);
                $textRun5->getFont()->setSize(50);
                $textRun5->getFont()->setName('Trebuchet MS');
                $textRun5->getFont()->setColor($colorheading);
// Create a shape (text)


                $shape5 = $currentSlide->createTableShape(2);
                $shape5->setHeight(600);
                $shape5->setWidth(800);
                $shape5->setOffsetX(60);
                $shape5->setOffsetY(200);

                $row = $shape5->createRow();
                $row->getFill()->setFillType(Fill::FILL_SOLID)
                        ->setStartColor(new Color('FFE6F5F7'))
                        ->setEndColor(new Color('FFE6F5F7'));
                $cellA1 = $row->nextCell();
                $cellA1->setWidth(300)->createTextRun('Date')->getFont()->setBold(true)->setSize(24)->setName('Trebuchet MS');
                $cellA2 = $row->nextCell();
                $cellA2->setWidth(500)->createTextRun('Milestone')->getFont()->setBold(true)->setSize(24)->setName('Trebuchet MS');
                $cellA2->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);


                foreach ($Mil as $row) {
                    $date = $row->date;
                    $name = $row->name;
                    $row = $shape5->createRow();
                    $row->setHeight(50);
                    $row->nextCell()->createTextRun($date)->getFont()->setItalic(true)->setSize(18)->setName('Trebuchet MS')->setColor($colortext);
                    $row->nextCell()->createTextRun($name)->getFont()->setItalic(true)->setSize(18)->setName('Trebuchet MS')->setColor($colortext);
                }
            }


//For team and resources
            $team_data = $team->result();
            $team = count($team_data);
            if (!empty($team)) {
                date('H:i:s') . " Create templated slide\n";
                $currentSlide = $this->createTemplatedSlide($objPHPPresentation, $logo); // local function
//for showing images
                $count = '50';
                foreach ($team_data as $row) {
                    $filepath = 'assets/image/pitch/';
                    $img = (file_exists($filepath . $row->image) & !empty($row->image)) ? $filepath . $row->image : $filepath . 'partner.png';
                    $shapepic3 = $currentSlide->createDrawingShape();
                    $shapepic3->setName('PHPPowerPoint logo');
                    $shapepic3->setPath($img);
                    $shapepic3->setHeight(100);
                    $shapepic3->setWidth(150);
                    $shapepic3->setOffsetX($count);
                    $shapepic3->setOffsetY(720 - 380 - 100);
                    $count = $count + 220;
                }
//for showing name and role
                $count = '50';
                foreach ($team_data as $row) {
                    $shapetext1 = $currentSlide->createRichTextShape();
                    $textRun = $shapetext1->createTextRun($row->name);
                    $textRun->getFont()->setBold(true);
                    $textRun->getFont()->setSize(15);
                    $textRun->getFont()->setColor($colorBlack);
                    $shapetext1->createBreak();
                    $shapetext1->setHeight(10);
                    $shapetext1->setWidth(250);
                    $shapetext1->setOffsetX($count);
                    $shapetext1->setOffsetY(720 - 250 - 50);
                    $shapetext1->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                    $textRun1 = $shapetext1->createTextRun($row->role);
                    $textRun1->getFont()->setBold(false);
                    $textRun1->getFont()->setSize(11);
                    $textRun1->getFont()->setColor($colorBlack);
                    $count = $count + 220;
                }
//For title
                $shapetitle = $currentSlide->createRichTextShape();
                $shapetitle->setHeight($headingheight);
                $shapetitle->setWidth(930);
                $shapetitle->setOffsetX(50);
                $shapetitle->setOffsetY(50);
                $shapetitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $textRun2 = $shapetitle->createTextRun('Our Team');
                $textRun2->getFont()->setBold(true);
                $textRun2->getFont()->setSize(50);
                $textRun2->getFont()->setName('Trebuchet MS');
                $textRun2->getFont()->setColor($colorheading);
            }

//For Partners and their roles

            $partners_data = $partner->result();
            $partner = count($partners_data);
            if (!empty($partner)) {
                // Create templated slide
                date('H:i:s') . " Create templated slide\n";
                $currentSlide = $this->createTemplatedSlide($objPHPPresentation, $logo); // local function
                $count = '50';
                foreach ($partners_data as $row) {
//for showing images
                    $filepath = 'assets/image/pitch/';
                    $img = (file_exists($filepath . $row->image) & !empty($row->image)) ? $filepath . $row->image : $filepath . 'partner.png';
                    $shapepic3 = $currentSlide->createDrawingShape();
                    $shapepic3->setName('PHPPowerPoint logo');
                    $shapepic3->setPath($img);
                    $shapepic3->setHeight(100);
                    $shapepic3->setWidth(150);
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
                    $textRun->getFont()->setColor($colorBlack);
                    $shapetext1->createBreak();
                    $shapetext1->setHeight(10);
                    $shapetext1->setWidth(250);
                    $shapetext1->setOffsetX($count);
                    $shapetext1->setOffsetY(720 - 250 - 50);
                    $shapetext1->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                    $count = $count + 220;
                }
//For title
                $shapetitle = $currentSlide->createRichTextShape();
                $shapetitle->setHeight(100);
                $shapetitle->setWidth(930);
                $shapetitle->setOffsetX(50);
                $shapetitle->setOffsetY(50);
                $shapetitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $textRun2 = $shapetitle->createTextRun('Partners or Suppliers');
                $textRun2->getFont()->setBold(true);
                $textRun2->getFont()->setSize(50);
                $textRun2->getFont()->setName('Trebuchet MS');
                $textRun2->getFont()->setColor($colorheading);
            }




            $shape->createBreak();

            $currentSlide = $this->createTemplatedSlide($objPHPPresentation, $logo); // local function
//    echo date('H:i:s') . " Create a shape (rich text)\n";
            $shape = $currentSlide->createRichTextShape();
            $shape->setHeight(100);
            $shape->setWidth(860);
            $shape->setOffsetX(50);
            $shape->setOffsetY(10);
            $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $textRun = $shape->createTextRun('Thank You');
            $textRun->getFont()->setBold(true);
            $textRun->getFont()->setSize(50);
            $textRun->getFont()->setName('Trebuchet MS');
            $textRun->getFont()->setColor($colorBlack);

            // Save PowerPoint 2007 file
            $file = preg_replace('/\s+/', '', $company);
// Save file
            $this->write($objPHPPresentation, $file, $writers);
//            $xmlWriter = IOFactory::createWriter($objPHPPresentation, 'pptx');
//            $xmlWriter->save(APPPATH . "/vendor/phpoffice/phppresentation/ppt/{$filename}.pptx");
            $title = $pitch[0]['name'];
            $file = preg_replace('/\s+/', '', $title);
            echo json_encode(array('flag' => 1, 'title' => $file));
            die;
        }
    }

    function write($phpPresentation, $filename, $writers) {
        $result = '';

        // Write documents
        foreach ($writers as $writer => $extension) {
            $result .= date('H:i:s') . " Write to {$writer} format";
            if (!is_null($extension)) {
                $xmlWriter = IOFactory::createWriter($phpPresentation, $writer);
                $xmlWriter->save(APPPATH . "/vendor/phpoffice/phppresentation/ppt/{$filename}.{$extension}");
            } else {
                $result .= ' ... NOT DONE!';
            }
        }

//        $result .= getEndingNotes($writers);

        return $result;
    }

    function createTemplatedSlide($objPHPPresentation, $logo) {
        // Create slide
        $slide = $objPHPPresentation->createSlide();

        // Add background image
        $shape = $slide->createDrawingShape();
        $shape->setName('Background');
        $shape->setDescription('Background');
        $shape->setPath(FCPATH . 'assets/image/ppt_image/ppt_bg.png');
        $shape->setWidth(950);
        $shape->setHeight(720);
        $shape->setOffsetX(0);
        $shape->setOffsetY(0);

        $shape = $slide->createDrawingShape();
        $shape->setName('Background');
        $shape->setDescription('Background');
        $shape->setPath(FCPATH . 'assets/image/ppt_image/ppt_border.png');
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

    function get_logo($objPHPPresentation, $logo) {
//        echo FCPATH; die;
        // Create slide
        $slide = $objPHPPresentation->createSlide();

        $shape = $slide->createDrawingShape();
        $shape->setName('Background');
        $shape->setDescription('Background');
        $shape->setPath(FCPATH . 'assets/image/ppt_image/ppt_bg.png');
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
        $shape->setWidth(400);
        $shape->setHeight(80);
        $shape->setOffsetX(300);
        $shape->setOffsetY(250);
        $shapetitle = $slide->createRichTextShape();
        $shapetitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Return slide
        return $slide;
    }

}

?>