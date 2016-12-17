<?php

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('login_model', 'b_login');
        $this->load->model('company_model', 'b_company');
        $this->load->model('plan_model', 'plan');
        $this->load->library('form_validation');
        $this->load->helper('string');
        date_default_timezone_set('Asia/Kolkata');
        $user_id = $this->session->userdata('user_id');
        $this->session->unset_userdata('companyid');
        if (empty($user_id)) {
            redirect('login');
        }
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        $data['company'] = $this->b_company->validate_company();
        $data['menu_type'] = 'dashboard';
        $data['sub_menu'] = '';
        $this->load->view('dashboard', $data);
    }

    public function create() {
        $user_id = $this->session->userdata('user_id');
        if (empty($user_id)) {
            redirect('login');
        }
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $result = $this->b_company->check_lead();
            $count = $result->num_rows();
            if ($count > 0) {
                $data = $result->row();
                $lead = $data->balance;
                if ($lead != '0') {
                    $message = $this->__validate_company();
                    echo $message;
                    die;
                } else {
                    echo '2';
                    die;
                }
            } else {
                echo '3';
                die;
            }
        }
        $result = $this->b_company->check_lead();
        $count = $result->num_rows();
        if ($count > 0) {
            $data = $result->row();
            $lead = $data->balance;
            if ($lead != '0') {
                $this->load->view('create_company');
            } else {
                redirect('settings/subscription');
            }
        } else {
            redirect('settings/subscription');
        }
    }

    public function company_delete($id) {
        $company_id = $id;
        $result = $this->b_company->deletecompany($company_id);
        if ($result) {
//            $data = $this->b_company->validate_company()->result();
//            echo json_encode(array('flag' => 1, 'data' => $data));
//            exit();
            redirect('dashboard');
        }
    }

    public function __validate_company() {
        $validation = array(
            array('field' => 'company', 'label' => 'Company Name', 'rules' => 'trim|required')
        );
        $this->form_validation->set_rules($validation);
        $random_str = random_string('alpha', 8);
        if ($this->form_validation->run()) {
//            $files = $_FILES["logo"];
//            if ($files['error'] == 0) {
//                $temp = explode(".", $files["name"]);
//                $extension = end($temp);
//                $filename = 'logo_' . random_string('alnum', 5);
//                $file = "$filename.$extension";
//                $folname = $_SERVER['DOCUMENT_ROOT'] . "biz/assets/image/logo/$file";
//                move_uploaded_file($files["tmp_name"], $folname);
//            } else {
//                $file = '';
//            }
            $data = array(
                'user_id' => $this->session->userdata('user_id'),
                'company_id' => $random_str,
                'name' => $this->input->post('company'),
                'btype' => '1',
                'forecast_length' => $this->input->post('f_length'),
                'forecast_type' => '1',
                'forecast_date' => '1/' . $this->input->post('forecast_year'),
                'currency' => $this->input->post('currency'),
                'logo' => '',
                'status' => '1',
                'created' => date("Y-m-d h:i:s"),
                'modified' => date("Y-m-d h:i:s")
            );
            $result = $this->b_company->setcompany($data);
            if ($result) {
                $this->check_leads();
                return json_encode(array('flag' => 1, 'company_id' => $random_str));
            } else {
                $this->session->set_flashdata('error', 'Something went wrong. Try again.');
            }
        }
    }

    public function check_leads() {
        $result = $this->b_company->check_lead();
        if ($result->num_rows() > 0) {
            $data = $result->row();
            $lead = $data->balance;
            if ($lead != '0') {
                $value = $lead - 1;
            } else {
                $value = $lead;
            }
            $array = array(
                'balance' => $value
            );
            $this->b_company->update_sub($array);
        }
    }

    public function delete_company($id) {
        $result = $this->b_company->deletecompany($id);
        if ($result) {
            redirect('dashboard');
        }
    }

}
