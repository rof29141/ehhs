<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appointment extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->model('M_Dashboard');
    }

    function index($view="appointment/ListMyAppointment", $msg="", $success="", $warning="", $error="")
    {
        $data['msg']=$msg;
        $data['success']=$success;
        $data['warning']=$warning;
        $data['error']=$error;
        $data['view']=$view;

        if($this->session->userdata('logged_user_acs'))
        {
            $session_data = $this->session->userdata('logged_user_acs');

            $data['id'] = $session_data['id'];
            $data['user_name'] = $session_data['user_name'];
            $data['bd_FirstName'] = $session_data['bd_FirstName'];
            $data['bd_LastName'] = $session_data['bd_LastName'];
            $data['email'] = $session_data['email'];
            $data['__zkp_Client_Rec'] = $session_data['__zkp_Client_Rec'];

            $this->load->model('M_Main');
            $data['service']=$this->M_Main->GetServices();

            $this->load->view($view, $data);
        }
        else
        {
            echo 1;
        }
    }

    function History($view="appointment/ListMyHistory", $msg="", $success="", $warning="", $error="")
    {
        $data['msg']=$msg;
        $data['success']=$success;
        $data['warning']=$warning;
        $data['error']=$error;
        $data['view']=$view;

        if($this->session->userdata('logged_user_acs'))
        {
            $session_data = $this->session->userdata('logged_user_acs');

            $data['id'] = $session_data['id'];
            $data['user_name'] = $session_data['user_name'];
            $data['bd_FirstName'] = $session_data['bd_FirstName'];
            $data['bd_LastName'] = $session_data['bd_LastName'];
            $data['email'] = $session_data['email'];
            $data['__zkp_Client_Rec'] = $session_data['__zkp_Client_Rec'];

            $this->load->model('M_Main');
            $data['service']=$this->M_Main->GetServices();

            $this->load->view($view, $data);
        }
        else
        {
            echo 1;
        }
    }

    function CancelAppointment()
    {
        if(isset($_POST['id']))
        {
            $fm = new Fmp();
            $command = $fm->newPerformScriptCommand('ADM___', 'ClearAppointmentFromWeb', $_POST['id']);
            $command->execute();
        }
    }
}