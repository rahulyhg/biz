<?php

class Pitch extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('pitch_model', 'b_pitch');
        $this->load->model('company_model', 'b_company');
        $this->load->model('Forecast_model', 'forecast');
        $this->load->helper('string');
        date_default_timezone_set('Asia/Kolkata');
        $userid = $this->session->userdata('user_id');
        if (empty($userid)) {
            redirect('login');
        }
        $result = $this->b_company->validate_company();
        if ($result->num_rows() == 0) {
            redirect('dashboard');
        }
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        if (empty($user_id)) {
            redirect('login');
        }
        $company_id = $this->session->userdata('company_id');
        $result = $this->b_pitch->get_pitchdetails($company_id);
        if ($result->num_rows() > 0) {
            
        } else {
            redirect('pitch/company/' . $company_id);
        }
    }

    public function company($c_id = NULL) {
        $company_id = $this->session->userdata('companyid');
        if (isset($company_id)) {
            $company_id = $this->session->userdata('companyid');
        } else {
            $this->session->set_userdata('companyid', $c_id);
            $company_id = $this->session->userdata('companyid');
        }
        if ($company_id != '0') {
            $data['menu'] = 'add_pitch';
            $data['company_id'] = $company_id;
            $data['company_detail'] = $this->b_company->getcompany($company_id);
            $data['headline'] = $this->b_pitch->get_pitchdetails($company_id);
            $data['competitor'] = $this->b_pitch->get_competitordetail($company_id);
            $data['funds'] = $this->b_pitch->get_funddetails($company_id);
            $data['ongoing_milestone'] = $this->b_pitch->get_milestonedetail($company_id);
            $data['completed_milestone'] = $this->b_pitch->get_completedmilestone($company_id);
            $data['teamdetail'] = $this->b_pitch->get_teamdetails($company_id);
            $data['partnerdetail'] = $this->b_pitch->get_partnerdetails($company_id);
            $data['menu_type'] = 'pitch';
            $data['sub_menu'] = 'add';
            echo $this->create_chart_view();
            $this->load->view('pitch/pitch', $data);
        } else {
            redirect('dashboard');
        }
    }

    public function update_company() {
        $this->load->helper('string');
        $company_id = $this->session->userdata('companyid');
        $user_id = $this->session->userdata('user_id');
        $company_name = $this->input->post('company');
        $logo = $this->input->post('logo1');
        if (!empty($logo) && file_exists($_SERVER['DOCUMENT_ROOT'] . "/bizjumper/assets/image/logo/$logo")) {
            $file = $logo;
        } else {
            $files = $_FILES["logo"];
            if ($files['error'] == 0) {
                $temp = explode(".", $files["name"]);
                $extension = end($temp);
                $filename = 'logo_' . preg_replace('/\s+/', '_', random_string('alnum', 5));
                $file = "$filename.$extension";
                $folname = $_SERVER['DOCUMENT_ROOT'] . "/bizjumper/assets/image/logo/$file";
                move_uploaded_file($files["tmp_name"], $folname);
            } else {
                $file = '';
            }
        }
        $data = array(
            'name' => $company_name,
            'logo' => $file
        );
        $where_data = array(
            'company_id' => $company_id,
            'user_id' => $user_id
        );
        $result = $this->b_pitch->update_company($data, $where_data);
        if ($result) {
            echo json_encode(array('flag' => 1, 'title' => 'headline', 'company_id' => $company_id));
        }
    }

    public function update_pitch() {
        $company_id = $this->session->userdata('companyid');
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $data = array(
                'company_id' => $company_id,
                'headline' => $this->input->post('headline'),
                'problem' => $this->input->post('problem'),
                'solution' => $this->input->post('solution'),
                'target' => $this->input->post('target'),
                'sales' => $this->input->post('sales'),
                'marketing' => $this->input->post('marketing'),
                'created' => date("Y-m-d h:i:s"),
                'modified' => date("Y-m-d h:i:s")
            );
            $result = $this->b_pitch->set_pitchdetails($data, $company_id);
            $data = array(
                'company_id' => $company_id,
                'fund_amount' => $this->input->post('fund'),
                'fund_use' => $this->input->post('description'),
                'created' => date("Y-m-d h:i:s"),
                'modified' => date("Y-m-d h:i:s")
            );
            $result1 = $this->b_pitch->set_funddetails($data, $company_id);
            if ($result) {
                echo json_encode(array('flag' => 1, 'title' => 'problem', 'company_id' => $company_id));
                die;
            }
        }
    }

    public function competitor() {
        $company_id = $this->session->userdata('companyid');
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $type = $this->input->post('type');
            $data = array(
                'company_id' => $company_id,
                'competitor_name' => $this->input->post('competitor'),
                'advantage' => $this->input->post('advantage'),
                'created' => date("Y-m-d h:i:s"),
                'modified' => date("Y-m-d h:i:s")
            );
            if ($type == 'add') {
                $result = $this->b_pitch->set_competitordetail($data, $company_id);
            } elseif ($type == 'edit') {
                $id = $this->input->post('id');
                $result = $this->b_pitch->edit_competitordetail($data, $company_id, $id);
            }
            if ($result) {
                $data = $this->b_pitch->get_competitordetail($company_id)->result();
                echo json_encode(array('flag' => 1, 'company_id' => $company_id, 'data' => $data));
                exit();
            }
        }
    }

    public function delete_competitordetail() {
        $id = $this->input->post('id');
        $company_id = $this->input->post('company_id');
        $result = $this->b_pitch->delete_competitordetail($id);
        if ($result) {
            $data = $this->b_pitch->get_competitordetail($company_id)->result();
            echo json_encode(array('flag' => 1, 'data' => $data));
            exit();
        }
    }

    public function funds() {
        $company_id = $this->session->userdata('companyid');
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $data = array(
                'company_id' => $company_id,
                'fund_amount' => $this->input->post('fund'),
                'fund_use' => $this->input->post('description'),
                'created' => date("Y-m-d h:i:s"),
                'modified' => date("Y-m-d h:i:s")
            );
            $result = $this->b_pitch->set_funddetails($data, $company_id);
            if ($result) {
                echo json_encode(array('flag' => 1, 'title' => 'sales', 'company_id' => $company_id));
                die();
            }
        }
    }

    public function milestones($id = NULL) {
        $company_id = $this->session->userdata('companyid');
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $type = $this->input->post('type');
            $data = array(
                'company_id' => $company_id,
                'name' => $this->input->post('name'),
                'date' => $this->input->post('date'),
                'responsible' => '',
                'description' => $this->input->post('description'),
                'flag' => '1',
                'created' => date("Y-m-d h:i:s"),
                'modified' => date("Y-m-d h:i:s")
            );
            if ($type == 'add') {
                $result = $this->b_pitch->set_milestonedetail($data, $company_id);
            } elseif ($type == 'edit') {
                $id = $this->input->post('id');
                $result = $this->b_pitch->edit_milestonedetail($data, $company_id, $id);
            }
            if ($result) {
                $data = $this->b_pitch->get_milestonedetail($company_id)->result();
                echo json_encode(array('flag' => 1, 'data' => $data));
                exit();
            }
        }
    }

    public function get_milestones() {
        $id = $this->input->post('id');
        $company_id = $this->input->post('company_id');
        $result = $this->b_pitch->get_singlemilestone($company_id, $id);
        $data = $result->row();
        $name = $data->name;
        $date = $data->date;
        $desc = $data->description;
        echo json_encode(array('flag' => 1, 'name' => $name, 'date' => $date, 'desc' => $desc));
        exit();
    }

    public function delete_milestone() {
        $id = $this->input->post('id');
        $company_id = $this->input->post('company_id');
        $result = $this->b_pitch->delete_milestonedetail($id);
        if ($result) {
            $data = $this->b_pitch->get_milestonedetail($company_id)->result();
            echo json_encode(array('flag' => 1, 'data' => $data));
            exit();
        }
    }

    public function delete_comp_milestone() {
        $id = $this->input->post('id');
        $company_id = $this->input->post('company_id');
        $result = $this->b_pitch->delete_milestonedetail($id);
        if ($result) {
            $data = $this->b_pitch->get_completedmilestone($company_id)->result();
            echo json_encode(array('flag' => 1, 'data' => $data));
            exit();
        }
    }

    public function complete_milestone() {
        $id = $this->input->post('id');
        $company_id = $this->input->post('company_id');
        $result = $this->b_pitch->completed_milestonedetail($id, $company_id);
        if ($result) {
            $data = $this->b_pitch->get_completedmilestone($company_id)->result();
            echo json_encode(array('flag' => 1, 'data' => $data));
            exit();
        }
    }

    public function team() {
        $company_id = $this->session->userdata('companyid');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $type = $this->input->post('type');
            if ($type == 'add') {
                $files = $_FILES["team_img"];
                if ($files['error'] == 0) {
                    $temp = explode(".", $files["name"]);
                    $extension = end($temp);
                    $filename = 'team_' . random_string('alnum', 5);
                    $file = "$filename.$extension";
                    $folname = $_SERVER['DOCUMENT_ROOT'] . "/bizjumper/assets/image/pitch/$file";
                    move_uploaded_file($files["tmp_name"], $folname);
                } else {
                    $file = '';
                }
            } else if ($type == 'edit') {
                $pre_img = $this->input->post('edit_team_img');
                $files = $_FILES["team_img"];
                if ($files['error'] == 0) {
                    $temp = explode(".", $files["name"]);
                    $extension = end($temp);
                    $filename = 'team_' . random_string('alnum', 5);
                    $file = "$filename.$extension";
                    $folname = $_SERVER['DOCUMENT_ROOT'] . "/bizjumper/assets/image/pitch/$file";
                    move_uploaded_file($files["tmp_name"], $folname);
                    $filename = FCPATH . "assets/image/pitch/$pre_img";
                    if (!empty($pre_img) && file_exists($filename)) {
                        unlink($folname);
                    }
                } else {
                    $file = $pre_img;
                }
            } else {
                $file = '';
            }
            $data = array(
                'company_id' => $company_id,
                'name' => $this->input->post('name'),
                'role' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'image' => $file,
                'created' => date("Y-m-d h:i:s"),
                'modified' => date("Y-m-d h:i:s")
            );
            $id = $this->input->post('team_id');
            switch ($type) {
                case 'add':
                    $result = $this->b_pitch->set_teamdetails($data);
                    break;
                case 'edit':
                    $result = $this->b_pitch->edit_teamdetails($data, $id);
                    break;
                default:
                    $result = $this->b_pitch->set_teamdetails($data);
                    break;
            }
            if ($result) {
                $data = $this->b_pitch->get_teamdetails($company_id)->result();
                echo json_encode(array('flag' => 1, 'data' => $data));
                exit();
            }
        }
//        $data['company_id'] = $company_id;
//        $data['menu'] = 'add_pitch';
//        $data['teamdetail'] = $this->b_pitch->get_teamdetails($company_id);
//        $this->load->view('pitch/team', $data);
    }

    public function get_teamdetail() {
        $id = $this->input->post('id');
        $company_id = $this->input->post('company_id');
        $result = $this->b_pitch->getteam($company_id, $id);
        $data = $result->row();
        $name = $data->name;
        $role = $data->role;
        $desc = $data->description;
        $image = $data->image;
        echo json_encode(array('flag' => 1, 'name' => $name, 'role' => $role, 'desc' => $desc, 'image' => $image));
        exit();
    }

    public function delete_teamdetail($id) {
        $id = $this->input->post('id');
        $company_id = $this->input->post('company_id');
        $result = $this->b_pitch->getteam($company_id, $id);
        $name = $result->row();
        $file = $name->image;
        if (!empty($file) && file_exists("assets/image/pitch/$file")) {
            unlink("assets/image/pitch/$file");
        }
        $result = $this->b_pitch->delete_teamdetail($id);
        if ($result) {
            $data = $this->b_pitch->get_teamdetails($company_id)->result();
            echo json_encode(array('flag' => 1, 'data' => $data));
            exit();
        }
    }

    public function partner() {
        $company_id = $this->session->userdata('companyid');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $type = $this->input->post('type');
            if ($type == 'add') {
                $files = $_FILES["partner_img"];
                if ($files['error'] == 0) {
                    $temp = explode(".", $files["name"]);
                    $extension = end($temp);
                    $filename = 'partner_' . random_string('alnum', 5);
                    $file = "$filename.$extension";
                    $folname = $_SERVER['DOCUMENT_ROOT'] . "/bizjumper/assets/image/pitch/$file";
                    move_uploaded_file($files["tmp_name"], $folname);
                } else {
                    $file = '';
                }
            } else if ($type == 'edit') {
                $pre_img = $this->input->post('edit_partner_img');
                $files = $_FILES["partner_img"];
                if ($files['error'] == 0) {
                    $temp = explode(".", $files["name"]);
                    $extension = end($temp);
                    $filename = 'partner_' . random_string('alnum', 5);
                    $file = "$filename.$extension";
                    $folname = $_SERVER['DOCUMENT_ROOT'] . "/bizjumper/assets/image/pitch/$file";
                    move_uploaded_file($files["tmp_name"], $folname);
                    $filename = FCPATH . "assets/image/pitch/$pre_img";
                    if (!empty($pre_img) && file_exists($filename)) {
                        unlink($folname);
                    }
                } else {
                    $file = $pre_img;
                }
            } else {
                $file = '';
            }
            $data = array(
                'company_id' => $company_id,
                'partner_name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'image' => $file,
                'created' => date("Y-m-d h:i:s"),
                'modified' => date("Y-m-d h:i:s")
            );
            $id = $this->input->post('partner_id');
            switch ($type) {
                case 'add':
                    $result = $this->b_pitch->set_partnerdetails($data);
                    break;

                case 'edit':
                    $result = $this->b_pitch->edit_partnerdetails($data, $id);
                    break;

                default:
                    $result = $this->b_pitch->set_partnerdetails($data);
                    break;
            }
            if ($result) {
                $data = $this->b_pitch->get_partnerdetails($company_id)->result();
                echo json_encode(array('flag' => 1, 'data' => $data));
                exit();
            }
        }
//        $data['company_id'] = $company_id;
//        $data['menu'] = 'add_pitch';
//        $data['partnerdetail'] = $this->b_pitch->get_partnerdetails($company_id);
//        $this->load->view('pitch/partner', $data);
    }

    public function get_partnerdetail() {
        $id = $this->input->post('id');
        $company_id = $this->input->post('company_id');
        $result = $this->b_pitch->getpartner($company_id, $id);
        $data = $result->row();
        $name = $data->partner_name;
        $desc = $data->description;
        $image = $data->image;
        echo json_encode(array('flag' => 1, 'name' => $name, 'desc' => $desc, 'image' => $image));
        exit();
    }

    public function delete_partnerdetail($id) {
        $id = $this->input->post('id');
        $company_id = $this->input->post('company_id');
        $result = $this->b_pitch->getpartner($company_id, $id);
        $name = $result->row();
        $file = $name->image;
        if (!empty($file) && file_exists("assets/image/pitch/$file")) {
            unlink("assets/image/pitch/$file");
        }
        $result = $this->b_pitch->delete_partnerdetail($id);
        if ($result) {
            $data = $this->b_pitch->get_partnerdetails($company_id)->result();
            echo json_encode(array('flag' => 1, 'data' => $data));
            exit();
        }
    }

    public function view() {
        $company_id = $this->session->userdata('companyid');
        $this->load->helper('currencyconv');
        $data['menu'] = 'view_pitch';
        if (!empty($company_id)) {
            $data['company_id'] = $company_id;
            $data['pitch_details'] = $pitch = $this->b_pitch->get_alldetails($company_id);
            $data['f_length'] = $pitch[0]['forecast_length'];
            $data['f_date'] = $pitch[0]['forecast_date'];
            $data['currency'] = $currency = $pitch[0]['currency'];
            $fund_amt = $pitch[0]['fund_amount'];
            $data['fund_amt'] = converter($fund_amt, $currency);
            $data['competitors'] = $this->b_pitch->get_competitordetail($company_id);
            $data['milestones'] = $this->b_pitch->get_milestonedetail($company_id);
            $data['partner'] = $this->b_pitch->get_partnerdetails($company_id);
            $data['team'] = $this->b_pitch->get_teamdetails($company_id, '4');
            $data['revenue'] = $this->forecast->gettotal($company_id, '12');
            $data['income'] = $income = $this->forecast->getincome($company_id, '6');
            $data['costs'] = $this->forecast->gettotal($company_id, '13', 'expense');
            $data['forecast'] = '0';
            $data['menu_type'] = 'pitch';
            $data['sub_menu'] = 'view';
            $data['controller'] = $this;
            $this->load->view('pitch/template_view', $data);
        } else {
            redirect('dashboard');
        }
    }

    public function publish() {
        $company_id = $this->session->userdata('companyid');
        if (!empty($company_id)) {
            if ($this->input->server('REQUEST_METHOD') === 'POST') {
                $c_id = $this->input->post('id');
                $result = $this->b_pitch->get_publish($c_id);
                if ($result->num_rows() > 0) {
                    $value = $result->row();
                    $flag_value = $value->flag;
                    if ($flag_value == '0') {
                        $data = array(
                            'flag' => '1'
                        );
                    } else {
                        $data = array(
                            'flag' => '0'
                        );
                    }
                    $result = $this->b_pitch->edit_publish($c_id, $data);
                    $data = $this->b_pitch->get_publish($c_id)->result();
                    if ($result) {
                        echo json_encode(array('data' => $data));
                        exit();
                    }
                } else {
                    $random_str = random_string('alpha', 5);
                    $data = array(
                        'company_id' => $c_id,
                        'publish_id' => $random_str,
                        'flag' => '1'
                    );
                    $result = $this->b_pitch->publish_pitch($data);
                    $data = $this->b_pitch->get_publish($c_id)->result();
                    if ($result) {
                        echo json_encode(array('data' => $data));
                        exit();
                    }
                }
            }
            $result = $this->b_company->getcompany($company_id);
            if ($result->num_rows() == 0) {
                redirect('dashboard');
            }
            $data['company_id'] = $company_id;
            $data['menu_type'] = 'pitch';
            $data['sub_menu'] = 'publish';
            $data['publish'] = $publish = $this->b_pitch->get_publish($company_id);
            $this->load->view('pitch/publish', $data);
        } else {
            redirect('dashboard');
        }
    }

    public function download() {
        $data['menu_type'] = 'pitch';
        $data['sub_menu'] = 'present';
        $data['company_id'] = $this->session->userdata('company_id');
        $this->load->view('pitch/ppt', $data);
        echo $this->create_chart_view();
    }

//    public function download_view() {
////        if ($this->input->server('REQUEST_METHOD') === 'POST') {
//        $company_id = $this->session->userdata('companyid');
//        $this->load->helper('currencyconv');
//        $data['company_id'] = $company_id;
//        $data['pitch_details'] = $pitch = $this->b_pitch->get_alldetails($company_id);
//        $data['f_length'] = $pitch[0]['forecast_length'];
//        $data['f_date'] = $pitch[0]['forecast_date'];
//        $data['currency'] = $currency = $pitch[0]['currency'];
//        $fund_amt = $pitch[0]['fund_amount'];
//        $data['fund_amt'] = converter($fund_amt, $currency);
//        $data['competitors'] = $this->b_pitch->get_competitordetail($company_id);
//        $data['milestones'] = $this->b_pitch->get_milestonedetail($company_id);
//        $data['partner'] = $this->b_pitch->get_partnerdetails($company_id);
//        $data['team'] = $this->b_pitch->get_teamdetails($company_id, '4');
//        $data['revenue'] = $this->forecast->gettotal($company_id, '12');
//        $data['income'] = $this->forecast->getincome($company_id, '6');
//        $data['costs'] = $this->forecast->gettotal($company_id, '13');
//        $data['expense'] = $this->forecast->gettotal($company_id, '14');
//        $chtml = $this->load->view('pdf/pitch_view', $data, true);
//        $this->load->library('Pdfdownload');
//        $mpdf = new mPDF('', '', '12', 'arialunicodems');
//        $mpdf->SetDisplayMode('fullpage');
//        $mpdf->WriteHTML($chtml);
////        $mpdf->setHeader($h);
////            $mpdf->setFooter($f);
////            $mpdf->WriteHTML($html);
//        $mpdf->Output('sample.pdf', 'D');
//        die;
////        }
//    }

    public function downloadppt($file1, $type) {
        $file = urldecode($file1);
        $file = $file . '.pptx';
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: public", false);
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment;  filename=\"" . $file . "\";");
        header('Content-Type: application/' . $type);
        header("Content-Transfer-Encoding: binary");
        if (readfile(APPPATH . '/vendor/phpoffice/phppresentation/ppt/' . $file)) {
            unlink(APPPATH . '/vendor/phpoffice/phppresentation/ppt/' . $file);
        }
    }

    public function create_chart() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $company_id = $this->input->post('company');
            $type = $this->input->post('type');
            $data = urldecode($this->input->POST('imageData'));
            $img = str_replace('data:image/png;base64,', '', $data);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            file_put_contents('assets/image/forecast/' . $type . '_' . $company_id . '.png', $data);
        }
    }

    public function create_chart_view() {
        $data['company_id'] = $company_id = $this->session->userdata('companyid');
        $data['revenue'] = $income = $this->forecast->gettotal($company_id, '12');
        $data['income'] = $this->forecast->getincome($company_id, '6');
        $data['costs'] = $this->forecast->gettotal($company_id, '13', 'expense');
        $data['pitch_details'] = $pitch = $this->b_pitch->get_alldetails($company_id);
        $data['f_length'] = $pitch[0]['forecast_length'];
        $data['f_date'] = $pitch[0]['forecast_date'];
        $data['currency'] = $pitch[0]['currency'];
        return $this->load->view('pitch/chart_image', $data, true);
    }

}
