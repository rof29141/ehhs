<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
    }

    public function index($view="user/Profile", $msg="", $success="", $warning="", $error="")
    {
        $data['msg']=$msg;
        $data['success']=$success;
        $data['warning']=$warning;
        $data['error']=$error;
        $data['view']=$view;

        if($this->session->userdata('logged_user'))
        {
            $session_data = $this->session->userdata('logged_user');

            $data['id'] = $session_data['id'];
            $data['user_name'] = $session_data['user_name'];
            $data['full_name'] = $session_data['full_name'];
            $data['title'] = $session_data['title'];
            $data['client_number'] = $session_data['client_number'];
            $data['email'] = $session_data['email'];

            $this->load->view($view, $data);
        }
        else
        {
            echo 1;
        }
    }

    function GoListUser($msg="", $success="", $warning="", $error="")
    {
        $data['msg']=$msg;
        $data['success']=$success;
        $data['warning']=$warning;
        $data['error']=$error;

        if($this->session->userdata('logged_user'))
        {
            $session_data = $this->session->userdata('logged_user');

            $data['id'] = $session_data['id'];
            $data['user_name'] = $session_data['user_name'];
            $data['full_name'] = $session_data['full_name'];
            $data['title'] = $session_data['title'];
            $data['client_number'] = $session_data['client_number'];
            $data['email'] = $session_data['email'];

            $this->load->view('user/ListUser', $data);
        }
        else
        {
            echo 1;
        }
    }
}