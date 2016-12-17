<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH."libraries/REST_Controller.php");

class User extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('services/user_model'));
        $key  = $this->get('X-APP-KEY');
    }

    public function login_post() {

        $user_data = array();
        try
        {
            $email      =  $this->post('email'); //'sandeey13@gmail.com';
            $password   =  $this->post('password'); //'320391';

            if( strcmp('', trim($email) ) === 0 || strcmp('', trim($password) ) === 0 )
                throw new Exception("Required fields are missing in your request");

            $user_data = $this->user_model->login( $email, $password );

            if( !is_array($user_data) || !count($user_data) )
             throw new Exception("The user account does not exist.");
            
            if( $user_data['status'] != 1 )
             throw new Exception("The user account has been blocked. Please try after some time or contact administrator");

            $user_data['message'] = "Login Successfully";
            $user_data['status'] = 'success';
        }
        catch( Exception $e)
        {
            $user_data['message'] = $e->getMessage();
            $user_data['status'] = 'error';
        }

        $this->response( $user_data, 200);
    }

    public function signup_post() {

        $this->load->model('Mailmodel', 'mail');

        $user_data = array();
        try
        {
            $fname      =  $this->post('fname'); 
            $lname      =  $this->post('lname');
            $email      =  $this->post('email');
            $password   =  $this->post('password'); 

            if( strcmp('', trim($fname) ) === 0 || strcmp('', trim($email) ) === 0 || strcmp('', trim($password) ) === 0 )
                throw new Exception("Required fields are missing in your request");

            $check_email = $this->user_model->get_where( array('email'=> $email),'user_id', 'users')->num_rows();

            if($check_email > 0)
                throw new Exception("This email id is already registered");

            $insdata['fname']       = $fname;
            $insdata['lname']       = $lname;
            $insdata['email']       = $email;
            $insdata['password']    = md5('biz_jump' . $password);
            $insdata['subs_type']   = 1;
            $insdata['status']      = 0;
            $insdata['membership']  = 0;
            $insdata['download']    = 0;
            $insdata['flag']        = 0;
            $insdata['created']     = date("Y-m-d h:i:s");
            $insdata['modified']    = date("Y-m-d h:i:s");

            $auth_value = $this->user_model->signup($insdata);

            $url = site_url() . 'signup/activation/' . $auth_value;

            $to = $email;

            $subject = 'Hi ' . $fname . ', Welcome to BizJumper';

            $data = array(
                'url' => $url,
                'to' => $to,
                'subject' => $subject,
                'link' => 'email_template/verification_usermail',
                'fname' => $fname
            );

            $this->mail->sendemail($data);

            $user_data['message'] = "Registered Successfully";
            $user_data['status'] = 'success';
        
        }
        catch( Exception $e)
        {
            $user_data['message'] = $e->getMessage();
            $user_data['status'] = 'error';
        }

        $this->response( $user_data, 200);    

        
    }

    public function forgot_password_post() {

        $this->load->helper('string');
        $this->load->model('Mailmodel', 'mail');

        $user_data = array();
        try
        {
            $email      =  $this->post('email'); 

            if( strcmp('', trim($email) ) === 0)
                throw new Exception("Required fields are missing in your request");

            $check_email = $this->user_model->get_where( array('email'=> $email),'user_id,fname,email', 'users');

            if(!$check_email->num_rows())
                throw new Exception("This email id does not exist!");

            $result = $check_email->row_array();

            $userid = $result['user_id'];
            $fname = $result['fname'];

            $authkey = md5(random_string('alnum', 15));

            $data = array(
                'memberid' => $userid,
                'otp' => $authkey,
                'created' => date("Y-m-d h:i:s")
            );

            $checkotp = $this->user_model->get_where( array('memberid'=> $userid),'id', 'resetpassword')->num_rows();

            if ($checkotp > 0)
                $this->user_model->delete(array('memberid'=> $userid), 'resetpassword');

            //insert otp
            $result = $this->user_model->insert($data,'resetpassword');

            $url = site_url() . 'login/reset_password?memberId=' . $userid . '&email=' . $email . '&authkey=' . $authkey . '&status=true';
            
            $data = array(
                'url' => $url,
                'to' => $email,
                'subject' => 'Hi ' . $fname . ', Welcome to BizJumper',
                'link' => 'email_template/password_reset',
                'fname' => $fname
            );

            $this->mail->sendemail($data);

            $user_data['message'] = "Login Successfully";
            $user_data['status'] = 'success';
        }
        catch( Exception $e)
        {
            $user_data['message'] = $e->getMessage();
            $user_data['status'] = 'error';
        }

        $this->response( $user_data, 200);

        
    }


}
