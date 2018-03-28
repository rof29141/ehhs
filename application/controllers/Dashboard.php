<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Dashboard');
    }

    function GoDashboard($view="dashboard/Dashboard", $msg="", $success="", $warning="", $error="")
    {
        $data['msg']=$msg;
        $data['success']=$success;
        $data['warning']=$warning;
        $data['error']=$error;
        $data['view']=$view;

        $this->load->helper('General_Helper');
        $data['session']=GetSessionVars();
        $data['language']=LoadLanguage();
        $data['profile_type']=ProfileType($data['session']);



        if ($data['session']['rol']=='asist')
        {
            $this->load->model('M_Care');
            $this->load->model('M_Employee');
            $data['pending_care']=$this->M_Care->GetCareByApproved(0);
            $data['pending_employee']=$this->M_Employee->GetWorkerByApproved(0);//var_dump($data['pending_employee']);
        }
        /*elseif ($data['session']['rol']=='patient')
            $data['no_filled']=$this->M_Main->CkeckClient($data);
        else
            $data['no_filled']=$this->M_Main->CkeckProfile($data);*/

        //echo $data['section_auth'];
		$this->load->view($view, $data);
    }

    function GoAboutUs($view="dashboard/Dashboard", $msg="", $success="", $warning="", $error="")
    {
        $data['msg']=$msg;
        $data['success']=$success;
        $data['warning']=$warning;
        $data['error']=$error;
        $data['view']=$view;

        $this->load->helper('General_Helper');
        $data['session']=GetSessionVars();
        $data['language']=LoadLanguage();
        $data['profile_type']=ProfileType($data['session']);

        //echo $data['section_auth'];
		$this->load->view($view, $data);
    }
}