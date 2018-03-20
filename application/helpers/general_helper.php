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
    $data['id_person'] = '';
	$data['no_filled']=array();

    if($my_instance->session->userdata('logged_user_ehhs'))
    {
        $session_data = $my_instance->session->userdata('logged_user_ehhs');

        $data['id_user'] = $session_data['id_user'];
        $data['user'] = $session_data['user'];
        $data['email'] = $session_data['email'];
        $data['rol'] = $session_data['rol'];
        $data['section_auth'] = '';
        $data['id_person'] = $session_data['id_person'];

		$my_instance->load->model('M_Main');
		$data['no_filled']=$my_instance->M_Main->CkeckProfile($data);
    }

    return $data;
}

function UpdateSessionVars($key, $value)
{
    $data='';
    $my_instance =& get_instance();

    if($my_instance->session->userdata('logged_user_ehhs'))
    {
        if($key=='id_user')$data['id_user'] = $value;
        if($key=='user')$data['user'] = $value;
        if($key=='email')$data['email'] = $value;
        if($key=='rol')$data['rol'] = $value;
        if($key=='section_auth')$data['section_auth'] = $value;
        if($key=='id_person')$data['id_person'] = $value;

        $my_instance->load->model('M_Main');
        $data['no_filled']=$my_instance->M_Main->CkeckProfile($data);

        $this->session->set_userdata('logged_user_ehhs', $data);
    }
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

function ProfileType($session)
{
    $data='';
	$my_instance =& get_instance();
	$access_profile=$session['rol'];
	$id_person=$session['id_person'];//echo $id_person;

    if($access_profile=='worker')
    {
        $percent_result=$my_instance->M_Main->GetCompletedPercentByPersonID($id_person);//var_dump($percent_result);
		
		if($percent_result['error_code']==0)
			$data['percent']=$percent_result['data']->completed_percent;//echo $percent_result['data']->completed_percent;
		else
			$data['percent']=0;
		
        $data['available_jobs']=3;
        $data['profile_type']=$access_profile;
    }
    elseif($access_profile=='asist')
    {
        $data['available_jobs']=5;
        $data['profile_type']=$access_profile;
    }
    elseif($access_profile=='admin')
    {
        $data['available_jobs']=5;
        $data['profile_type']=$access_profile;
    }

    return $data;
}