<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function GetSessionVars()
{
    $data='';
    $my_instance =& get_instance();

    if(!$my_instance->session->userdata('language'))
    {
        $session_lang = array('lang' => 'english');
        $my_instance->session->set_userdata('language', $session_lang);
    }

    $session_lang = $my_instance->session->userdata('language');
    $data['caption_language'] = $session_lang['lang'];

    $data['email_from'] = EMAIL_FROM;
    $data['email_from_name'] = EMAIL_FROM_NAME;
    $data['email_test_to'] = EMAIL_FROM_TO;
    $data['email_test_staff_to'] = EMAIL_FROM_STAFF_TO;

    $data['id_user'] = '';
	$data['user'] = '';
	$data['email'] = '';
	$data['rol'] = '';
    $data['section_auth'] = '/authentication/Login.php';
	$data['no_filled']=array();

    if($my_instance->session->userdata('logged_user_ehhs'))
    {
        $session_data = $my_instance->session->userdata('logged_user_ehhs');

        $data['id_user'] = $session_data['id_user'];
        $data['user'] = $session_data['user'];
        $data['email'] = $session_data['email'];
        $data['rol'] = $session_data['rol'];
        $data['section_auth'] = '';
		
		$my_instance->load->model('M_Main');
		$data['no_filled']=$my_instance->M_Main->CkeckProfile($data);
    }

    return $data;
}

function LoadLanguage()
{
    $my_instance =& get_instance();

    if(!$my_instance->session->userdata('language'))
    {
        $session_lang = array('lang' => 'english');
        $this->session->set_userdata('language', $session_lang);
    }

    $session_lang = $my_instance->session->userdata('language');
    $language = $session_lang['lang'];

    $my_instance->lang->load('form_label', $language);
    $data=$my_instance->lang->language;//var_dump($data);
    return $data;
}

function ProfileType($access_profile)
{
    $data='';
	$my_instance =& get_instance();

    if($access_profile=='worker')
    {
        $data['percent']=65;
        $data['available_jobs']=3;
        $data['profile_type']=$access_profile;
    }
    elseif($access_profile=='admin')
    {
        $data['available_jobs']=5;
        $data['profile_type']=$access_profile;
    }

    return $data;
}