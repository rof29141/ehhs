<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function GetSessionVars()
{
    $data='';
    $my_instance =& get_instance();

    if(!$my_instance->session->userdata('language'))
    {
        $session_lang = array('lang' => 'english');
        $this->session->set_userdata('language', $session_lang);
    }

    $session_lang = $my_instance->session->userdata('language');
    $data['caption_language'] = $session_lang['lang'];

    $data['email_from'] = EMAIL_FROM;
    $data['email_from_name'] = EMAIL_FROM_NAME;
    $data['email_test_to'] = EMAIL_FROM_TO;
    $data['email_test_staff_to'] = EMAIL_FROM_STAFF_TO;

    $data['id'] = '';
    $data['user_name'] = '';
    $data['bd_FirstName'] = '';
    $data['bd_LastName'] = '';
    $data['email'] = '';
    $data['__zkp_Client_Rec'] = '';
    $data['PersonalContactInformationStatus'] = '';
    $data['next_app_date'] = '';
    $data['privilegies'] = '';
    $data['section_auth'] = '/authentication/Login.php';

    if($my_instance->session->userdata('logged_user_ehhs'))
    {
        $session_data = $my_instance->session->userdata('logged_user_ehhs');

        $data['id'] = $session_data['id'];
        $data['user_name'] = $session_data['user_name'];
        $data['bd_FirstName'] = $session_data['bd_FirstName'];
        $data['bd_LastName'] = $session_data['bd_LastName'];
        $data['email'] = $session_data['email'];
        $data['__zkp_Client_Rec'] = $session_data['__zkp_Client_Rec'];
        $data['PersonalContactInformationStatus'] = $session_data['PersonalContactInformationStatus'];
        $data['next_app_date'] = $session_data['next_app_date'];
        $data['privilegies'] = 'admin';
        $data['section_auth'] = '';
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