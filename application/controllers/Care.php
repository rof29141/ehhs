<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Care extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //$this->load->model('M_Employee');
    }

    function GoAddCare()
    {
        if($this->session->userdata('logged_user_ehhs'))
        {
            $this->load->helper('General_Helper');
            $data['session'] = GetSessionVars();//die();
            $data['language'] = LoadLanguage();
            $data['profile_type'] = ProfileType($data['session']);

            $data['go_view'] = 'care/AddCare';
            $data['go_back'] = $this->input->post('go_back');

            $data['id_client']=$this->input->post('id_client');

            $this->load->model('M_Client');
            $data['client']=$this->M_Client->GetAllClients();

            if ($data['go_view'] != '')
                $this->load->view($data['go_view'], $data);
        }
        else
        {
            print 'NO_LOGGED';
        }
    }
}