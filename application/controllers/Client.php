<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //$this->load->model('M_Employee');
    }

    function GoUpdateClient()
    {
        if($this->session->userdata('logged_user_ehhs'))
        {
            $this->load->helper('General_Helper');
            $data['session'] = GetSessionVars();//die();
            $data['language'] = LoadLanguage();
            $data['profile_type'] = ProfileType($data['session']);

            $data['go_view'] = str_replace("-","/", $this->input->post('go_view'));
            $data['go_back'] = $this->input->post('go_back');


            if($this->input->post('id')!='')
            {
                $vars = explode("-", $this->input->post('id'));
                $data['id_user'] = $vars[0];
                $data['id_person'] = $vars[1];

                $this->load->model('M_User');
                $this->load->model('M_Client');

                if ($data['id_user'] != '')
                    $data['role'] = $this->M_User->GetRoleByUserID($data['id_user']);

                if ($data['id_person'] != '')
                    $data['client'] = $this->M_Client->GetClientByPersonID($data['id_person']);
            }
            else
                $data['role'] = 'patient';


            if ($data['go_view'] != '')
                $this->load->view($data['go_view'], $data);
        }
        else
        {
            print 'NO_LOGGED';
        }
    }
}