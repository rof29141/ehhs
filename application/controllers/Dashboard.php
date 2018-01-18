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

        $this->load->helper('SessionVars_helper');
        $data=GetSessionVars();

        $this->load->library('MT_Language');
        $obj_lang = new MT_Language();
        $data['language']=$obj_lang->LoadLanguage();

        //echo $data['section_auth'];
		$this->load->view($view, $data);
    }
}